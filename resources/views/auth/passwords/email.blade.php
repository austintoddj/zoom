@extends('layouts.admin')

@section('title', 'Forgot Password')

@section('content')
    <div class="card">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
            @include('auth.components.notifications.success')
            @include('auth.forms.email')
        </div>
    </div>
@endsection