

<form class="ajaxForm" action="<?php echo e(route('save.post.report')); ?>" method="POST" enctype="multipart/form-data" >
    <?php echo csrf_field(); ?>
    
    <input type="hidden" value="<?php echo e($post_id); ?>" name="post_id" />

    <div class="entry-header d-flex mb-10 justify-content-between">
        <div class="ava-info d-flex align-items-center">
            <div class="flex-shrink-0">
                <img src="<?php echo e(get_user_image(Auth()->user()->photo, 'optimized')); ?>" class="user-round h-80" width="80px" alt="...">
            </div>
            <div class="ava-desc ms-2">
                <h3 class="mb-0 h6"><?php echo e(Auth::user()->name); ?></h3>
            </div>
        </div>
    </div>
    <div class="form-group mt-5">
        <label for="#"><?php echo e(get_phrase('Reason of Report')); ?></label>
        <textarea name="report" id="report" rows="5" placeholder="<?php echo e(get_phrase('Description')); ?>"></textarea>
    </div>
    
    <div class="inline-btn mt-5">
        <button class="btn common_btn w-100" type="submit" ><?php echo e(get_phrase('Report')); ?></button>
    </div>
</form>

 
<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH D:\AGUNG MUSTAQIM\drive-download-20250218T071143Z-001\PROJECT-BY-LARAGON\PROJECT-BY-LARAGON\Sociopro\resources\views/frontend/main_content/create_report.blade.php ENDPATH**/ ?>