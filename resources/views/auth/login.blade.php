@extends('layouts.admin')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    @include('auth.forms.login')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
