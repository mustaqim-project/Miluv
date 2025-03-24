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
        <ul class="sidebar-menu">
            <li class="section-title">Fitur Tanpa Login</li>
            <li>
                <a href="#" class="menu-item">
                    <span class="icon">🔗</span>
                    <span>Instant Access</span>
                </a>
            </li>
            <li class="section-title">Akun</li>
            <li>
                <a href="#" class="menu-item">
                    <span class="icon">📛</span>
                    <span>Nama Panggilan</span>
                </a>
            </li>
            <li>
                <a href="#" class="menu-item">
                    <span class="icon">📧</span>
                    <span>Email</span>
                </a>
            </li>
            <li>
                <a href="#" class="menu-item">
                    <span class="icon">🌐</span>
                    <span>Bahasa</span>
                </a>
            </li>
            <li>
                <a href="#" class="menu-item">
                    <span class="icon">📂</span>
                    <span>Data Anda</span>
                </a>
            </li>
            <li class="section-title">Fitur</li>
            <li>
                <a href="#" class="menu-item">
                    <span class="icon">🔑</span>
                    <span>Token Online <span class="badge-new">NEW</span></span>
                </a>
            </li>
            <li>
                <a href="#" class="menu-item">
                    <span class="icon">📩</span>
                    <span>Proxy untuk BI Fast</span>
                </a>
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


<style>
    .sidebar {
        width: 280px;
        background: #fff;
        padding: 20px;
        border-right: 1px solid #ddd;
    }

    .sidebar-header {
        text-align: center;
        font-size: 18px;
        font-weight: bold;
    }

    .search-bar {
        width: 100%;
        padding: 8px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .sidebar-menu {
        list-style: none;
        padding: 0;
    }

    .section-title {
        font-size: 14px;
        font-weight: bold;
        color: #888;
        margin-top: 15px;
        padding: 5px 0;
    }

    .menu-item {
        display: flex;
        align-items: center;
        padding: 10px;
        text-decoration: none;
        color: #333;
        border-radius: 8px;
        transition: background 0.3s;
    }

    .menu-item:hover {
        background: #f4f4f4;
    }

    .icon {
        margin-right: 10px;
        font-size: 18px;
    }

    .badge-new {
        background: #28a745;
        color: white;
        font-size: 12px;
        padding: 2px 6px;
        border-radius: 10px;
        margin-left: 5px;
    }
</style>
