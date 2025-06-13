<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SMANDAK | {{ $title }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">


    <!-- Vendor CSS Files -->
    @include('layouts.partials.vendor.css')

</head>

<body class="index-page">

    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchModalLabel">Search</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Pencarian -->
                    <form action="{{ route('blog.search') }}" method="GET">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @elseif (request('author'))
                            <input type="hidden" name="author" value="{{ request('author') }}">
                        @endif
                        <div class="mb-3">
                            <label for="searchInput" class="form-label">Search</label>
                            <input type="text" class="form-control" id="searchInput" value="{{ request('search') }}"
                                name="search" placeholder="Search for posts," required>
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center">

            <a href="/" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">SMAN 1 Kadupandak</h1><span>.</span>
            </a>

            <!-- Page Title -->
            @include('layouts.partials.navbar')
            <!-- End Page Title -->

            {{-- <div class="header-social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div> --}}

        </div>
    </header>
    <!-- End Header -->
    {{-- Page Title --}}

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
