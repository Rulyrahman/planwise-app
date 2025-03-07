<nav>
    <div class="nav-bar">
        <i class='bx bx-menu sidebarOpen'></i>
        <span class="logo navLogo"><a href="/">Goodtimes</a></span>

        <div class="menu">
            <div class="logo-toggle">
                <div class="profile-container"></div>
                <span class="logo"><a href="/">Goodtimes</a></span>
                <i class='bx bx-x siderbarClose'></i>
            </div>
            <ul class="nav-links">
                <li><a href="/">DASHBOARD</a></li>
                <li><a href="#">MY TIMES</a></li>
            </ul>
        </div>

        <div class="darkLight-mode">

            <div class="dark-light">
                <i class='bx bx-moon moon'></i>
                <i class='bx bx-sun sun'></i>
            </div>

            <div class="userMenu">
                <div class="profileToggle">
                    @if (Auth::check())
                        <img src="{{ Auth::user()->profile_image ?? 'https://i.pravatar.cc/40' }}" alt="User">
                    @else
                        <i class='bx bx-user-circle'></i>
                    @endif
                </div>
                @if (Auth::check())
                    <div class="profile-dropdown">
                        <a href="#">PROFIL MENU</a>
                        <a href="#">LOGOUT</a>
                    </div>
                @else
                    <div class="profile-dropdown">
                        <a href="/login">LOGIN</a>
                        <a href="/register">REGISTER</a>
                    </div>
                @endif
            </div>

        </div>
    </div>
</nav>
