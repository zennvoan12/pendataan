<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
        <li><a href="/about" class="{{ request()->is('about*') ? 'active' : '' }}">About</a></li>
        <li><a href="/blog" class="{{ request()->is('blog*') ? 'active' : '' }}">Blog</a></li>
        {{-- <li><a href="/contact" class="{{ request()->is('contact*') ? 'active' : '' }}">Contact</a></li> --}}
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
