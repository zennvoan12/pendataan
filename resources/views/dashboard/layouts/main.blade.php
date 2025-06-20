<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Home | Mantis Bootstrap 5 Admin Template</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords"
        content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <!-- [Favicon] icon -->
    @include('dashboard.layouts.partials.css')

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    @include('dashboard.layouts.sidebar')
    <!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
    @include('dashboard.layouts.header')
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">{{ $title ?? 'Home' }}</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title ?? 'Post' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- [ Main Content ] end -->


        @yield('container')




        <!-- [Page Specific JS] start -->
        {{-- <script src="../assets/js/plugins/apexcharts.min.js"></script> --}}
        {{-- <script src="../assets/js/pages/dashboard-default.js"></script> --}}
        <!-- [Page Specific JS] end -->
        @include('dashboard.layouts.partials.js')



{{--
        <script>
            layout_change('light');
        </script>




        <script>
            change_box_container('false');
        </script>



        <script>
            layout_rtl_change('false');
        </script>


        <script>
            preset_change("preset-1");
        </script>


        <script>
            font_change("Public-Sans");
        </script> --}}



</body>
<!-- [Body] end -->

</html>
