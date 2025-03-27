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
        <link rel="icon" href="" type="image/x-icon">
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
        <!-- latest jquery -->
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
        <!-- Datatables -->
        <script src="assets/vendor/libs/datatable/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.buttons.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/jszip.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/buttons.colVis.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/pdfmake.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/vfs_fonts.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.autoFill.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.select.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/buttons.html5.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/buttons.print.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.responsive.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/responsive.bootstrap4.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.keyTable.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.colReorder.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.fixedHeader.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.rowReorder.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/dataTables.scroller.min.js"></script>
        <script src="assets/vendor/libs/datatable/datatable-extension/js/custom.js"></script>
        <!-- Tooltip init -->
        <script src="assets/js/pages/tooltip-init.js"></script>
        <!-- Template js -->
        <script src="assets/js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </body>

</html>
