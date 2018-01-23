@extends('layouts.admin')

@section('title', 'Login')

@section('content')
    <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
            @include('auth.forms.login')
        </div>
    </div>
    @if(env('SOCIALITE'))
        <div class="text-center my-5">
            @include('auth.components.socialite.links')
        </div>
    @endif
@endsection