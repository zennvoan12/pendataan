<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
        <li><a href="/about" class="{{ request()->is('about*') ? 'active' : '' }}">About</a></li>
        <li><a href="/blog" class="{{ request()->is('blog*') ? 'active' : '' }}">Blog</a></li>
        <li><a href="/categories" class="{{ request()->is('categories') ? 'active' : '' }}">categories</a></li>
        <li>
            <a href="#" data-bs-toggle="modal" data-bs-target="#searchModal">
                <i class="bi bi-search"></i>
            </a>
        </li>
        <li class="nav-item ms-auto">
            <a href="/login" class="nav-link">Login</a>
        </li>
    </ul>

    <!-- Modal Pencarian -->


    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
