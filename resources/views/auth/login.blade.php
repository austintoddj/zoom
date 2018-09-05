@extends('auth.layout')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        @include('auth.components.forms.login')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
