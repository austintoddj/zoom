<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div class="top-bar"></div>
    @include('admin.components.nav.navbar')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8 offset-lg-2">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
    @stack('scripts')
</body>
</html>