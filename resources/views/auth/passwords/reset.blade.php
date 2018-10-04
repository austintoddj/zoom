@extends('auth.layout')

@section('title', 'Reset Password')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm px-3 py-3">
                    <div class="card-body">
                        <h4 class="mt-4 text-center">{{ __('Reset Password') }}</h4>
                        <hr class="w-25 mb-5">

                        @include('auth.components.forms.reset')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
