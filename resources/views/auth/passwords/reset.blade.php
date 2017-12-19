@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
    <div class="card">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
            <div class="col-lg-10 offset-lg-1">
                @include('auth.forms.reset')
            </div>
        </div>

        @if(env('SOCIALITE'))
            <div class="text-center mt-3">
                @include('auth.components.socialite.links')
            </div>
    @endif
@endsection