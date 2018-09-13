@extends('auth.layout')

@section('title', 'Verify Email')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="mt-4 text-center">{{ __('Email Verification') }}</h4>
                        <hr class="w-25 mb-5">

                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                A fresh verification link has been sent to your email address.
                            </div>
                        @endif

                        Before proceeding, please check your email for a verification link.
                        If you did not receive the email, <a href="{{ route('verification.resend') }}">click here to request another</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
