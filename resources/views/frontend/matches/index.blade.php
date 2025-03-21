<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Title & Favicon -->
    @php
        $system_name = \App\Models\Setting::where('type', 'system_name')->value('description');
        $system_favicon = \App\Models\Setting::where('type', 'system_fav_icon')->value('description');
    @endphp
    <title>{{ $title ?? $system_name }}</title>
    <link rel="shortcut icon" href="{{ get_system_logo_favicon($system_favicon, 'favicon') }}">

    <!-- Preload Critical Resources -->
    <link rel="preload" href="{{ asset('dating/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}"
        as="style">
    <link rel="preload" href="{{ asset('dating/assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}"
        as="style">
    <link rel="preload" href="{{ asset('dating/assets/vendor/swiper/swiper-bundle.min.css') }}" as="style">
    <link rel="preload" href="{{ asset('dating/assets/css/style.css') }}" as="style">
    <link rel="preload"
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        as="style">

    <!-- DNS-Prefetch for External Domains -->
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">

    <!-- Meta Tags -->
    @if (isset($blog) && $blog)
        @include('frontend.master.partials.blog', ['blog' => $blog, 'system_name' => $system_name])
    @elseif (isset($category) && $category)
        @include('frontend.master.partials.category', ['category' => $category, 'system_name' => $system_name])
    @else
        @include('frontend.master.partials.utama', ['system_name' => $system_name])
    @endif

    <!-- Global CSS -->
    <link rel="stylesheet" href="{{ asset('dating/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dating/assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dating/assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dating/assets/css/style.css') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        media="print" onload="this.media='all'">

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FCSFS9Q27Y"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-FCSFS9Q27Y');
    </script>
</head>

<body class="overflow-hidden header-large">
    <div class="page-wrapper">
        <!-- Preloader -->
        @include('frontend.master.layouts.pre')
        <!-- Preloader end-->

        <!-- Header -->
        @include('frontend.master.layouts.header')
        <!-- Header -->

        <!-- Sidebar -->
        @include('frontend.master.layouts.sidebar')
        <!-- Sidebar End -->


        <!-- Page Content Start -->
	<div class="page-content space-top p-b65">
		<div class="container">
			<div class="demo__card-cont dz-gallery-slider">
				<div class="demo__card">
					<div class="dz-media">
						<img src="assets/images/slider/pic1.png" alt="">
					</div>
					<div class="dz-content">
						<div class="left-content">
							<span class="badge badge-primary d-inline-flex gap-1 mb-2"><i class="icon feather icon-map-pin"></i>Nearby</span>
							<h4 class="title"><a href="profile-detail.html">Harleen , 24</a></h4>
							<p class="mb-0"><i class="icon feather icon-map-pin"></i> 3 miles away</p>
						</div>
						<a href="javascript:void(0);" class="dz-icon dz-sp-like"><i class="flaticon flaticon-star-1"></i></a>
					</div>
					<div class="demo__card__choice m--reject">
						<i class="fa-solid fa-xmark"></i>
					</div>
					<div class="demo__card__choice m--like">
						<i class="fa-solid fa-check"></i>
					</div>
					<div class="demo__card__choice m--superlike">
						<h5 class="title mb-0">Super Like</h5>
					</div>
					<div class="demo__card__drag"></div>
				</div>
				
				<div class="demo__card">
					<div class="dz-media">
						<img src="assets/images/slider/pic3.png" alt="">
					</div>
					<div class="dz-content">
						<div class="left-content">
							<span class="badge badge-primary d-inline-flex gap-1 mb-2"><i class="icon feather icon-map-pin"></i>Nearby</span>
							<h4 class="title"><a href="profile-detail.html">Richard , 21</a></h4>
							<p class="mb-0"><i class="icon feather icon-map-pin"></i> 5 miles away</p>
						</div>
						<a href="javascript:void(0);" class="dz-icon dz-sp-like"><i class="flaticon flaticon-star-1"></i></a>
					</div>
					<div class="demo__card__choice m--reject">
						<i class="fa-solid fa-xmark"></i>
					</div>
					<div class="demo__card__choice m--like">
						<i class="fa-solid fa-check"></i>
					</div>
					<div class="demo__card__choice m--superlike">
						<h5 class="title mb-0">Super Like</h5>
					</div>
					<div class="demo__card__drag"></div>
				</div>
				
				<div class="demo__card">
					<div class="dz-media">
						<img src="assets/images/slider/pic4.png" alt="">
					</div>
					<div class="dz-content">
						<div class="left-content">
							<h4 class="title"><a href="profile-detail.html">Natasha , 22</a></h4>
							<p class="mb-0"><i class="icon feather icon-map-pin"></i> 2 miles away</p>
						</div>
						<a href="javascript:void(0);" class="dz-icon dz-sp-like"><i class="flaticon flaticon-star-1"></i></a>
					</div>
					<div class="demo__card__choice m--reject">
						<i class="fa-solid fa-xmark"></i>
					</div>
					<div class="demo__card__choice m--like">
						<i class="fa-solid fa-check"></i>
					</div>
					<div class="demo__card__choice m--superlike">
						<h5 class="title mb-0">Super Like</h5>
					</div>
					<div class="demo__card__drag"></div>
				</div>
				
				<div class="demo__card">
					<div class="dz-media">
						<img src="assets/images/slider/pic3.png" alt="">
					</div>
					<div class="dz-content">
						<div class="left-content">
							<h4 class="title"><a href="profile-detail.html">Lisa Ray , 25</a></h4>
							<ul class="intrest">
								<li><span class="badge">Photography</span></li>
								<li><span class="badge">Street Food</span></li>
								<li><span class="badge">Foodie Tour</span></li>
							</ul>
						</div>
						<a href="javascript:void(0);" class="dz-icon dz-sp-like"><i class="flaticon flaticon-star-1"></i></a>
					</div>
					<div class="demo__card__choice m--reject">
						<i class="fa-solid fa-xmark"></i>
					</div>
					<div class="demo__card__choice m--like">
						<i class="fa-solid fa-check"></i>
					</div>
					<div class="demo__card__choice m--superlike">
						<h5 class="title mb-0">Super Like</h5>
					</div>
					<div class="demo__card__drag"></div>
				</div>
				
				<div class="demo__card">
					<div class="dz-media">
						<img src="assets/images/slider/pic2.png" alt="">
					</div>
					<div class="dz-content">
						<div class="left-content">
							<span class="badge badge-primary mb-2">New here</span>
							<h4 class="title"><a href="profile-detail.html">Richard , 22</a></h4>
							<ul class="intrest">
								<li><span class="badge intrest">Climbing</span></li>
								<li><span class="badge intrest">Skincare</span></li>
								<li><span class="badge intrest">Dancing</span></li>
								<li><span class="badge intrest">Gymnastics</span></li>
							</ul>							
						</div>
						<a href="javascript:void(0);" class="dz-icon dz-sp-like"><i class="flaticon flaticon-star-1"></i></a>
					</div>
					<div class="demo__card__choice m--reject">
						<i class="fa-solid fa-xmark"></i>
					</div>
					<div class="demo__card__choice m--like">
						<i class="fa-solid fa-check"></i>
					</div>
					<div class="demo__card__choice m--superlike">
						<h5 class="title mb-0">Super Like</h5>
					</div>
					<div class="demo__card__drag"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Content End -->
    
        <!-- Page Content Start -->
        {{-- <div class="page-content space-top p-b65">
            <div class="container">
                <div class="demo__card-cont dz-gallery-slider">
                    @foreach ($add_friends as $friend)
                        @php
                            $userId = auth()->id();
                            $friendshipExists = App\Models\Friendships::where(function ($query) use ($userId, $friend) {
                                $query->where('requester', $userId)->where('accepter', $friend->id);
                            })
                                ->orWhere(function ($query) use ($userId, $friend) {
                                    $query->where('requester', $friend->id)->where('accepter', $userId);
                                })
                                ->exists();
                        @endphp

                        @if (!$friendshipExists)
                            <div class="demo__card">
                                <div class="dz-media">
                                    <img src="{{ get_user_image($friend->photo, 'optimized') }}" alt="">
                                </div>
                                <div class="dz-content">
                                    <div class="left-content">
                                        <h4 class="title">
                                            <a href="{{ route('user.profile.view', $friend->id) }}">{{ $friend->name }},
                                                {{ $friend->age }}</a>
                                        </h4>

                                        <ul class="intrest">
                                            @foreach ($friend->hobbies as $hobby)
                                                <li><span class="badge">{{ $hobby }}</span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <a href="javascript:void(0);" class="dz-icon dz-sp-like"><i
                                            class="flaticon flaticon-star-1"></i></a>
                                </div>
                                <div class="demo__card__choice m--reject">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                                <div class="demo__card__choice m--like">
                                    <a href="javascript:;"
                                        onclick="ajaxAction('{{ route('user.friend', $friend->id) }}')">
                                        <i class="fa-solid fa-check"></i>
                                    </a>
                                </div>

                                <div class="demo__card__drag"></div>
                            </div>
                        @endif
                    @endforeach



                </div>
            </div>
        </div> --}}
        <!-- Page Content End -->

        <!-- Menubar -->
        @include('frontend.master.layouts.menu')
        <!-- Menubar -->
    </div>

    <script src="{{ asset('dating/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('dating/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dating/assets/vendor/swiper/swiper-bundle.min.js') }}"></script><!-- Swiper -->
    <script src="{{ asset('dating/assets/vendor/countdown/jquery.countdown.js') }}"></script><!-- COUNTDOWN FUCTIONS  -->
    <script src="{{ asset('dating/assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script><!-- Swiper -->
    <script src="{{ asset('dating/assets/js/tinderSwiper.min.js') }}"></script>
    <script src="{{ asset('dating/assets/js/dz.carousel.js') }}"></script><!-- Swiper -->
    <script src="{{ asset('dating/assets/js/settings.js') }}"></script>
    <script src="{{ asset('dating/assets/js/custom.js') }}"></script>
</body>

</html>
