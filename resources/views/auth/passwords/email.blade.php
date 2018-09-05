@extends('auth.layout')

@section('title', 'Forgot Password')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('auth.components.forms.email')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
