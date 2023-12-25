<!doctype html>
<html class="no-js" lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content=""{{ csrf_token() }}>
    <title>@yield('title')</title>
    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#A3A3A2">

    <link rel="manifest" href="{{ asset('/site.webmanifest') }}">
    <link rel="apple-touch-icon" href="{{ asset('/icon.png') }}">
    {{--    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">-->--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('/css/materialize.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">


    {{--    @yield('head')--}}
    <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>

</head>

<body class="grey lighten-2">

<main class="main container">
    @yield('content')
</main>

@include('footer')


</body>

</html>
