@extends('layouts.public')

@section('content')
    <div class="content">
        <img src="{{ asset('img/laravel-zoom.svg') }}">
        <h6 class="text-muted mt-2">v{{ \App\Meta\Constants::APP_VERSION }}</h6>
        <p>
            <a href="https://github.com/austintoddj/laravel-zoom/wiki" target="_blank">Documentation</a>
            <a href="https://github.com/austintoddj/laravel-zoom" target="_blank">GitHub</a>
            <a href="https://github.com/austintoddj/laravel-zoom/blob/master/license" target="_blank">License</a>
            <a href="https://github.com/austintoddj/laravel-zoom/releases" target="_blank">Releases</a>
        </p>
    </div>
@endsection