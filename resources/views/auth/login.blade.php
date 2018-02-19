@extends('layouts.backend')

@section('title', 'Login')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header">Login</div>

                        <div class="card-body">
                            @include('auth.components.forms.login')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
