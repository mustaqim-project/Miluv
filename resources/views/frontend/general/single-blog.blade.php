
@include('auth.layout.header')

    <main class="main my-4 mt-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight"
                        aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header res_logo d-lg-none py-4">
                            <div class="logo">
                                <img class="max-width-200" width="80%"
                                    src="{{ asset('storage/logo/dark/' . get_settings('system_dark_logo')) }}"
                                    alt="">
                            </div>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close">x</button>
                        </div>
                        <div class="offcanvas-body s_offcanvas">
                            <div class="timeline-navigation">
                                <nav class="menu-wrap">
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li class="{{ request()->segment(2) == $category->slug ? 'active' : '' }}">
                                                <a href="{{ route('category.blog', $category->slug) }}">
                                                    <i class="fas fa-folder" style="opacity: 0.6; margin-right:1em;"></i> {{ $category->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                        <li class="{{ Route::currentRouteName() == 'about.view' ? 'active' : '' }}">
                                            <a href="{{ route('about.view') }}">
                                                <i class="fas fa-info-circle" style="opacity: 0.6; margin-right:1em;"></i> {{ get_phrase('About') }}
                                            </a>
                                        </li>
                                        <li class="{{ Route::currentRouteName() == 'policy.view' ? 'active' : '' }}">
                                            <a href="{{ route('policy.view') }}">
                                                <i class="fas fa-user-shield" style="opacity: 0.6; margin-right:1em;"></i> {{ get_phrase('Privacy Policy') }}
                                            </a>
                                        </li>
                                        <li class="{{ Route::currentRouteName() == 'term.view' ? 'active' : '' }}">
                                            <a href="{{ route('term.view') }}">
                                                <i class="fas fa-file-contract" style="opacity: 0.6; margin-right:1em;"></i> {{ get_phrase('Terms and Conditions') }}
                                            </a>
                                        </li>
                                        <li class="{{ Route::currentRouteName() == 'contact.view' ? 'active' : '' }}">
                                            <a href="{{ route('contact.view') }}">
                                                <i class="fas fa-envelope" style="opacity: 0.6; margin-right:1em;"></i> {{ get_phrase('Contact') }}
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                

                                <div class="footer-nav">
                                    <div class="copy-rights text-muted">
                                        @php
                                            $sitename = \App\Models\Setting::where('type', 'system_name')->value(
                                                'description',
                                            );
                                        @endphp
                                        <p>© {{ date('Y') }} Miluv</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Timeline Navigation End -->

                <!-- Content Section Start -->
                <div class="col-lg-6 col-sm-12 order-3 order-lg-2">
                    <div class="single-wrap">
                        <div class="sblog_feature bg-white radius-8">
                            <div class="blog-feature "
                                style="background-image: url('{{ get_blog_image($blog->thumbnail, 'coverphoto') }}')">
                                <div class="blog-head">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ get_user_image($blog->user_id, 'optimized') }}"
                                            class="user-round user_image_show_on_modal" alt="">
                                        <div class="ava-info ms-2">
                                            <h6 class="mb-0"><a
                                                    href="{{ route('user.profile.view', $blog->getUser->id) }}">{{ $blog->getUser->name }}</a>
                                            </h6>
                                            <small>{{ $blog->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>

                                </div>
                            </div><!--  Blog Cover End -->
                            <div class="sm_bottom">
                                <div>
                                    <a href="#"> {{ $blog->created_at->format('d-M-Y') }} </a>
                                    <h1>{{ $blog->title }}</h1>
                                </div>
                                <div class="bhead-meta">
                                    <span>{{ $total_comments }} {{ get_phrase('Comments') }}</span>
                                    <span>{{ count(json_decode($blog->view)) }} {{ get_phrase('Views') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-12 ">
                            <div class="col-lg-12">
                                <div class="card border-none p-3 radius-8 nblog_details blog-details">
                                    @php echo script_checker($blog->description, false); @endphp
                                    <div class="blog-footer">
                                        <div
                                            class="post-share justify-content-between align-items-center border-bottom pb-3">
                                            <div class="post-meta ">
                                                <h4 class="h3">{{ get_phrase('tags:') }}</h4>
                                                @php
                                                    $tags = json_decode($blog->tag, true);
                                                @endphp

                                                @if (is_array($tags))
                                                    @foreach ($tags as $tag)
                                                        <a href="#"><span
                                                                class="badge common_btn_3 mt-1">#{{ $tag }}</span></a>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="p-share d-flex align-items-center mt-20">
                                                <h3 class="h6">{{ get_phrase('Share') }}: </h3>
                                                <div class="social-share ms-2">
                                                    <ul>
                                                        @foreach ($socailshare as $key => $value)
                                                            <li><a href="{{ $value }}" target="_blank"><i
                                                                        class="fa-brands fa-{{ $key }}"></i></a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Comment Start -->
                                        <div class="user-comments bg-white" id="user-comments-{{ $blog->id }}">
                                            @if (Auth::check())
                                                <!-- Check if the user is logged in -->
                                                <div class="comment-form nBlog_user d-flex p-3 bg-secondary">
                                                    <img src="{{ get_user_image(Auth()->user()->photo, 'optimized') }}"
                                                        alt="" class="rounded-circle h-39 img-fluid "
                                                        width="40px">
                                                    <form action="javascript:void(0)" class="w-100 ms-2"
                                                        method="post">
                                                        <input class="form-control py-3"
                                                            onkeypress="postComment(this, 0, {{ $blog->id }}, 0,'blog');"
                                                            rows="1" placeholder="Write Comments">
                                                    </form>
                                                </div>
                                            @else
                                                <p class="text-center">You need to <a
                                                        href="{{ route('login') }}"><strong>log in</strong></a> to
                                                    comment.</p>

                                                <!-- Display login prompt -->
                                            @endif
                                            <ul class="comment-wrap pt-3 pb-0 list-unstyled"
                                                id="comments{{ $blog->id }}">
                                                {{-- @include('frontend.main_content.comments', [ 
                                                                'comments' => $comments,
                                                                'post_id' => $blog->id,
                                                                'type' => 'blog',
                                                            ]) --}}
                                            </ul>
                                            {{-- @if ($comments->count() < $total_comments)
                                                            <a class="btn p-3 pt-0"
                                                                onclick="loadMoreComments(this, {{ $blog->id }}, 0, {{ $total_comments }}, 'blog')">{{ get_phrase('View Comment') }}</a>
                                                        @endif --}}
                                        </div>


                                    </div><!--  Blog Details Footer End -->
                                </div>
                            </div>
                            {{-- <div class="col-lg-5">
                                           
                                        </div> --}}
                        </div>
                    </div><!-- Single Page Wrap End -->
                    @include('frontend.main_content.scripts')
                    @include('frontend.initialize')
                </div>


                <div class="col-lg-3 order-2 order-lg-3">

                    <aside class="sidebar mt-0 sidebarToggle" id="sidebarToggle">
                        <aside class="sidebar">
                            <div class="widget recent-posts blog_searchs">


                                <div class=" search-widget mb-14">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h3 class="widget-title">{{ get_phrase('Search') }}</h3>
                                    </div>
                                    <form action="#" class="search-form">
                                        <input class="bg-secondary" type="search" id="searchblogfield"
                                            placeholder="Search">
                                        <span><i class="fa fa-search"></i></span>
                                    </form>
                                </div>


                                <h3 class="widget-title mb-12">{{ get_phrase('Recent Post') }}</h3>
                                <div class="posts-wrap" id="searchblogviewsection">
                                    @foreach ($recent_posts as $post)
                                        <div class="post-entry d-flex mb-8">
                                            <div class="post-thumb"><img class="img-fluid rounded"
                                                    src="{{ get_blog_image($post->thumbnail, 'thumbnail') }}"
                                                    alt="Recent Post">
                                            </div>
                                            <div class="post-txt ms-2">
                                                <h3 class="mb-0"><a class="ellipsis-line-2"
                                                        href="{{ route('single.blog', $post->slug) }}">{{ $post->title }}</a>
                                                </h3>
                                                <div class="post-meta border-none">
                                                    <span class="date-meta"><a
                                                            href="#">{{ $post->created_at->format('d-M-Y') }}</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>





                                <h3 class="widget-title mb-12">{{ get_phrase('Most View') }}</h3>
                                <div class="posts-wrap" id="searchblogviewsection">
                                    @foreach ($most_views as $most_view)
                                        <div class="post-entry d-flex mb-8">
                                            <div class="post-thumb">
                                                <img class="img-fluid rounded"
                                                    src="{{ get_blog_image($most_view->thumbnail, 'thumbnail') }}"
                                                    alt="Recent Post">
                                            </div>
                                            <div class="post-txt ms-2">
                                                <h3 class="mb-0">
                                                    <a class="ellipsis-line-2"
                                                        href="{{ route('single.blog', $most_view->slug) }}">
                                                        {{ $most_view->title }}
                                                    </a>
                                                </h3>
                                                <div class="post-meta border-none">
                                                    <span class="date-meta">
                                                        <a
                                                            href="#">{{ $most_view->created_at->format('d-M-Y') }}</a>
                                                    </span>
                                                    <span class="views-meta ms-2">
                                                        {{ count(json_decode($most_view->view, true)) }} views
                                                    </span>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>



                            <div class="widget tag-widget">
                                <h3 class="widget-title mb-3">{{ get_phrase('Categories') }}</h3>
                                <div class="tags">
                                    @foreach ($categories as $category)
                                        <a href="{{ route('category.blog', $category->slug) }}"
                                            class=" @if ($post->category_id == $category->id) active @endif">{{ $category->name }}
                                            ({{ DB::table('blogs')->where('category_id', $category->id)->get()->count() }})
                                        </a>
                                    @endforeach
                                </div>
                            </div>




                        </aside>
                    </aside>
                </div>

            </div> <!-- row end -->

        </div> <!-- container end -->
    </main>
    <!-- Main End -->








    <!--Javascript
    ========================================================-->
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.datepicker.min.js') }}"></script>


    <script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/plyr/plyr.js') }}"></script>
    <script src="{{ asset('assets/frontend/jquery-form/jquery.form.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/leafletjs/leaflet.js') }}"></script>
    <script src="{{ asset('assets/frontend/leafletjs/leaflet-search.js') }}"></script>
    <script src="{{ asset('assets/frontend/toaster/toaster.js') }}"></script>

    <script src="{{ asset('assets/frontend/gallery/jquery.justifiedGallery.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/js/jQuery.tagify.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-rbox.js') }}"></script>


    <script src="{{ asset('assets/frontend/js/plyr_cdn_dw.js') }}"></script>

    <script src="{{ asset('js/share.js') }}"></script>

    <script src="{{ asset('assets/frontend/uploader/file-uploader.js') }}"></script>

    <script src="{{ asset('assets/frontend/summernote-0.8.18-dist/summernote-lite.min.js') }}"></script>


    {{-- fundraiser start----- --}}
    {{-- <script src="{{ asset('assets/frontend/css/fundraiser/js/custom.js') }}"></script> --}}
    <script src="{{ asset('assets/frontend/css/fundraiser/js/custom_btn.js') }}"></script>
    <script src="{{ asset('assets/frontend/css/fundraiser/js/new-script.js') }}"></script>
    {{-- <script src="{{ asset('assets/frontend/css/fundraiser/js/profile-table.js') }}"></script> --}}
    {{-- fundraiser end---- --}}



    {{-- paid content start --}}
    <script src="{{ asset('assets/frontend/paid-content/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/paid-content/js/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/frontend/paid-content/js/jquery-tjgallery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/paid-content/js/custom.js') }}"></script>
    <script src="{{ asset('assets/frontend/paid-content/js/script.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/addon_layout.js') }}"></script>
    {{-- paid content end --}}

    <script src="{{ asset('assets/frontend/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/daterangepicker.min.js') }}"></script>

    {{-- <script src="{{ asset('assets/frontend/js/custom.js') }}"></script> --}}

    <script src="{{ asset('assets/frontend/js/initialize.js') }}"></script>



    @include('frontend.common_scripts')

    @include('frontend.toaster')

    @include('frontend.initialize')

    <script>
        "use strict";

        $(document).ready(function() {
            $('[name=tag]').tagify({
                duplicates: false
            });
        });
    </script>

    <script>
        $("document").ready(function() {
            var dark = document.getElementById('dark');
            var storedThemeColor = sessionStorage.getItem('theme_color');
            if (storedThemeColor) {
                document.body.classList.add(storedThemeColor);
            }

            dark.onclick = function() {
                document.body.classList.toggle('dark');
                var themeColor = document.body.classList.contains('dark') ? 'dark' : 'default';
                var url = "<?php echo route('update-theme-color'); ?>";
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        themeColor: themeColor
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        sessionStorage.setItem('theme_color', themeColor);
                        if (themeColor === 'dark') {
                            $('#dark').attr('src',
                                '{{ asset('assets/frontend/images/white_sun.svg') }}');
                        } else {

                            $('#dark').attr('src',
                                '{{ asset('assets/frontend/images/white_moon.svg') }}');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating theme color:', error);
                    }
                });
                return false;
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let targetElement = document.querySelector(".sblog_feature");
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
                targetElement.setAttribute("tabindex", "-1"); // Pastikan bisa difokuskan
                targetElement.focus();
            }
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#dark').click(function() {
                console.log("Dark button clicked");
                $('.webgl body').toggleClass('test');
                console.log("Class 'test' toggled on .webgl elements");
            });
        });
    </script>
    @include('auth.layout.footer')


</body>

</html>
