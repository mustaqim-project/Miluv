<?php
    $total_comment_main_comments = DB::table('comments')
        ->where('comments.is_type', 'post')
        ->where('comments.id_of_type', $post->post_id)
        ->where('comments.parent_id', 0)
        ->get()
        ->count();
    $total_comment_sub_comments = DB::table('comments')
        ->where('comments.is_type', 'post')
        ->where('comments.id_of_type', $post->post_id)
        ->where('comments.parent_id', '>', 0)
        ->get()
        ->count();
    $total_comments = $total_comment_main_comments + $total_comment_sub_comments;
    
    $comments = DB::table('comments')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->where('comments.is_type', 'post')
        ->where('comments.id_of_type', $post->post_id)
        ->where('comments.parent_id', 0)
        ->select('comments.*', 'users.name', 'users.photo')
        ->orderBy('comment_id', 'DESC')
        ->take(1)
        ->get();
    
    $tagged_user_ids = json_decode($post->tagged_user_ids);
    
?>
<?php $user_reacts = json_decode($post->user_reacts, true); ?>

<div class="single-item-countable single-entry" id="">
    <div class="entry-inner en_left">
        <div
            class="entry-header d-flex justify-content-between <?php if(isset($_GET['shared'])): ?> hidden-on-shared-view <?php endif; ?>">
            <div class="ava-info d-flex align-items-center">
                <?php if(isset($type) && $type == 'page'): ?>
                    <div class="flex-shrink-0">
                        <img src="<?php echo e(get_page_logo($post->logo, 'logo')); ?>" class="rounded-circle" alt="...">
                    </div>
                <?php elseif(isset($type) && $type == 'group'): ?>
                    <div class="flex-shrink-0">
                        <img src="<?php echo e(get_user_image('storage/userimage/' . $post->photo, 'optimized')); ?>"
                            class="rounded-circle" alt="...">
                    </div>
                <?php elseif(isset($type) && $type == 'video'): ?>
                    <div class="entry-header d-flex justify-content-between">
                        <div class="ava-info d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="<?php echo e(get_user_image($post->photo, 'optimized')); ?>"
                                    class="rounded rounded-circle" alt="...">

                            </div>
                            <div class="ava-desc ms-2">
                                <h3 class="mb-0"><?php echo e($post->name); ?> <a href="#"><?php echo e(get_phrase('Follow')); ?></a>
                                </h3>
                                <small class="meta-time text-muted"><?php echo e(date('M d ', strtotime($post->created_at))); ?> at
                                    <?php echo e(date('H:i A', strtotime($post->created_at))); ?></small>
                                <?php if($post->privacy == 'public'): ?>
                                    <span class="meta-privacy text-muted"><i
                                            class="fa-solid fa-earth-americas"></i></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="post-controls dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><img
                                            src="<?php echo e(asset('assets/frontend/images/save.png')); ?>"
                                            alt=""><?php echo e(get_phrase('Save Video')); ?></a></li>
                                <li><a class="dropdown-item" href="#"><img
                                            src="<?php echo e(asset('assets/frontend/images/link.png')); ?>"
                                            alt=""><?php echo e(get_phrase('Copy Link')); ?></a></li>
                                <li><a class="dropdown-item" href="#"><img
                                            src="<?php echo e(asset('assets/frontend/images/report.png')); ?>"
                                            alt=""><?php echo e(get_phrase('Report')); ?> </a></li>
                            </ul>
                        </div>
                    </div>
                <?php elseif(isset($type) && $type == 'paid_content'): ?>
                    <div class="flex-shrink-0">
                        <img src="<?php echo e(get_user_image($post->user_id, 'optimized')); ?>"
                            class="rounded-circle user_image_show_on_modal" alt="...">
                    </div>
                <?php elseif(isset($type) && $type == 'user_post'): ?>
                    <div class="flex-shrink-0">
                        <img src="<?php echo e(get_user_image($post->user_id, 'optimized')); ?>"
                            class="rounded-circle user_image_show_on_modal" alt="...">
                    </div>
                <?php else: ?>
                    <div class="flex-shrink-0">
                        <img src="<?php echo e(get_user_image($post->id, 'optimized')); ?>"
                            class="rounded-circle user_image_show_on_modal" alt="...">
                    </div>
                <?php endif; ?>
                <div class="ava-desc ms-2">
                    <h3 class="mb-0">
                        <?php if(isset($type) && $type == 'page'): ?>
                            <a class="text-black" href="<?php echo e(route('single.page', $post->id)); ?>"><?php echo e($post->title); ?></a>
                        <?php elseif(isset($type) && $type == 'group'): ?>
                            <a class="text-black"
                                href="<?php echo e(route('user.profile.view', $post->user_id)); ?>"><?php echo e($post->name); ?></a>
                        <?php else: ?>
                            <a class="text-black"
                                href="<?php echo e(route('user.profile.view', $post->user_id)); ?>"><?php echo e($post->getUser->name); ?></a>
                        <?php endif; ?>
                        <!-- Check tagged users -->

                        <?php if($post->post_type == 'live_streaming'): ?>
                            <small class="text-muted"><?php echo e(get_phrase('is live now')); ?></small>
                        <?php endif; ?>

                        <?php if(count($tagged_user_ids) > 0 || $post->activity_id > 0): ?>
                            <small class="text-muted">-</small>

                            <!-- Feeling and activity -->
                            <?php if($post->activity_id > 0): ?>
                                <?php
                                    $feeling_and_activities = DB::table('feeling_and_activities')
                                        ->where('feeling_and_activity_id', $post->activity_id)
                                        ->first();
                                ?>
                                <?php if($feeling_and_activities->type == 'activity'): ?>
                                    <?php echo e($feeling_and_activities->title); ?>

                                <?php else: ?>
                                    <spam class="text-muted"><?php echo e(get_phrase('feeling')); ?></spam>
                                    <b> <?php echo e($feeling_and_activities->title); ?> </b>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(count($tagged_user_ids) > 0): ?>
                                <small class="text-muted"><?php echo e(get_phrase('with')); ?></small>
                                <?php $__currentLoopData = $tagged_user_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tagged_user_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <small class="text-muted"><?php
                                        if ($key > 0) {
                                            echo ',';
                                        }
                                    ?></small>
                                    <a class="text-black"
                                        href="<?php echo e(route('profile')); ?>"><?php echo e(DB::table('users')->where('id', $tagged_user_id)->value('name')); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if(!empty($post->location)): ?>
                            <small class="text-muted"><?php echo e(get_phrase('in')); ?></small> <a
                                href="https://www.google.com/maps/place/<?php echo e($post->location); ?>"
                                target="_blanck"><?php echo e($post->location); ?></a>
                        <?php endif; ?>
                    </h3>
                    <span class="meta-time text-muted"><?php echo e(date_formatter($post->created_at, 2)); ?></span>

                    <?php if($post->privacy == 'public'): ?>
                        <span class="meta-privacy text-muted" title="<?php echo e(ucfirst(get_phrase($post->privacy))); ?>"><i
                                class="fa-solid fa-earth-americas"></i></span>
                    <?php elseif($post->privacy == 'private'): ?>
                        <span class="meta-privacy text-muted" title="<?php echo e(ucfirst(get_phrase($post->privacy))); ?>"><i
                                class="fa-solid fa-user"></i></span>
                    <?php else: ?>
                        <span class="meta-privacy text-muted" title="<?php echo e(ucfirst(get_phrase($post->privacy))); ?>"><i
                                class="fa-solid fa-users"></i></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="post-controls dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <input type="hidden" id="copy_post_<?php echo e($post->post_id); ?>"
                        value="<?php echo e(route('single.post', $post->post_id)); ?>">
                    <li><a class="dropdown-item" href="javascript:void(0)" value="copy"
                            onclick="copyToClipboard('copy_post_<?php echo e($post->post_id); ?>')"><img
                                src="<?php echo e(asset('storage/images/link.png')); ?>"
                                alt=""><?php echo e(get_phrase('Copy Link')); ?></a></li>

                    <li><a class="dropdown-item" href="javascript:void(0)"
                            onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.create_report', 'post_id' => $post->post_id])); ?>', '<?php echo e(get_phrase('Report Post')); ?>');"
                            data-bs-toggle="modal" data-bs-target="#createEvent"><img
                                src="<?php echo e(asset('storage/images/report.png')); ?>"
                                alt=""><?php echo e(get_phrase('Report')); ?>

                        </a></li>
                </ul>
            </div>
        </div>
        <div class="entry-content pt-2">
            <?php if($post->post_type == 'general' || $post->post_type == 'profile_picture' || $post->post_type == 'cover_photo'): ?>

                
                <div class="row" id="postMediaSection<?php echo e($post->post_id); ?>">
                    <div class="col-12">
                        <?php
                            $media_files = DB::table('media_files')
                                ->where('post_id', $post->post_id)
                                ->get();
                        ?>
                        <?php $media_files_count = count($media_files); ?>
                        <div
                            class="photoGallery visibility-hidden <?php if($media_files_count == 1): ?> initialized <?php endif; ?>">
                            <!-- break after loaded 5 images -->
                            <?php $more_unloaded_images = $media_files_count - 5; ?>
                            <?php $__currentLoopData = $media_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $media_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    if ($key == 5) {
                                        break;
                                    }
                                ?>

                                <?php if($media_file->file_type == 'video'): ?>
                                    <?php if(File::exists('public/storage/post/videos/' . $media_file->file_name)): ?>
                                        <?php if($media_files_count > 1): ?>
                                            <a class="position-relative"
                                                onclick="showCustomModal('<?php echo e(route('preview_post', ['post_id' => $post->post_id, 'file_name' => $media_file->file_name])); ?>', '<?php echo e(get_phrase('Preview')); ?>', 'xxl')"
                                                href="javascript:void(0)">
                                        <?php endif; ?>

                                        <video muted controlsList="nodownload" controls
                                            class="plyr-js w-100 rounded video-thumb <?php if($media_files_count > 1): ?> initialized <?php endif; ?>">
                                            <source src="<?php echo e(get_post_video($media_file->file_name)); ?>"
                                                type="">
                                        </video>

                                        <?php if($more_unloaded_images > 0 && $key == 4): ?>
                                            <div class="more_image_overlap"><span><i class="fa-solid fa-plus"></i>
                                                    <?php echo e($more_unloaded_images); ?> </span></div>
                                        <?php endif; ?>

                                        <?php if($media_files_count > 1): ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="picture text-center">
                                        <a onclick="showCustomModal('<?php echo e(route('preview_post', ['post_id' => $post->post_id, 'file_name' => $media_file->file_name])); ?>', '<?php echo e(get_phrase('Preview')); ?>', 'xxl')"
                                            href="javascript:void(0)">

                                            <?php if($more_unloaded_images > 0 && $key == 4): ?>
                                                <?php $opacity = 'opacity-7'; ?>
                                                <div class="more_image_overlap"><span><i class="fa-solid fa-plus"></i>
                                                        <?php echo e($more_unloaded_images); ?> </span></div>
                                            <?php else: ?>
                                                <?php $opacity = ''; ?>
                                            <?php endif; ?>

                                            <img src="<?php echo e(get_post_image($media_file->file_name)); ?>"
                                                class="w-100 h-100 <?php if($media_files_count == 1): ?> single-image-ration <?php endif; ?> <?php echo e($opacity); ?>"
                                                alt="">
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>



                <?php if(!empty($post->location)): ?>
                    <div class="text-center">
                        <img width="200px" src="<?php echo e(asset('storage/images/map-pin.jpeg')); ?>"><br>
                        <a class="location-post me-auto ms-auto"
                            href="https://www.google.com/maps/place/<?php echo e($post->location); ?>" target="_blanck">
                            <img src="<?php echo e(asset('storage/images/location.png')); ?>">
                            <span><?php echo e($post->location); ?></span>
                            <hr>
                            <small><?php
                                echo DB::table('posts')
                                    ->where('location', $post->location)
                                    ->get()
                                    ->count();
                            ?> <?php echo e(get_phrase('visits')); ?></small>
                        </a>
                    </div>
                <?php endif; ?>
            <?php elseif($post->post_type == 'live_streaming'): ?>
                <div class="row">
                    <div class="col-12 text-center">
                        <span class="live-icon">
                            <i class="fa fa-dot-circle"></i>
                            <?php echo e(get_phrase('LIVE')); ?>

                        </span>
                        <img class="live-image" src="<?php echo e(asset('storage/images/live.png')); ?>">
                    </div>
                    <div class="col-12 text-center ">
                        <a class="live-watch-now mt-20" href="<?php echo e(route('live', ['post_id' => $post->post_id])); ?>"><i
                                class="fa fa-video"></i> <?php echo e(get_phrase('Watch now')); ?></a>
                    </div>
                </div>
            <?php elseif($post->post_type == 'share'): ?>
                <div class="py-1">
                    <div class="text-quote">
                        <?php if(\Illuminate\Support\Str::contains($post->description, 'http', 'https')): ?>
                            <?php
                                $explode_data = explode('/', $post->description);
                                $shared_id = end($explode_data);
                            ?>
                            <iframe src="<?php echo e($post->description); ?>?shared=yes" onload="resizeIframe(this)"
                                scrolling="no" class="w-100" frameborder="0"></iframe>
                            <a class="ellipsis-line-1 ellipsis-line-2"
                                href="<?php echo e($post->description); ?>"><?php echo e($post->description); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
           <?php elseif($post->post_type == 'album'): ?>


            <?php endif; ?>

        </div>
       <div class="e_comment">
            <div class="entry-footer <?php if(isset($_GET['shared'])): ?> hidden-on-shared-view <?php endif; ?>">
                <div class="footer-share d-flex justify-content-around">
                    <span class="entry-react post-react">

                        <a href="javascript:void(0)" onclick="myReact('post', 'like', 'toggle', <?php echo e($post->post_id); ?>)"
                            id="my_post_reacts<?php echo $post->post_id; ?>">
                            <?php echo $__env->make('frontend.main_content.post_reacts', ['my_react' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </a>

                        <ul class="react-list">
                            <li><a href="javascript:void(0)"
                                    onclick="myReact('post', 'like', 'update', <?php echo e($post->post_id); ?>)"><img
                                        src="<?php echo e(asset('storage/images/r-like.png')); ?>" alt="Like"></a>
                            </li>
                            <li><a href="javascript:void(0)"
                                    onclick="myReact('post', 'love', 'update', <?php echo e($post->post_id); ?>)"><img
                                        src="<?php echo e(asset('storage/images/r-love.png')); ?>" alt="Love"></a>
                            </li>
                            <li><a href="javascript:void(0)"
                                    onclick="myReact('post', 'sad', 'update', <?php echo e($post->post_id); ?>)"><img
                                        src="<?php echo e(asset('storage/images/r-cry1.png')); ?>" alt="Sad"></a>
                            </li>
                            <li><a href="javascript:void(0)"
                                    onclick="myReact('post', 'angry', 'update', <?php echo e($post->post_id); ?>)"><img
                                        src="<?php echo e(asset('storage/images/r-angry.png')); ?>" alt="Angry"></a>
                            </li>
                        </ul>
                    </span>
                    <span class="entry-react"><a href="javascript:void(0)"
                            onclick="$('#user-comments-<?php echo e($post->post_id); ?>').toggle();"> <img width="19px" src="<?php echo e(asset('storage/images/comment2.svg')); ?>"><?php echo e(get_phrase('Comments')); ?></a></span>
                    <span class="entry-react" data-bs-toggle="modal" data-bs-target="#exampleModal"><a
                            href="javascript:void(0)"
                            onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $post->post_id])); ?>', '<?php echo e(get_phrase('Share post')); ?>');"> <img width="19px" src="<?php echo e(asset('storage/images/share2.svg')); ?>"><?php echo e(get_phrase('Share')); ?></a></span>
                    <!-- Post share modal -->
                </div>
                <div class="entry-meta py-4 d-flex border-bottom justify-content-between align-items-center ">
                    <a href="javascript:void(0)" id="post_reacts<?php echo $post->post_id; ?>">
                        <?php echo $__env->make('frontend.main_content.post_reacts', ['post_react' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </a>
                    
                    <div class="post-comment">
                        <ul>
                            <li><a onclick="$('#user-comments-<?php echo e($post->post_id); ?>').toggle();"
                                    href="javascript:void(0)"><span
                                        id="post_comment_count<?php echo e($post->post_id); ?>"><?php echo e($total_comments); ?></span><?php echo e(get_phrase('Comments')); ?></a>
                            </li>
                            <li><a href="javascript:void(0)"><span>0</span><?php echo e(get_phrase('Share')); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- Entry Footer End -->
    </div>
    <!-- Comment Start -->
    <div class="user-comments s_comment d-hidden bg-white" id="user-comments-<?php echo e($post->post_id); ?>">
        <div class="comment-form d-flex bg-secondary">
            <img src="<?php echo e(get_user_image(Auth()->user()->photo, 'optimized')); ?>" alt=""
                class="rounded-circle img-fluid h-39" width="40px">
            <form action="javascript:void(0)" class="w-100 ms-2" method="post">
                <input class="form-control py-3" onkeypress="postComment(this, 0, <?php echo e($post->post_id); ?>, 0,'post');"
                    rows="1" placeholder="Write Comments">
            </form>
        </div>
        <ul class="comment-wrap p-3 pb-0 list-unstyled" id="comments<?php echo e($post->post_id); ?>">
            <?php echo $__env->make('frontend.main_content.comments', [
                'comments' => $comments,
                'post_id' => $post->post_id,
                'type' => 'post',
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </ul>

        <?php if($comments->count() < $total_comments): ?>
            <a class="btn p-3 pt-0"
                onclick="loadMoreComments(this, <?php echo e($post->post_id); ?>, 0, <?php echo e($total_comments); ?>,'post')"><?php echo e(get_phrase('View more')); ?></a>
        <?php endif; ?>
    </div>
</div><!--  Single Entry End -->

<?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(asset('assets/frontend/gallery/jquery.justifiedGallery.min.js')); ?>"></script>
<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




<?php /**PATH D:\AGUNG MUSTAQIM\drive-download-20250218T071143Z-001\PROJECT-BY-LARAGON\PROJECT-BY-LARAGON\Sociopro\resources\views/frontend/main_content/single-post.blade.php ENDPATH**/ ?>