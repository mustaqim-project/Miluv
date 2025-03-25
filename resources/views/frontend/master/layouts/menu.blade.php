<style>
.menubar-area {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: var(--background);
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    padding: 10px 0;
    display: flex;
    justify-content: space-around;
    align-items: center;
}

.menubar-nav a {
    text-decoration: none;
    color: var(--text-color);
    font-size: 12px;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: all 0.3s ease;
    padding: 10px;
    position: relative;
}

.menubar-nav a i {
    font-size: 20px;
    margin-bottom: 5px;
}

.menubar-nav a:hover {
    color: var(--active-color);
    background: var(--hover-bg);
    border-radius: 10px;
}

.menubar-nav a.active {
    color: var(--active-color);
    font-weight: bold;
}

.floating-button {
    position: absolute;
    bottom: 25px;
    left: 50%;
    transform: translateX(-50%);
    background-color: var(--primary);
    color: #fff;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    font-size: 24px;
    transition: all 0.3s ease-in-out;
}

.floating-button:hover {
    background-color: #e64a19;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    transform: translateX(-50%) scale(1.1);
}
</style>
<div class="menubar-area">
    <div class="toolbar-inner menubar-nav">
        <a href="/" class="nav-link active">
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
            <i class="fa-solid fa-th"></i>
            <span>Blog</span>
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


