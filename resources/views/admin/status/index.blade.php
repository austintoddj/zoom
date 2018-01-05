@extends('layouts.admin')

@section('title', 'Status')

@section('content')
    <div class="col-lg-2 offset-lg-1">
        @include('admin.components.sidebar.settings')
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Status</div>

            <div class="card-body">
                <div class="container mb-4">
                    <p class="text-muted small"><strong>Authentication</strong></p>
                    <p class="ml-3">
                        @if (config('auth.registration'))
                            <i class="icon-sm">@icon('checkmark-outline', 'fill-success')</i>
                        @else
                            <i class="icon-sm">@icon('close-outline', 'fill-danger')</i>
                        @endif
                        Registration
                    </p>
                    <p class="ml-3">
                        @if (env('SOCIALITE'))
                            <i class="icon-sm">@icon('checkmark-outline', 'fill-success')</i>
                        @else
                            <i class="icon-sm">@icon('close-outline', 'fill-danger')</i>
                        @endif
                        Laravel Socialite
                    </p>
                </div>
                <div class="container">
                    <p class="text-muted small"><strong>Components</strong></p>
                    <p class="ml-3">
                        @if (config('mail.username'))
                            <i class="icon-sm">@icon('checkmark-outline', 'fill-success')</i>
                        @else
                            <i class="icon-sm">@icon('close-outline', 'fill-danger')</i>
                        @endif
                        E-Mail
                    </p>
                    <p class="ml-3">
                        @if (env('GOOGLE_ANALYTICS'))
                            <i class="icon-sm">@icon('checkmark-outline', 'fill-success')</i>
                        @else
                            <i class="icon-sm">@icon('close-outline', 'fill-danger')</i>
                        @endif
                        Google Analytics
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection