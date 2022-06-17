<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <title>Welcome to QuizzyQuick</title>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="{{ asset('assets/js/all.js') }}" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="{{ asset('assets/css/simple-line-icons.min.css') }}" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('assets/css/portal.css') }}" rel="stylesheet" />
        @yield('link')

    </head>
    <body id="page-top">
        <!-- Header-->
        @include('inc.nav')
        <header class="masthead d-flex align-items-center" style="background: linear-gradient(90deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.1) 100%), url('{{ asset('assets/img/bg-masthead.jpg') }}');background-position: center center;background-repeat: no-repeat;background-size: cover;">
            <div class="container px-4 px-lg-5 text-center">
                @yield('content')
            </div>
        </header>
        @yield('section')
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
    </body>
</html>
