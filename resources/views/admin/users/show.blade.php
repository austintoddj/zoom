@extends('layouts.admin')

@section('title', 'User Details')

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Resources</h6>
            <h2 class="dashhead-title">User Details</h2>
        </div>
    </div>
    <hr class="mt-3">

    @include('admin.components.notifications.success')
    @include('admin.components.notifications.error')
    @include('admin.components.forms.users.update')
    @include('admin.components.modals.users.delete')
@endsection