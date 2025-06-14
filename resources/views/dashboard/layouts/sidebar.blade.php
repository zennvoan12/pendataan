<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="/" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="../assets/images/logo-dark.svg" class="img-fluid logo-lg" alt="logo">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="/dashboard" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="/dashboard/blog" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-file"></i></span>
                        <span class="pc-mtext">Posts</span>
                    </a>
                </li>

            </ul>

            @if (auth()->user()->isAdmin())
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-4 mt-4 mb-1 text-muted">
                    Adminstration
                </h6>

                <ul class="pc-navbar">
                    <li class="pc-item">
                        <a href="{{ route('admin.users.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-users"></i></span>
                            <span class="pc-mtext">Management Users</span>
                        </a>
                    </li>

                    <li class="pc-item">
                        <a href="{{ route('admin.categories.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-list"></i></span>
                            <span class="pc-mtext">Post Category</span>
                        </a>
                    </li>

                </ul>
                @endif
        </div>
    </div>
    </div>
</nav>
