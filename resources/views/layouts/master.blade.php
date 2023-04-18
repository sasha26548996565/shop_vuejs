<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'AdminLTE 3 | Dashboard')</title>
        <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <div class="preloader flex-column justify-content-center align-items-center">
                <p class="animation__shake">SHOP VUE</p>
            </div>
            @include('includes.navbar')
            @include('includes.sidebar')

            <div class="content-wrapper">
                @yield('content')
            </div>

        @include('includes.footer')
        </div>

        <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
        <script>
            $('.select2').select2();
        </script>
    </body>
</html>
