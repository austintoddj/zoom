@extends('layouts.admin')

@section('title', 'Profile')

@section('content')
    <div class="col-lg-2 offset-lg-1">
        @include('admin.components.sidebar.settings')
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Profile</div>

            <div class="card-body">
                @include('admin.components.notifications.success')
                @include('admin.components.forms.profile')
            </div>
        </div>
    </div>
@endsection