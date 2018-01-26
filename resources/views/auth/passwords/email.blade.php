@extends('layouts.admin')

@section('title', 'Forgot Password')

@section('content')
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reset Password</div>
                <div class="card-body">
                    @include('auth.components.notifications.success')
                    @include('auth.forms.email')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
