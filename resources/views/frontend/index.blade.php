<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @php
        $system_name = \App\Models\Setting::where('type', 'system_name')->value('description');
        $system_favicon = \App\Models\Setting::where('type', 'system_fav_icon')->value('description');
    @endphp
    <title>{{ $system_name }}</title>

    <!-- CSRF Token for ajax for submission -->
    <meta name="csrf_token" content="{{ csrf_token() }}" />


    <meta property="og:title" content="@yield('meta_og_title', config('settings.site_name'))" />
    <meta property="og:description" content="@yield('meta_og_description', config('settings.site_seo_description'))" />
    <meta property="og:image" content="@yield('meta_og_image', asset(config('settings.site_logo')))" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="{{ config('settings.site_name') }}" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('meta_tw_title', config('settings.site_name'))" />
    <meta name="twitter:description" content="@yield('meta_tw_description', config('settings.site_seo_description'))" />
    <meta name="twitter:image" content="@yield('meta_tw_image', asset(config('settings.site_logo')))" />
    <meta name="twitter:site" content="@yield('meta_tw_site', '@yourtwitterhandle')" />

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ get_system_logo_favicon($system_favicon, 'favicon') }}" /> 

    {{-- <meta name="keywords"
        content="cari jodoh online, aplikasi cari jodoh terpopuler, cari jodoh serius, miluv dating app, aplikasi jodoh miluv">
    <meta name="description"
        content="Miluv adalah aplikasi media sosial & kencan online terbaik untuk menemukan pasangan hidup. Temukan jodoh serius dengan bantuan AI!">

    <!-- Open Graph Meta Tags for Social Media -->
    <meta property="og:title" content="Miluv - Media Sosial & Dating App">
    <meta property="og:description"
        content="Miluv adalah aplikasi media sosial & kencan online terbaik untuk menemukan pasangan hidup. Dibantu AI untuk temukan pasangan yang cocok!">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:title" content="Miluv - Temukan Jodoh Serius">
    <meta name="twitter:description" content="Gabung dengan jutaan pengguna Miluv dan temukan pasangan hidupmu!">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ get_system_logo_favicon($system_favicon, 'favicon') }}" /> --}}

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fontawesome/all.min.css') }}">
    <!-- CSS Library -->

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">

    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/plyr/plyr.css') }}">
    <link href="{{ asset('assets/frontend/leafletjs/leaflet.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/css/plyr_cdn_dw.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/tagify.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/uploader/file-uploader.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/jquery-rbox.css') }}" rel="stylesheet">

    <!-- paid content start -->
    <link rel="apple-touch-icon" href="images/favicon.png" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/paid-content/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/addon_layout.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/paid-content/css/new_scss/new_style.css') }}" />
    <!-- paid content end -->




    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/gallery/justifiedGallery.min.css') }}">
    <link href="{{ asset('assets/frontend/toaster/toaster.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/frontend/summernote-0.8.18-dist/summernote-lite.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/own.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/pc.style.css') }}" />

    {{-- fundraiser --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/style_make.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/custom_style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/new-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/new-responsive.css') }}" />


    <!-- New -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/new_scss/new_style.css') }}" />

    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/css/fundraiser/images/favicon.png') }}" />

    {{-- end fundraiser --}}

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/daterangepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/custom_new.css') }}" />

    {{-- Job Addon Css --}}
    @if (addon_status('job') == 1)
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/job/style.css') }}" />
    @endif
    {{-- Job Addon Css --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fundraiser/css/custom_responsive.css') }}" />
    <script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>

    <title>{{ $blog->meta_title ?? $blog->title }}</title>
    <meta name="description" content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->description), 150) }}">
    <meta name="keywords" content="{{ $blog->meta_keyword ?? '' }}">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $blog->meta_title ?? $blog->title }}">
    <meta property="og:description" content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->description), 150) }}">
    <meta property="og:image" content="{{ asset('storage/blog/thumbnail/' . $blog->thumbnail) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $blog->meta_title ?? $blog->title }}">
    <meta name="twitter:description" content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->description), 150) }}">
    <meta name="twitter:image" content="{{ asset('storage/blog/thumbnail/' . $blog->thumbnail) }}">

    @stack('meta')



</head>
{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title & Description -->
    <title>@yield('title', config('settings.site_name'))</title>
    <meta name="description" content="@yield('meta_description', config('settings.site_seo_description'))">

    <!-- Open Graph (Facebook, WhatsApp, LinkedIn) -->
    <meta property="og:title" content="@yield('meta_og_title', config('settings.site_name'))" />
    <meta property="og:description" content="@yield('meta_og_description', config('settings.site_seo_description'))" />
    <meta property="og:image" content="@yield('meta_og_image', asset(config('settings.site_logo')))" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="{{ config('settings.site_name') }}" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('meta_tw_title', config('settings.site_name'))" />
    <meta name="twitter:description" content="@yield('meta_tw_description', config('settings.site_seo_description'))" />
    <meta name="twitter:image" content="@yield('meta_tw_image', asset(config('settings.site_logo')))" />
    <meta name="twitter:site" content="@yield('meta_tw_site', '@yourtwitterhandle')" />

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.ico') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Additional Meta (Custom Head Section) -->
    @stack('meta')

    <!-- Additional Styles -->
    @stack('styles')

    <!-- Scripts -->
    @stack('scripts')
</head> --}}

@if (Session::get('theme_color'))
    @php
        $theme_color = Session::get('theme_color');
        if ($theme_color === 'dark') {
            $image = asset('assets/frontend/images/white_sun.svg');
        } else {
            $image = asset('assets/frontend/images/white_moon.svg');
        }
    @endphp
@else
    @php
        $theme_color = 'default';
        $image = asset('assets/frontend/images/white_moon.svg');
    @endphp
@endif

@php
    $themeColor = App\Models\Setting::where('type', 'theme_color')->value('description');
@endphp

<body class="{{ $themeColor }} {{ $theme_color }}">
    @php $user_info = Auth()->user() @endphp

    @include('frontend.header')

    <!-- Main Start -->
    <main class="main my-4 mt-12">
        <div class="container">
            <div class="row">

                @if (isset($layout))
                    @include($view_path)
                @else
                    <div class="col-lg-3">
                        @include('frontend.left_navigation')
                    </div>
                    <!-- Timeline Navigation End -->

                    <!-- Content Section Start -->
                    <div class="col-lg-6 col-sm-12 order-3 order-lg-2">
                        @include($view_path)
                    </div>
                    <div class="col-lg-3 order-2 order-lg-3">
                        @include('frontend.right_sidebar', ['type' => 'my_account'])
                    </div>
                @endif

            </div> <!-- row end -->

        </div> <!-- container end -->
    </main>
    <!-- Main End -->

    <!-- Common modals -->
    @include('frontend.modal')
    {{-- @include('meta') --}}



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
        $(document).ready(function() {
            $('#dark').click(function() {
                console.log("Dark button clicked");
                $('.webgl body').toggleClass('test');
                console.log("Class 'test' toggled on .webgl elements");
            });
        });
    </script>


</body>

</html>
