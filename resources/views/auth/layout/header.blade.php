<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @php
        $system_name = \App\Models\Setting::where('type', 'system_name')->value('description');
        $system_favicon = \App\Models\Setting::where('type', 'system_fav_icon')->value('description');
    @endphp
    <title>{{ $system_name }}</title>
    <meta name="keywords"
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
    <link rel="shortcut icon" href="{{ get_system_logo_favicon($system_favicon, 'favicon') }}">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fontawesome/all.min.css') }}">
    <!-- CSS Library -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/venobox.min.css') }}">

    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/own.css') }}">

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
                                <a href="#" class="nav-link" style="color: #ffffff; font-weight: 500; font-size: 16px; text-decoration: none; transition: color 0.3s;">
                                    Blog
                                </a>
                            </li>
                            
                            <!-- Dropdown About Us -->
                            <li class="nav-item dropdown" style="margin: 0 10px;">
                                <a href="#" class="nav-link dropdown-toggle" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #ffffff; font-weight: 500; font-size: 16px; text-decoration: none;">
                                    About Us
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                                    <li><a class="dropdown-item" href="{{ route('about.view') }}">About</a></li>
                                    <li><a class="dropdown-item" href="{{ route('policy.view') }}">Privacy Policy</a></li>
                                    <li><a class="dropdown-item" href="{{ route('term.view') }}">Term & Condition</a></li>
                                    <li><a class="dropdown-item" href="{{ route('contact.view') }}">Contact</a></li>
                                </ul>
                            </li>
                            
                            <!-- Dropdown Support -->
                            <li class="nav-item dropdown" style="margin: 0 10px;">
                                <a href="#" class="nav-link dropdown-toggle" id="supportDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #ffffff; font-weight: 500; font-size: 16px; text-decoration: none;">
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