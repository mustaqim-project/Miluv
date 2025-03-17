<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @php
        $system_name = \App\Models\Setting::where('type', 'system_name')->value('description');
        $system_favicon = \App\Models\Setting::where('type', 'system_fav_icon')->value('description');
    @endphp
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ get_system_logo_favicon($system_favicon, 'favicon') }}">

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
                    "logo": {
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
                        "logo": "https://miluv.app/public/storage/logo/light/light.png",
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
                        "logo": "https://miluv.app/public/storage/logo/light/light.png",
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







    <style>
        .nav-link:hover {
            color: #ff4500 !important;
            text-decoration: underline;
        }
    </style>
</head>

<body class="bg-white login">


    @php $system_light_logo = \App\Models\Setting::where('type', 'system_light_logo')->value('description'); @endphp

    <!-- header -->
    <header class="header header-default py-3" style="background-color: #003488">
        <nav class="navigation">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-sm-4">
                        <div class="logo-branding">
                            <button class="d-lg-none" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <i class="fw-bold fa-solid fa-sliders-h"></i>
                            </button>
                            @php
                                $system_light_logo = \App\Models\Setting::where('type', 'system_light_logo')->value(
                                    'description',
                                );
                            @endphp
                            <a class="navbar-brand mt-2" href="{{ route('timeline') }}">
                                <img src="{{ get_system_logo_favicon($system_light_logo, 'light') }}"
                                    class="logo_height_width" alt="logo" />
                            </a>
                        </div>
                    </div>

                    <!-- Menu dummy hanya untuk desktop -->
                    <div class="col-lg-6 d-none d-lg-flex justify-content-center">
                        <ul class="nav" style="list-style: none; padding: 0; margin: 0;">
                            <li class="nav-item" style="margin: 0 10px;">
                                <a href="#" class="nav-link"
                                    style="color: #ffffff; font-weight: 500; font-size: 16px; text-decoration: none; transition: color 0.3s;">
                                    Blog
                                </a>
                            </li>

                            <!-- Dropdown About Us -->
                            <li class="nav-item dropdown" style="margin: 0 10px;">
                                <a href="#" class="nav-link dropdown-toggle" id="aboutDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    style="color: #ffffff; font-weight: 500; font-size: 16px; text-decoration: none;">
                                    About Us
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                                    <li><a class="dropdown-item" href="{{ route('about.view') }}">About</a></li>
                                    <li><a class="dropdown-item" href="{{ route('policy.view') }}">Privacy Policy</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('term.view') }}">Term & Condition</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('contact.view') }}">Contact</a></li>
                                </ul>
                            </li>

                            <!-- Dropdown Support -->
                            <li class="nav-item dropdown" style="margin: 0 10px;">
                                <a href="#" class="nav-link dropdown-toggle" id="supportDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="color: #ffffff; font-weight: 500; font-size: 16px; text-decoration: none;">
                                    Support
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="supportDropdown">
                                    <li><a class="dropdown-item" href="#">FAQ</a></li>
                                    <li><a class="dropdown-item" href="#">Help Center</a></li>
                                    <li><a class="dropdown-item" href="#">Safety Tips</a></li>
                                    <li><a class="dropdown-item" href="#">Report a User</a></li>
                                    <li><a class="dropdown-item" href="#">Community Guidelines</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>







                    <div class="col-auto col-lg-4 ms-auto text-end">
                        <div class="login-btns" style="margin-right: 20px;">
                            <a href="{{ route('login') }}"
                                class="btn @if (Route::currentRouteName() == 'login') active @endif"
                                style="font-size: 14px; padding: 6px 12px; margin-left: 5px;">
                                {{ __('Login') }}
                            </a>

                            @if (get_settings('public_signup') == 1)
                                <a href="{{ route('register') }}"
                                    class="btn @if (Route::currentRouteName() == 'register') active @endif"
                                    style="font-size: 14px; padding: 6px 12px; margin-left: 5px;">
                                    {{ __('Sign up') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Header End -->

    @include('auth.left-nav')
