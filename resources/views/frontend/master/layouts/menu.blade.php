<style>
    .floating-button {
        position: absolute;
        bottom: 20px; /* Atur posisi vertikal */
        left: 50%;
        transform: translateX(-50%);
        background-color:  #fff; /* Warna tombol */
        color: #000000;
        padding: 15px 20px;
        border-radius: 50%;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        font-size: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }

    .floating-button:hover {
        background-color:  #fff;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
    }
</style>

<div class="menubar-area style-2 footer-fixed">
    <div class="toolbar-inner menubar-nav">
        <a href="/" class="nav-link">
            <i class="fa-solid fa-user-friends"></i>
            <span>Matches</span>
        </a>
        <a href="timeline.html" class="nav-link">
            <i class="fa-solid fa-globe"></i>
            <span>Explore</span>
        </a>
        <a href="index.html" class="floating-button">
            <i class="fa-solid fa-plus"></i>
        </a>
        <a href="blog.html" class="nav-link">
            <i class="fa-solid fa-pen-to-square"></i>
            <span>Article</span>
        </a>
        <a href="settings.html" class="nav-link">
            <i class="fa-solid fa-user"></i>
            <span>Profile</span>
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


