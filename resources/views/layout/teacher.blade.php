<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <link rel="icon" href="{{ asset('user_assets/img/icon.ico') }}" type="image/x-icon"/>

        <!-- Fonts and icons -->
        <script src="{{ asset('user_assets/js/plugin/webfont/webfont.min.js') }}"></script>
        <script>
            WebFont.load({
                google: {"families":["Lato:300,400,700,900"]},
                custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["{{ asset('user_assets/css/fonts.min.css') }}"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>

        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

        <!-- CSS Files -->
        <link rel="stylesheet" href="{{ asset('user_assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('user_assets/css/atlantis.min.css') }}">

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link rel="stylesheet" href="{{ asset('user_assets/css/demo.css') }}">
        @yield('links')
    </head>
    <body data-background-color="bg3">
        <div class="wrapper">
            <div class="main-header">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark2">

                    <a href="index.html" class="logo">
                        <img src="{{ asset('user_assets/img/logo1.png') }}" width="150px" alt="navbar brand" class="navbar-brand">
                    </a>
                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="icon-menu"></i>
                        </span>
                    </button>
                    <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="icon-menu"></i>
                        </button>
                    </div>
                </div>
                <!-- End Logo Header -->
                @include('layout.inc.teacher-nav')
            </div>
            @include('layout.inc.teacher-side')
            <div class="main-panel">
                <div class="content">

                    @yield('content')

                </div>
                @include('layout.inc.teacher-footer')
            </div>
            @include('layout.inc.teacher-custom')
        </div>
        <!--   Core JS Files   -->
        <script src="{{ asset('user_assets/js/core/jquery.3.2.1.min.js') }}"></script>
        <script src="{{ asset('user_assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('user_assets/js/core/bootstrap.min.js') }}"></script>

        <!-- jQuery UI -->
        <script src="{{ asset('user_assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('user_assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

        <!-- jQuery Scrollbar -->
        <script src="{{ asset('user_assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>


        <!-- Chart JS -->
        <script src="{{ asset('user_assets/js/plugin/chart.js/chart.min.js') }}"></script>

        <!-- jQuery Sparkline -->
        <script src="{{ asset('user_assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- Chart Circle -->
        <script src="{{ asset('user_assets/js/plugin/chart-circle/circles.min.js') }}"></script>

        <!-- Datatables -->
        <script src="{{ asset('user_assets/js/plugin/datatables/datatables.min.js') }}"></script>

        <!-- Bootstrap Notify -->
        <script src="{{ asset('user_assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

        <!-- Sweet Alert -->
        <script src="{{ asset('user_assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

        <!-- Atlantis JS -->
        <script src="{{ asset('user_assets/js/atlantis.min.js') }}"></script>

        <!-- Atlantis DEMO methods, don't include it in your project! -->
        <script src="{{ asset('user_assets/js/setting-demo.js') }}"></script>
        <script src="{{ asset('user_assets/js/demo.js') }}"></script>

        <!-- JavaScript -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        @yield('script')
        <script>
            $(document).ready(function() {

                $('#lineChart').sparkline([102,109,120,99,110,105,115], {
                    type: 'line',
                    height: '70',
                    width: '100%',
                    lineWidth: '2',
                    lineColor: '#177dff',
                    fillColor: 'rgba(23, 125, 255, 0.14)'
                });

                $('#lineChart2').sparkline([99,125,122,105,110,124,115], {
                    type: 'line',
                    height: '70',
                    width: '100%',
                    lineWidth: '2',
                    lineColor: '#f3545d',
                    fillColor: 'rgba(243, 84, 93, .14)'
                });

                $('#lineChart3').sparkline([105,103,123,100,95,105,115], {
                    type: 'line',
                    height: '70',
                    width: '100%',
                    lineWidth: '2',
                    lineColor: '#ffa534',
                    fillColor: 'rgba(255, 165, 52, .14)'
                });

                $('#basic-datatables').DataTable({
                });

                $('#multi-filter-select').DataTable( {
                    "pageLength": 5,
                    initComplete: function () {
                        this.api().columns().every( function () {
                            var column = this;
                            var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                    );

                                column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                            } );

                            column.data().unique().sort().each( function ( d, j ) {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            } );
                        } );
                    }
                });

                // Add Row
                $('#add-row').DataTable({
                    "pageLength": 5,
                });
            });

            @if (session('status'))
                // alert('{{ session('status') }}');
                swal({
                    title: '{{ session('status') }}',
                    // text: "You clicked the button!",
                    icon: '{{ session('statuscode') }}',
                    button: "OK",
                });
            @endif
        </script>
    </body>
</html>
