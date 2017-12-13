@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="card">
        <div class="card-header">Dashboard</div>

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
                <p class="ml-5">
                    @if (env('FACEBOOK_CLIENT_ID') && env('FACEBOOK_CLIENT_SECRET') && env('FACEBOOK_REDIRECT'))
                        <i class="icon-sm">@icon('checkmark-outline', 'fill-success')</i>
                    @else
                        <i class="icon-sm">@icon('close-outline', 'fill-danger')</i>
                    @endif
                    Facebook
                </p>
                <p class="ml-5">
                    @if (env('TWITTER_CLIENT_ID') && env('TWITTER_CLIENT_SECRET') && env('TWITTER_REDIRECT'))
                        <i class="icon-sm">@icon('checkmark-outline', 'fill-success')</i>
                    @else
                        <i class="icon-sm">@icon('close-outline', 'fill-danger')</i>
                    @endif
                    Twitter
                </p>
                <p class="ml-5">
                    @if (env('GOOGLE_CLIENT_ID') && env('GOOGLE_CLIENT_SECRET') && env('GITHUB_REDIRECT'))
                        <i class="icon-sm">@icon('checkmark-outline', 'fill-success')</i>
                    @else
                        <i class="icon-sm">@icon('close-outline', 'fill-danger')</i>
                    @endif
                    Google
                </p>
                <p class="ml-5">
                    @if (env('GITHUB_CLIENT_ID') && env('GITHUB_CLIENT_SECRET') && env('GITHUB_REDIRECT'))
                        <i class="icon-sm">@icon('checkmark-outline', 'fill-success')</i>
                    @else
                        <i class="icon-sm">@icon('close-outline', 'fill-danger')</i>
                    @endif
                    Github
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
@endsection