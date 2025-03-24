<div class="menubar-area style-2 footer-fixed">
    <div class="toolbar-inner menubar-nav">
        <a href="/" class="nav-link">
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
        let navLinks = document.querySelectorAll(".nav-link");
        let currentPath = window.location.pathname;

        // Handle jika berada di halaman utama "/"
        if (currentPath === "/") {
            currentPath = "/"; // Pastikan homepage cocok dengan "index.html"
        }

        navLinks.forEach(link => {
            let linkPath = link.getAttribute("href");

            // Cocokkan path dengan href (baik yang pas maupun yang mengandung URL)
            if (currentPath.endsWith(linkPath) || currentPath.includes(linkPath)) {
                link.classList.add("active");
            } else {
                link.classList.remove("active");
            }
        });
    });
</script>


