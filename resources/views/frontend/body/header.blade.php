<header class="top-header top-header-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-2 pr-0">
                <div class="language-list">
                    <select class="language-list-item">
                        <option>English</option>
                        <option>العربيّة</option>
                        <option>Deutsch</option>
                        <option>Português</option>
                        <option>简体中文</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-9 col-md-10">
                <div class="header-right">
                    <ul>
                        <li>
                            <i class='bx bx-home-alt'></i>
                            <a href="#">123 Virgil A Stanton, Virginia, USA</a>
                        </li>
                        <li>
                            <i class='bx bx-phone-call'></i>
                            <a href="tel:+1-(123)-456-7890">+1 (123) 456 7890</a>
                        </li>
                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <li>
                                        <i class='bx bxs-dashboard'></i>
                                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                    </li>
                                @else
                                    <li>
                                        <i class='bx bxs-dashboard'></i>
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                @endif
                                <li>
                                    <i class='bx bxs-log-out'></i>
                                    <a href="{{ route('user.logout') }}">Logout</a>
                                </li>
                            @else
                            <li>
                                <i class='bx bxs-log-in'></i>
                                <a href="{{ route('login') }}">login</a>
                            </li>
                            <li>
                                <i class='bx bxs-user-rectangle'></i>
                                <a href="{{ route('register') }}">register</a>
                            </li>

                            @endauth


                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
