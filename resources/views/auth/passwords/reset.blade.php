@extends('layouts.admin')

@section('title', 'Reset Password')

@section('content')
    <div class="card">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
            @include('auth.forms.reset')
        </div>

        @if(env('SOCIALITE'))
            <div class="text-center my-5">
                @include('auth.components.socialite.links')
            </div>
    @endif
@endsection