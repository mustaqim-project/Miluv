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
            <li class="section-title">Fitur</li>

            <li>
                <a class="nav-link active" href="home.html">
                    <span class="dz-icon">
                        <i class="feather icon-home"></i>
                    </span>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="matches.html" class="menu-item">
                    <span class="dz-icon"><i class="fas fa-link"></i></span>
                    <span>Matches</span>
                </a>
            </li>
            <li>
                <a href="timeline.html" class="menu-item">
                    <span class="dz-icon"><i class="fas fa-calendar-alt"></i></span>
                    <span>Timeline</span>
                </a>
            </li>
            <li>
                <a href="badge.html" class="menu-item">
                    <span class="dz-icon"><i class="fas fa-medal"></i></span>
                    <span>Badge</span>
                </a>
            </li>
            <li>
                <a href="blog.html" class="menu-item">
                    <span class="dz-icon"><i class="fas fa-pen"></i></span>
                    <span>Blog</span>
                </a>
            </li>

            <li class="section-title">Akun</li>

            
            <li>
                <a class="nav-link" href="profile.html">
                    <span class="dz-icon">
                        <i class="feather icon-user"></i>
                    </span>
                    <span>My Profile</span>
                </a>
            </li>

            <li>
                <a class="nav-link" href="setting.html">
                    <span class="dz-icon">
                        <i class="feather icon-settings"></i>
                    </span>
                    <span>Settings</span>
                </a>
            </li>

            <li>
                <a href="change-password.html" class="menu-item">
                    <span class="dz-icon"><i class="fas fa-key"></i></span>
                    <span>Change Password</span>
                </a>
            </li>


            <li>
                <a class="nav-link" href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="dz-icon">
                        <i class="feather icon-log-out"></i>
                    </span>
                    <span>Logout</span>
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                    @csrf
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
                <h6 class="name">Miluv - Smart Dating With Ai</h6>
                <span class="ver-info">App Version 1.0</span>
            </div>
        </div>
    </div>
</div>
<!-- Sidebar End -->

