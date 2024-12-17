<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - SafeVault</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/images/icons/logo.svg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Boxicons --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/fonts/boxicons/css/boxicons.min.css') }}"> --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>
    @yield('content')
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @stack('script')

</body>

</html>
