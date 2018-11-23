<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="hyper/images/favicon.ico">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- CSS from theme -->
    <link href="{{ asset('hyper/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('hyper/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('hyper/css/app.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

<!-- Begin page -->
<div class="wrapper">

    @include('partials.left-sidebar')

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            @include('partials.topbar')

            <!-- Start Content-->
            <div class="container-fluid">

                @include('partials.page-title')

                @yield('content')

            </div>
            <!-- container -->

        </div>
        <!-- content -->

        @include('partials.footer')

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

@include('partials.right-sidebar')

<!-- Theme JS -->
<script src="{{ asset('hyper/js/app.js') }}"></script>
<script src="{{ asset('hyper/js/vendor/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('hyper/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('hyper/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('hyper/js/pages/demo.dashboard.js') }}"></script>

<!-- Third party -->
<script src="{{ asset('js/push.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
