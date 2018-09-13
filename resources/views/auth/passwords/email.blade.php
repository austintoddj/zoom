@extends('auth.layout')

@section('title', 'Forgot Password')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="mt-4 text-center">{{ __('Forgot Password') }}</h4>
                        <hr class="w-25 mb-5">

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
