<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Login | Mantis Bootstrap 5 Admin Template</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords"
        content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">
    @include('layouts.partials.vendor.css')
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form">
                <div class="auth-header">
                    <a href="/" class="logo d-flex align-items-center me-auto">
                        <!-- Uncomment the line below if you also wish to use an image logo -->
                        <!-- <img src="assets/img/logo.png" alt=""> -->
                        <h2 class="sitename">SMA 1 Kadupandak</h2><span>.</span>
                    </a>
                </div>
                <div class="card my-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-end mb-4">
                            <h3 class="mb-0"><b>Login</b></h3>
                            <a href="/register" class="link-primary">Don't have an account?</a>
                        </div>
                        {{-- alert Pop Up --}}


                        {{-- ALERT DESIGNER --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 shadow rounded-4 px-4 py-3"
                                style="z-index: 9999; min-width:300px;" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 shadow rounded-4 px-4 py-3"
                                style="z-index: 9999; min-width:300px;" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 shadow rounded-4 px-4 py-3"
                                style="z-index: 9999; min-width:300px;" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                {{ $errors->first() }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card shadow rounded-4 p-4" style="min-width: 350px;">

                            <form method="POST" action="{{ route('login.authenticate') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="login">Email or Username</label>
                                    <input type="text" class="form-control @error('login') is-invalid @enderror"
                                        id="login" name="email" placeholder="Email or Username"
                                        value="{{ old('email') }}" required autofocus>
                                    @error('login')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-flex mt-1 justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input input-primary" type="checkbox" id="remember"
                                            name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label text-muted" for="remember">Keep me signed
                                            in</label>

                                        <div class="d-grid mt-4">
                                            <button type="submit"
                                                class="btn btn-primary rounded-2 fw-bold py-2">Login</button>
                                        </div>
                            </form>
                        </div>


                </div>
            </div>

        </div>
    </div>
    <div class="auth-footer row">
        <!-- <div class=""> -->
        <div class="col my-1">
            <p class="m-0">Copyright © <a href="#">Codedthemes</a></p>
        </div>
        <div class="col-auto my-1">
            <ul class="list-inline footer-link mb-0">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                <li class="list-inline-item"><a href="#">Contact us</a></li>
            </ul>
        </div>
        <!-- </div> -->
    </div>
</div>
</div>
</div>
<!-- [ Main Content ] end -->
<!-- Required Js -->




@include('layouts.partials.vendor.js')

</body>
<!-- [Body] end -->

</html>
