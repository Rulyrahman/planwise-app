import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    const body = document.querySelector("body"),
        nav = document.querySelector("nav"),
        modeToggle = document.querySelector(".dark-light"),
        userMenu = document.querySelector(".userMenu"),
        profileDropdown = document.querySelector(".profile-dropdown"),
        profileContainer = document.querySelector(".profile-container"),
        sidebarOpen = document.querySelector(".sidebarOpen"),
        sidebarClose = document.querySelector(".sidebarClose");

    let getMode = localStorage.getItem("mode");
    if (getMode === "dark-mode") {
        body.classList.add("dark");
    }

    // Toggle dark and light mode
    if (modeToggle) {
        modeToggle.addEventListener("click", () => {
            modeToggle.classList.toggle("active");
            body.classList.toggle("dark");

            localStorage.setItem(
                "mode",
                body.classList.contains("dark") ? "dark-mode" : "light-mode"
            );
        });
    }

    // Toggle profile menu
    if (userMenu && profileDropdown) {
        userMenu.addEventListener("click", function (e) {
            e.stopPropagation();
            profileDropdown.classList.toggle("active");
        });

        document.addEventListener("click", function (event) {
            if (
                !userMenu.contains(event.target) &&
                !profileDropdown.contains(event.target)
            ) {
                profileDropdown.classList.remove("active");
            }
        });

        document
            .querySelectorAll(".profile-dropdown a, .profile-dropdown button")
            .forEach((item) => {
                item.addEventListener("click", function (e) {
                    e.stopPropagation();
                    nav.classList.remove("active");
                    profileDropdown.classList.remove("active");
                });
            });
    }

    // Update profile menu position on resize
    function updateProfilePosition() {
        if (!userMenu || !profileContainer) return;

        if (window.innerWidth <= 768) {
            if (!profileContainer.contains(userMenu)) {
                profileContainer.appendChild(userMenu);
            }
        } else {
            const darkLightMode = document.querySelector(".dark-light-mode");
            if (darkLightMode && !darkLightMode.contains(userMenu)) {
                darkLightMode.appendChild(userMenu);
            }
        }
    }

    // Toggle sidebar
    if (sidebarOpen) {
        sidebarOpen.addEventListener("click", () => {
            nav.classList.add("active");
        });
    }

    if (sidebarClose) {
        sidebarClose.addEventListener("click", () => {
            nav.classList.remove("active");
        });
    }

    body.addEventListener("click", (e) => {
        let clickedElm = e.target;
        if (
            !clickedElm.classList.contains("sidebarOpen") &&
            !clickedElm.classList.contains("menu")
        ) {
            nav.classList.remove("active");
        }
    });

    updateProfilePosition();
    window.addEventListener("resize", updateProfilePosition);
});
