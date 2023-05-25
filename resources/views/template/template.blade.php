<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aset Aset</title>
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/base/base.css') }}?t={{ env('VERSION_TIME') }}">
    <link rel="stylesheet" href="{{ asset('css/base/build.css') }}?t={{ env('VERSION_TIME') }}">

    <!-- vite-->
    @vite('resources/css/app.css')

    <!-- css & js-->
    @yield('head')
</head>

@yield('body')

</html>
