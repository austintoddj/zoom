@extends('layouts.admin')

@section('title', 'Profile')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Profile</div>

                    <div class="card-body">
                        @include('admin.components.notifications.success')
                        @include('admin.components.forms.profile')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection