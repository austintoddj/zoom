@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (config('auth.registration'))
                            <i class="icon-sm icon-enabled">@icon('checkmark-outline')</i> Registration Enabled
                        @else
                            <i class="icon-sm icon-disabled">@icon('close-outline')</i> Registration Disabled
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection