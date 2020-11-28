<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">

    {{--  Fontawesome  --}}
    <script src="https://kit.fontawesome.com/e68fdc85c1.js" crossorigin="anonymous"></script>

    <title>
        @yield('page-title')
    </title>
</head>
<body>
