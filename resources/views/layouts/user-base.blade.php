<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Portal RPTAR Alumni</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!--<img src="assets/images/RP.png" alt="">-->
                <h1 class="sitename">RPTAR Alumni</h1>
            </a>


            <nav id="navmenu" class="navmenu">
                <ul>
                    @if (auth()->check() && auth()->user()->role === 'user')
                        <!-- Menu for Logged-in Users -->
                        <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                        <li><a href="" class="">About</a></li>
                        <li><a href="" class="">News</a>
                        </li>
                        <li><a href="" class="">Events</a></li>
                        <li><a href="" class="">Donations</a></li>
                        <li><a href="" class="">Inquiries</a></li>
                        <!-- Account Dropdown -->
                        <li class="dropdown">
                            <a href="#" class="btn-getstarted" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Hi, {{ auth()->user()->name }}</i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Messages</a></li>
                                <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Logout Form (hidden) -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <!-- Menu for Guests -->
                        <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                        <li><a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">About</a></li>
                        <li><a href="/news" class="{{ request()->is('news') ? 'active' : '' }}">News</a></li>
                        <li><a href="/events" class="{{ request()->is('events') ? 'active' : '' }}">Events</a></li>
                        <li><a href="/donations" class="{{ request()->is('donations') ? 'active' : '' }}">Donation</a>
                        </li>
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            @guest
                <a class="btn-getstarted" href="{{ route('login') }}">Login Account</a>
            @endguest


        </div>
    </header>

    <main class="main">

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Content -->
            @yield('content')

        </div>
        <!-- /.container-fluid -->
    </main>

    <footer id="footer" class="footer position-relative light-background">

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">RPTAR Alumni</strong><span>All Rights
                    Reserved</span></p>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
