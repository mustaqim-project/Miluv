<!-- Sidebar -->
<div class="dark-overlay"></div>
<div class="sidebar">
    <div class="inner-sidebar">
        <a href="profile.html" class="author-box">
            <div class="dz-media">
                <img src="{{ get_user_image(auth()->user()->photo, 'optimized') }}" alt="author-image">
            </div>
            <div class="dz-info">
                <h5 class="name">{{ auth()->user()->name }}</h5>
            </div>
        </a>
        <ul class="nav navbar-nav">	
            <li>
                <a class="nav-link active" href="home.html">
                    <span class="dz-icon">
                        <i class="icon feather icon-home"></i>
                    </span>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="index.html">
                    <span class="dz-icon">
                        <i class="icon feather icon-wind"></i>
                    </span>
                    <span>Welcome</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="components.html">
                    <span class="dz-icon">
                        <i class="icon feather icon-grid"></i>
                    </span>
                    <span>Components</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="wishlist.html">
                    <span class="dz-icon">
                        <i class="icon feather icon-heart"></i>
                    </span>
                    <span>Wishlist</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="setting.html">
                    <span class="dz-icon">
                        <i class="icon feather icon-settings"></i>
                    </span>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="profile.html">
                    <span class="dz-icon">
                        <i class="icon feather icon-user"></i>
                    </span>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link" href="route('logout')"onclick="event.preventDefault(); this.closest('form').submit();">
                         <span class="dz-icon">
                            <i class="icon feather icon-log-out"></i>
                        </span>
                        <span>Logout</span>
                    </a>
                </form>
            </li>
        </ul>
        <div class="sidebar-bottom">
            <ul class="app-setting">
                <li>
                    <div class="mode">
                        <span class="dz-icon">                        
                            <i class="icon feather icon-moon"></i>
                        </span>					
                        <span>Dark Mode</span>
                        <div class="custom-switch">
                            <input type="checkbox" class="switch-input theme-btn" id="toggle-dark-menu">
                            <label class="custom-switch-label" for="toggle-dark-menu"></label>
                        </div>					
                    </div>
                </li>
            </ul>
            <div class="app-info">
                <h6 class="name">W3Dating - Dating App</h6>
                <span class="ver-info">App Version 1.0</span>
            </div>
        </div>
    </div>
</div>
<!-- Sidebar End -->