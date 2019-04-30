@extends('zoom::layouts.app')

@section('title', 'Zoom')

@push('meta')
    <!-- Icon -->
    <link rel="shortcut icon" href="{{ mix('favicon.ico', 'vendor/zoom') }}">
@endpush

@section('body')
    @include('zoom::components.nav.navbar')
    <main class="py-4">
        @yield('content')
    </main>
@endsection
