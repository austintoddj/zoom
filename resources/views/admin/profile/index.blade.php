@extends('layouts.admin')

@section('title', 'Profile')

@section('content')
    <div class="card">
        <div class="card-header">Profile</div>

        <div class="card-body">
            @include('admin.components.notifications.success')
            @include('admin.forms.profile')
        </div>
    </div>
@endsection