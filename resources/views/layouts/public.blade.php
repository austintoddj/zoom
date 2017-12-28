<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700" rel="stylesheet">
    <link href="{{ asset('css/public.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/toolkit-minimal.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/application-minimal.css') }}" rel="stylesheet">
</head>


<body>
    @yield('content')

    <script src="{{ asset('js/public.js') }}"></script>
    <script src="{{ asset('vendor/js/toolkit.js') }}"></script>
    <script src="{{ asset('vendor/js/application.js') }}"></script>
    @if(!empty(env('GOOGLE_ANALYTICS')))
        @include('public.components.analytics.tracking')
    @endif
</body>
</html>
