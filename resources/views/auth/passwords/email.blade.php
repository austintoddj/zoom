@extends('layouts.admin')

@section('title', 'Forgot Password')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header">Forgot Password</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @include('auth.components.forms.email')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
