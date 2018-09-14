@extends('auth.layout')

@section('title', 'Register')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card shadow-sm px-3 py-3">
                    <div class="card-body">
                        <h4 class="mt-4 text-center">Create Account</h4>
                        <hr class="w-25 mb-5">

                        @include('auth.components.forms.register')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
