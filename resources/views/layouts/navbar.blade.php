<nav>
    <div class="nav-bar">
        <i class='bx bx-menu sidebarOpen'></i>
        <span class="logo navLogo"><a href="#">Goodtimes</a></span>

        <div class="menu">
            <div class="logo-toggle">
                <div class="profile-container"></div>
                <span class="logo"><a href="#">Goodtimes</a></span>
                <i class='bx bx-x siderbarClose'></i>
            </div>
            <ul class="nav-links">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">My Times</a></li>
            </ul>
        </div>

        <div class="darkLight-mode">

            <div class="dark-light">
                <i class='bx bx-moon moon'></i>
                <i class='bx bx-sun sun'></i>
            </div>

            <div class="userMenu">
                <div class="profileToggle">
                    <img src="https://i.pravatar.cc/40" alt="User">
                </div>
                <div class="profile-dropdown">
                    <a href="#">Profil</a>
                    <a href="#">Logout</a>
                </div>
            </div>

        </div>
    </div>
</nav>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const body = document.querySelector("body"),
            nav = document.querySelector("nav"),

            modeToggle = document.querySelector(".dark-light"),

            userMenu = document.querySelector(".userMenu");
        profileDropdown = document.querySelector(".profile-dropdown");
        profileContainer = document.querySelector(".profile-container");

        sidebarOpen = document.querySelector(".sidebarOpen"),
            siderbarClose = document.querySelector(".siderbarClose");

        let getMode = localStorage.getItem("mode");
        if (getMode && getMode === "dark-mode") {
            body.classList.add("dark");
        }

        // js code to toggle dark and light mode
        modeToggle.addEventListener("click", () => {
            modeToggle.classList.toggle("active");
            body.classList.toggle("dark");

            if (!body.classList.contains("dark")) {
                localStorage.setItem("mode", "light-mode");
            } else {
                localStorage.setItem("mode", "dark-mode");
            }
        });

        // js code toggle profile menu
        userMenu.addEventListener("click", (e) => {
            e.stopPropagation();
            profileDropdown.style.display = profileDropdown.style.display === "block" ? "none" :
            "block";
        });

        document.addEventListener("click", (e) => {
            if (!userMenu.contains(e.target)) {
                profileDropdown.style.display = "none";
            }
        });

        function updateProfilePosition() {
            if (window.innerWidth <= 768) {
                if (!profileContainer.contains(userMenu)) {
                    profileContainer.appendChild(userMenu);
                }
            } else {
                const darkLightMode = document.querySelector(".darkLight-mode");
                if (!darkLightMode.contains(userMenu)) {
                    darkLightMode.appendChild(userMenu);
                }
            }
        }

        //   js code to toggle sidebar
        sidebarOpen.addEventListener("click", () => {
            nav.classList.add("active");
        });

        body.addEventListener("click", e => {
            let clickedElm = e.target;
            if (!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains(
                "menu")) {
                nav.classList.remove("active");
            }
        });

        updateProfilePosition();
        window.addEventListener("resize", updateProfilePosition);
    })
</script>
