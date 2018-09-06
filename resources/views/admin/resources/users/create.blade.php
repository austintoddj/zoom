@extends('admin.layout')

@section('title', sprintf('%s - %s', config('app.name', 'Laravel'), 'Add User'))

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Resources</h6>
            <h2 class="dashhead-title">Add User</h2>
        </div>
    </div>
    <hr class="mt-3">

    <div class="col-lg-8">
        @include('admin.components.forms.resources.users.create')
    </div>
@endsection