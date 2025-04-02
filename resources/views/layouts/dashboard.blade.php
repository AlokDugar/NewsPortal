<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Dashboard</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="" content="">
        <meta name="author" content="pixelstrap">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="icon" href="{{ asset('storage/' . ($settings->favicon ?? 'default-favicon.ico')) }}" type="image/x-icon">
        <link rel="shortcut icon" href="" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

        <!-- App css-->
        <link rel="stylesheet" type="text/css" href="assets/css/themes.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

        <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
        <!-- Custom css-->
        <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
        <!-- <link rel="stylesheet" type="text/css" href="assets/css/responsive.css"> -->

        @stack('css')


    </head>

    <body>
        <!-- tap on top starts-->
        <div class="tap-top"><i data-feather="chevrons-up"></i></div>
        <!-- tap on tap ends-->
        <!-- page-wrapper Start-->
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
            @include('layouts.partials.header')
            <div class="page-body-wrapper">
                @include('layouts.partials.sidebar')
                @yield('content')
                @include('layouts.partials.footer')
            </div>
        </div>
        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap js -->
        <script src="assets/vendor/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- feather icon js -->
        <script src="assets/vendor/fonts/feather-icon/js/feather.min.js"></script>
        <script src="assets/vendor/fonts/feather-icon/js/feather-icon.js"></script>
        <!-- scrollbar js -->
        <script src="assets/vendor/libs/scrollbar/js/simplebar.js"></script>
        <script src="assets/vendor/libs/scrollbar/js/custom.js"></script>
        <!-- Sidebar jquery -->
        <script src="assets/vendor/libs/pages/config.js"></script>
        <script src="assets/vendor/libs/pages/sidebar-menu.js"></script>

        <!-- Tooltip init -->
        <script src="assets/js/pages/tooltip-init.js"></script>
        <!-- Template js -->
        <script src="assets/js/script.js"></script>

        @stack('scripts')


    </body>

</html>
