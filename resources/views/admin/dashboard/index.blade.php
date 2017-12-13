@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
            <p class="text-muted small"><strong>Components</strong></p>
            <p>
                @if (config('auth.registration'))
                    <i class="icon-sm">@icon('checkmark-outline', 'fill-success')</i>
                @else
                    <i class="icon-sm">@icon('close-outline', 'fill-danger')</i>
                @endif
                Registration
            </p>

            <p>
                @if (config('mail.username'))
                    <i class="icon-sm">@icon('checkmark-outline', 'fill-success')</i>
                @else
                    <i class="icon-sm">@icon('close-outline', 'fill-danger')</i>
                @endif
                Email Configuration
            </p>

            <p>
                @if (env('GOOGLE_ANALYTICS'))
                    <i class="icon-sm">@icon('checkmark-outline', 'fill-success')</i>
                @else
                    <i class="icon-sm">@icon('close-outline', 'fill-danger')</i>
                @endif
                Google Analytics
            </p>
        </div>
    </div>
@endsection