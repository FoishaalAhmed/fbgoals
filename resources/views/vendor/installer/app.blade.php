<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('public/images/dummy/logo-sm.png') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('public/assets/backend/js/head.js') }}"></script>

    <!-- Bootstrap css -->
    <link href="{{ asset('public/assets/backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- App css -->
    <link href="{{ asset('public/assets/backend/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Style css -->
    <link href="{{ asset('public/assets/backend/css/style.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons css -->
    <link href="{{ asset('public/assets/backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                @yield('content')
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

</body>

</html>
