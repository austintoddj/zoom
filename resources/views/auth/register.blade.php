@extends('layouts.admin')

@section('title', 'Register')

@section('content')
    <div class="card">
        <div class="card-header">Register</div>
        <div class="card-body">
            @include('auth.forms.register')
        </div>
    </div>

    @if(env('SOCIALITE'))
        <div class="text-center my-5">
            @include('auth.components.socialite.links')
        </div>
    @endif
@endsection