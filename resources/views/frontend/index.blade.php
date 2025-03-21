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

    @if (isset($blog) && $blog)
        <!-- Jika halaman detail blog -->
        <title>{{ $blog->meta_title ?? $blog->title }}</title>
        <meta name="description"
            content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->description), 150) }}">
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
                "image": "{{ $blog->thumbnail ? asset('storage/blog/thumbnail/' . $blog->thumbnail) : asset('images/default-og-image.jpg') }}",
                "url": "{{ url()->current() }}",
                "datePublished": "{{ $blog->created_at->format('Y-m-d\TH:i:sP') }}",
                "dateModified": "{{ $blog->updated_at->format('Y-m-d\TH:i:sP') }}",
                "mainEntityOfPage": {
                    "@type": "WebPage",
                    "@id": "{{ url()->current() }}"
                },
                "author": {
                    "@type": "Person",
                    "name": "{{ $blog->getUser->name ?? 'Admin' }}"
                },
                "publisher": {
                    "@type": "Organization",
                    "name": "{{ $system_name }}",
                    "image": {
                        "@type": "ImageObject",
                        "url": "https://miluv.app/public/storage/logo/light/light.png"
                    }
                }
            }
            </script>
    @elseif (isset($category) && $category)
        <!-- Jika halaman kategori blog -->
        <title>{{ $category->name }} - {{ $system_name }}</title>
        <meta name="description"
            content="{{ $category->meta_description ?? 'Jelajahi artikel-artikel menarik seputar ' . $category->name . ' di ' . $system_name }}">
        <meta name="keywords" content="{{ $category->meta_keyword ?? $category->name }}">
        <link rel="canonical" href="{{ url()->current() }}">
        <meta name="robots" content="index, follow">

        <!-- Open Graph Meta Tags for Category -->
        <meta property="og:title" content="{{ $category->meta_title ?? $category->name }} - {{ $system_name }}">
        <meta property="og:description"
            content="{{ $category->meta_description ?? 'Jelajahi artikel-artikel menarik seputar ' . $category->name . ' di ' . $system_name }}">
        <meta property="og:image" content="{{ asset('storage/category/thumbnail/' . $category->thumbnail) }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">

        <!-- Twitter Card Meta Tags for Category -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $category->meta_title ?? $category->name }} - {{ $system_name }}">
        <meta name="twitter:description"
            content="{{ $category->meta_description ?? 'Jelajahi artikel-artikel menarik seputar ' . $category->name . ' di ' . $system_name }}">
        <meta name="twitter:image" content="{{ asset('storage/category/thumbnail/' . $category->thumbnail) }}">

        <!-- Structured Data (JSON-LD) for Category -->
        <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "{{ $category->meta_title ?? $category->name }} - {{ $system_name }}",
    "description": "{{ $category->meta_description ?? 'Jelajahi artikel-artikel menarik seputar ' . $category->name . ' di ' . $system_name }}",
    "url": "{{ url()->current() }}",
    "image": "{{ asset('storage/category/thumbnail/' . $category->thumbnail) }}"
}
</script>
    @else
        <!-- Jika halaman umum -->
        <title>{{ $system_name }}</title>
        <meta name="keywords"
            content="cari jodoh online, aplikasi cari jodoh terpopuler, cari jodoh serius, miluv dating app, aplikasi jodoh miluv">
        <meta name="description"
            content="Miluv adalah aplikasi media sosial & kencan online terbaik untuk menemukan pasangan hidup. Temukan jodoh serius dengan bantuan AI!">
        <link rel="canonical" href="{{ url()->current() }}">
        <meta name="robots" content="index, follow">

        <!-- Open Graph Meta Tags for Social Media -->
        <meta property="og:title" content="Miluv - Media Sosial & Dating App">
        <meta property="og:description"
            content="Miluv adalah aplikasi media sosial & kencan online terbaik untuk menemukan pasangan hidup. Dibantu AI untuk temukan pasangan yang cocok!">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ asset('images/default-og-image.jpg') }}">

        <!-- Twitter Card Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Miluv - Temukan Jodoh Serius">
        <meta name="twitter:description" content="Gabung dengan jutaan pengguna Miluv dan temukan pasangan hidupmu!">
        <meta name="twitter:image" content="{{ asset('images/default-twitter-image.jpg') }}">

        <!-- Structured Data (JSON-LD) for Home -->

        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@graph": [
                    {
                        "@type": "Organization",
                        "name": "Miluv - Media Sosial & Dating App",
                        "alternateName": ["Miluv", "Miluv Dating", "Miluv Sosial"],
                        "url": "https://miluv.app/",
                        "image": "https://miluv.app/public/storage/logo/light/light.png",
                        "sameAs": [
                            "https://www.instagram.com/miluv.app/",
                            "https://x.com/MiluvDating",
                            "https://www.youtube.com/@MiluvDatingApp",
                            "https://www.linkedin.com/company/miluv-dating"
                        ],
                        "contactPoint": [
                            {
                                "@type": "ContactPoint",
                                "telephone": "+62-823-3749-9577",
                                "contactType": "Customer Support",
                                "contactOption": "TollFree",
                                "areaServed": "ID",
                                "availableLanguage": ["Indonesian", "English"]
                            }
                        ]
                    },
                    {
                        "@type": "WebSite",
                        "name": "Miluv - Media Sosial & Dating App",
                        "alternateName": "Miluv App",
                        "url": "https://miluv.app/",
                        "image": "https://miluv.app/public/storage/logo/light/light.png",
                        "potentialAction": {
                            "@type": "SearchAction",
                            "target": "https://miluv.app/search?q={search_term_string}",
                            "query-input": "required name=search_term_string"
                        }
                    },
                    {
                        "@type": "LocalBusiness",
                        "name": "Miluv Indonesia",
                        "description": "Miluv adalah aplikasi media sosial & kencan online terbaik untuk menemukan pasangan hidup dengan bantuan AI.",
                        "address": {
                            "@type": "PostalAddress",
                            "streetAddress": "Jl. Sudirman No. 123",
                            "addressLocality": "Jakarta Selatan",
                            "addressRegion": "DKI Jakarta",
                            "postalCode": "12940",
                            "addressCountry": "ID"
                        },
                        "telephone": "+62-823-3749-9577",
                        "image": "https://miluv.app/public/storage/logo/light/light.png",
                        "priceRange": "Gratis - Premium",
                        "openingHours": "Monday to Sunday, 24 hours",
                        "sameAs": [
                            "https://www.instagram.com/miluv.app/",
                            "https://x.com/MiluvDating",
                            "https://www.youtube.com/@MiluvDatingApp",
                            "https://www.linkedin.com/company/miluv-dating"
                        ]
                    }
                ]
            }
            </script>
    @endif


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

    <!-- Job Addon CSS -->
    @if (addon_status('job') == 1)
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/job/style.css') }}">
    @endif

    <!-- JavaScript Libraries -->
    <script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FCSFS9Q27Y"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-FCSFS9Q27Y');
    </script>



    <style>
        .swipe-container {
            width: 90%;
            max-width: 400px;
            position: relative;
            margin: auto;
            margin-top: 50px;
        }

        .sugg-card {
            width: 100%;
            height: 500px;
            position: absolute;
            background-size: cover;
            background-position: center;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .sugg-card h4 {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 10px;
        }

        .btn-connect {
            position: absolute;
            bottom: 60px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
    </style>

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
