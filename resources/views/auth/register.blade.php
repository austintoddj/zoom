@extends('auth.layout')

@section('title', 'Register')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        @include('auth.components.forms.register')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
