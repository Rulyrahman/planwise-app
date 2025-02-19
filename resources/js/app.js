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

    const listItems = document.querySelectorAll(".text-list li");
    const scroller = document.querySelector(".scroller");

    // Text animation homepage
    function animateRandomly() {
        let usedIndexes = new Set();

        listItems.forEach(item => {
            item.style.opacity = "0";
        });

        function showNextBubble() {
            if (usedIndexes.size >= listItems.length) {
                setTimeout(animateRandomly, 2000);
                return;
            }

            let randomIndex;
            do {
                randomIndex = Math.floor(Math.random() * listItems.length);
            } while (usedIndexes.has(randomIndex));

            usedIndexes.add(randomIndex);

            let item = listItems[randomIndex];

            let randomX = Math.random() * (scroller.clientWidth - 150);
            let randomY = Math.random() * (scroller.clientHeight - 50);

            item.style.left = `${randomX}px`;
            item.style.top = `${randomY}px`;

            item.style.animation = "fadeInBubble 0.5s forwards";

            setTimeout(() => {
                item.style.animation = "fadeOutBubble 0.5s forwards";
            }, 1800);

            setTimeout(showNextBubble, Math.random() * 1000 + 500);
        }

        showNextBubble();
    }

    // Toggle dark and light mode
    let getMode = localStorage.getItem("mode");
    if (getMode === "dark-mode") {
        body.classList.add("dark");
    }

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
    animateRandomly();
});
