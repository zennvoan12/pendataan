{{-- <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="bi-back"></i>
            <span>Topic</span>
        </a>

        <div class="d-lg-none ms-auto me-4">
            <a href="/" class="navbar-icon bi-person smoothscroll"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}"  >Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}" href="{{ route('profile.show', ['id' => 1]) }}">Profile</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('alumni') ? 'active' : '' }}" href="{{ url('/alumni') }}">Data Alumni</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('berita') ? 'active' : '' }}" href="{{ url('/berita') }}">Berita Kegiatan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('galeri') ? 'active' : '' }}" href="{{ url('/galeri') }}">Galeri</a>
                </li>



            </ul>
            <form class="d-flex mx-5" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#searchModal">Search</button>
                </form>
            <div class="d-none d-lg-block">
                <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
            </div>
        </div>
    </div>
</nav> --}}
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="bi-back"></i>
            <span>Topic</span>
        </a>

        <div class="d-lg-none ms-auto me-4">
            <a href="/" class="navbar-icon bi-person smoothscroll"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('alumni') ? 'active' : '' }}" href="{{ url('/alumni') }}">Data
                        Alumni</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('berita') ? 'active' : '' }}" href="{{ url('/berita') }}">Berita
                        Kegiatan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('galeri') ? 'active' : '' }}" href="{{ url('/galeri') }}">Galeri
                    </a>
                </li>

            </ul>

            <div class="d-none d-lg-block">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
