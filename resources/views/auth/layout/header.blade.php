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


</head>

<body class="bg-white login">


    @php $system_light_logo = \App\Models\Setting::where('type', 'system_light_logo')->value('description'); @endphp

    <!-- header -->
    <header class="header header-default py-3">
        <nav class="navigation">
            <div class="container">
                <div class="row">
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

                    <div class="col-auto col-lg-6 ms-auto text-end">
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
