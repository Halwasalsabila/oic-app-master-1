<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>YOSL - OIC | @yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/css/materialdesign.css') }}">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/shared/style.css') }}">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{ asset('css/demo_1/style.css') }}">
    <!-- Layout style -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <!-- Tambahan Style -->
    <link rel="stylesheet" href="{{ asset('css/demo_1/styletbh.css') }}">
    @stack('style')
</head>

<body class="header-fixed">
    @include('component.header')
    <!-- partial -->
    <div class="page-body">
        @include('component.sidebar')
        <!-- partial -->
        <!-- CONTENT -->
        <div class="page-content-wrapper">

            @yield('main')
        </div>
        <!-- END CONTENT -->
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="{{ asset('vendors/js/core.js') }}"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="{{ asset('vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src=" {{ asset('vendors/chartjs/Chart.min.js') }}"></script>
    <script src=" {{ asset('js/charts/chartjs.addon.js') }}"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src=" {{ asset('js/template.js') }}"></script>
    <script src=" {{ asset('js/dashboard.js') }}"></script>
    <!-- endbuild -->
    <!-- Script Tambahan -->
    @stack('scripts')
</body>

</html>
