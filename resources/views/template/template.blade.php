<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aset Aset</title>
    <link rel="shortcut icon" href="" type="image/x-icon">

    {{-- Build CSS --}}
    <link rel="stylesheet" href="{{ asset('css/build.css') }}?t={{ env('VERSION_TIME') }}">

    <!-- vite-->
    @vite('resources/css/base.css')

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- css & js-->
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}?t={{ env('VERSION_TIME') }}">
    @yield('head')
</head>

<body class="bg-cLightGrey">
    @yield('body')

    <x-footer />

    <script src="{{ asset('js/navigation-bar.js') }}?t={{ env('VERSION_TIME') }}"></script>
</body>

</html>
