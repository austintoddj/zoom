@extends('auth.layout')

@section('title', 'Login')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="mt-4 text-center">Welcome Back!</h4>
                        <hr class="w-25 mb-5">

                        @include('auth.components.forms.login')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
