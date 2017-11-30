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

                        <p>
                            @if (config('auth.registration'))
                                <i class="icon-sm">@icon('checkmark-outline', 'fill-success')</i>
                            @else
                                <i class="icon-sm">@icon('close-outline', 'fill-danger')</i>
                            @endif
                            Registration
                        </p>

                        <p>
                            @if (config('mail.username'))
                                <i class="icon-sm">@icon('checkmark-outline', 'fill-success')</i>
                            @else
                                <i class="icon-sm">@icon('close-outline', 'fill-danger')</i>
                            @endif
                            Email Configuration
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection