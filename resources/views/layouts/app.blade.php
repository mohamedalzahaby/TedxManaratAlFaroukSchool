<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/about.css" rel="stylesheet">







    <!-- Browser themes -->
    <meta name="theme-color" content="#000">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Font Icons -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('css/flickity.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <!-- Main styles -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Color skin -->
    <link rel="stylesheet" href="{{ asset('css/color_red.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropdownForm.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css' />

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>

    @if (!Auth::guest())
        <link rel="stylesheet" href="{{ asset('css/notificationStyle.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/notification2.css') }}">
    @endif



</head>
<body>
    <div id="app">
    @include('inc.navbar')


        <main class="py-4">
                @include('inc.messages')
            @yield('content')
        </main>
    </div>

</body>
</html>
