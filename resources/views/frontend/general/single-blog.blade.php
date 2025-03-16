<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @php
        $system_name = \App\Models\Setting::where('type', 'system_name')->value('description');
        $system_favicon = \App\Models\Setting::where('type', 'system_fav_icon')->value('description');
    @endphp

    <!-- CSRF Token for AJAX submissions -->
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ get_system_logo_favicon($system_favicon, 'favicon') }}">

    <!-- Dynamic Meta Tags -->

    <!-- Jika halaman detail blog -->
    <title>{{ $blog->meta_title ?? $blog->title }}</title>
    <meta name="description" content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->description), 150) }}">
    <meta name="keywords" content="{{ $blog->meta_keyword ?? '' }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta Tags for Blog -->
    <meta property="og:title" content="{{ $blog->meta_title ?? $blog->title }}">
    <meta property="og:description"
        content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->description), 150) }}">
    <meta property="og:image" content="{{ asset('storage/blog/thumbnail/' . $blog->thumbnail) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">

    <!-- Twitter Card Meta Tags for Blog -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $blog->meta_title ?? $blog->title }}">
    <meta name="twitter:description"
        content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->description), 150) }}">
    <meta name="twitter:image" content="{{ asset('storage/blog/thumbnail/' . $blog->thumbnail) }}">

    <!-- Structured Data (JSON-LD) for Blog -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "headline": "{{ $blog->meta_title ?? $blog->title }}",
        "description": "{{ $blog->meta_description ?? Str::limit(strip_tags($blog->description), 150) }}",
        "image": "{{ asset('storage/blog/thumbnail/' . $blog->thumbnail) }}",
        "url": "{{ url()->current() }}",
        "datePublished": "{{ $blog->created_at }}",
        "dateModified": "{{ $blog->updated_at }}",
        "author": {
            "@type": "Person",
            "name": "{{ $blog->getUser->name ?? 'Admin' }}"
        },
        "publisher": {
            "@type": "Organization",
            "name": "{{ $system_name }}",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ asset('images/logo.png') }}"
            }
        }
    }
    </script>


    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/plyr/plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/leafletjs/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plyr_cdn_dw.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/tagify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/uploader/file-uploader.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery-rbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/gallery/justifiedGallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/toaster/toaster.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/summernote-0.8.18-dist/summernote-lite.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/own.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/pc.style.css') }}">

    <!-- Paid Content CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/paid-content/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/addon_layout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/paid-content/css/new_scss/new_style.css') }}">

    <!-- Fundraiser CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/style_make.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/custom_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/new-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/new-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/new_scss/new_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/custom_new.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/custom_responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/venobox.min.css') }}">

    <!-- Job Addon CSS -->
    @if (addon_status('job') == 1)
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/job/style.css') }}">
    @endif

    <!-- JavaScript Libraries -->
    <script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
</head>

@php
    // Set tema warna default menjadi 'light'
    $theme_color = 'light'; 

    // Tentukan gambar berdasarkan tema (gunakan gambar untuk tema light)
    $image = asset('assets/frontend/images/white_moon.svg');
@endphp

<body class="{{ $theme_color }}">

    @php 
        // Gunakan logo dengan tema 'light'
        $system_light_logo = \App\Models\Setting::where('type', 'system_light_logo')->value('description'); 
    @endphp

    <!-- header -->
    <header class="header header-default py-3">
        <nav class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-auto col-lg-6">
                        <div class="logo-branding mt-1">
                            <a class="navbar-brand d-xs-hidden"
   href="@if (Auth::check()) {{ route('timeline') }} @endif">
    <img src="{{ get_system_logo_favicon($system_light_logo, 'light') }}"
         style="width: 100%; max-width: 80px;" 
         class="d-xs-hidden" alt="logo" />
</a>


                            <a class="navbar-brand d-block"
                                href="@if (Auth::check()) {{ route('timeline') }} @endif">
                                <img src="{{ get_system_logo_favicon($system_light_logo, 'favicon') }}"  style="width: 100%; max-width: 40px;" 
                                    class="d-hidden d-xs-show mt--5px" alt="logo" />
                            </a>
                        </div>
                    </div>

                    <div class="col-auto col-lg-6 ms-auto">
                        <div class="login-btns ms-5">
                            <a href="{{ route('login') }}"
                                class="btn @if (Route::currentRouteName() == 'login') active @endif">{{ __('Login') }}</a>
                            @if (get_settings('public_signup') == 1)
                                <a href="{{ route('register') }}"
                                    class="btn @if (Route::currentRouteName() == 'register') active @endif">{{ __('Sign up') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>





    
    <main class="main my-4 mt-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    {{-- @include('frontend.left_navigation') --}}
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
                                            <div class="user-comments bg-white"
                                                id="user-comments-{{ $blog->id }}">
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
                                                <p class="text-center">You need to <a href="{{ route('login') }}"><strong>log in</strong></a> to comment.</p>

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
                            </div> <!-- Recent Post Widget End -->
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



    {{-- @include('frontend.common_scripts') --}}

    {{-- @include('frontend.toaster') --}}

    {{-- @include('frontend.initialize') --}}

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
