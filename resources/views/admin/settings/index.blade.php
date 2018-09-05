@extends('admin.layout')

@section('title', 'Settings')

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Account</h6>
            <h2 class="dashhead-title">Settings</h2>
        </div>
    </div>
    <hr class="mt-3">

    @include('admin.components.notifications.success')
    @include('admin.components.notifications.error')
    @include('admin.components.forms.settings.update')
@endsection