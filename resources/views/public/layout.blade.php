@extends('layouts.app')

@push('scripts')
    @if(!empty(config('analytics.google.tracking')))
        @include('public.components.analytics.tracking')
    @endif
@endpush

@push('styles')
    <link href="{{ asset('css/public.css') }}" rel="stylesheet">
@endpush