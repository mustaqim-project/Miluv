<!DOCTYPE html>
<html lang="en">



<head>
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
</head>

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
