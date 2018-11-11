<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Procurement</title>
    <link rel="stylesheet" type="text/css" id="theme"  href="{{ asset('css/theme-default.css') }}"/>
    <link rel="stylesheet" type="text/css" id="theme"  href="{{ asset('css/select2.css') }}"/>

    <script type="text/javascript" src="{{ asset('js/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/select2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/auth/register.js') }}"></script>
</head>

<body>

    @yield('content')
</body>
</html>
