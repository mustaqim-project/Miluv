<!-- Sidebar -->
<div class="dark-overlay"></div>
<div class="sidebar">
    <div class="inner-sidebar">
        <a href="profile.html" class="author-box">
            <div class="dz-info">
                <h5 class="name">{{ auth()->user()->name }}</h5>
            </div>
        </a>
        <ul class="sidebar-menu"> 
            <li class="section-title">Fitur</li>
            <li>
                <a href="matches.html" class="menu-item">
                    <span class="icon"><i class="fas fa-link"></i></span>
                    <span>Matches</span>
                </a>
            </li>
            <li>
                <a href="timeline.html" class="menu-item">
                    <span class="icon"><i class="fas fa-calendar-alt"></i></span>
                    <span>Timeline</span>
                </a>
            </li>
            <li>
                <a href="badge.html" class="menu-item">
                    <span class="icon"><i class="fas fa-medal"></i></span>
                    <span>Badge</span>
                </a>
            </li>
            <li>
                <a href="blog.html" class="menu-item">
                    <span class="icon"><i class="fas fa-pen"></i></span>
                    <span>Blog</span>
                </a>
            </li>
        
            <li class="section-title">Akun</li>
            <li>
                <a href="my-profile.html" class="menu-item">
                    <span class="icon"><i class="fas fa-user"></i></span>
                    <span>My Profile</span>
                </a>
            </li>
            <li>
                <a href="settings.html" class="menu-item">
                    <span class="icon"><i class="fas fa-cog"></i></span>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a href="change-password.html" class="menu-item">
                    <span class="icon"><i class="fas fa-key"></i></span>
                    <span>Change Password</span>
                </a>
            </li>
            <li>
                <a href="logout.html" class="menu-item">
                    <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span>Log Out</span>
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

    .badge-new {
        background: #28a745;
        color: white;
        font-size: 12px;
        padding: 2px 6px;
        border-radius: 10px;
        margin-left: 5px;
    }
</style>
