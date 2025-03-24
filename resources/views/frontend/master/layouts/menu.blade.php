<div class="menubar-area style-2 footer-fixed">
    <div class="toolbar-inner menubar-nav">
        <a href="matches.html" class="nav-link">
            <i class="icon feather icon-heart-on"></i>
            <span>Matches</span>
        </a>
        <a href="timeline.html" class="nav-link">
            <i class="fa-solid fa-image"></i>
            <span>Timeline</span>
        </a>
        <a href="index.html" class="nav-link">
            <i class="fa-solid fa-house"></i>
            <span>Home</span>
        </a>
        <a href="blog.html" class="nav-link">
            <i class="icon feather icon-grid"></i>
            <span>Blog</span>
        </a>
        <a href="settings.html" class="nav-link">
            <i class="fa-solid fa-gear"></i>
            <span>Settings</span>
        </a>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil semua elemen dengan class "nav-link"
        let navLinks = document.querySelectorAll(".nav-link");
        // Ambil URL path saat ini
        let currentPath = window.location.pathname.split("/").pop();

        navLinks.forEach(link => {
            // Ambil href dari tiap link
            let linkPath = link.getAttribute("href");

            // Jika URL saat ini cocok dengan href, tambahkan class "active"
            if (linkPath === currentPath) {
                link.classList.add("active");
            } else {
                link.classList.remove("active");
            }
        });
    });
</script>

