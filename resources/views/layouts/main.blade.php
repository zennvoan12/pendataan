<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SMANDAK | {{ $title }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    @include('layouts.partials.vendor.css')

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center">

            <a href="/" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">SMA 1 Kadupandak</h1><span>.</span>
            </a>

            <!-- Page Title -->
            <div class="page-title accent-background">
                <div class="container d-lg-flex justify-content-between align-items-center">
                    <h1 class="mb-2 mb-lg-0">About</h1>
                    <nav class="breadcrumbs">
                        <ol>
                            <li><a href="/">Home</a></li>
                            <li class="current">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- End Page Title -->

            <div class="header-social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

        </div>
    </header>
    <!-- End Header -->
    {{-- Page Title --}}
    @include('layouts.partials.page-title')

    <main class="main">
        <!-- Hero Section -->
        @yield('container')


    </main>

    {{-- Footer --}}
    @include('layouts.partials.footer')



    <!-- Main JS File -->
    @include('layouts.partials.vendor.js')

</body>

</html>
