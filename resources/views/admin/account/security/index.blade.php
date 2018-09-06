@extends('admin.layout')

@section('title', sprintf('%s - %s', config('app.name', 'Laravel'), 'Security'))

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Account</h6>
            <h2 class="dashhead-title">Security</h2>
        </div>
    </div>
    <hr class="mt-3">

    <div class="row text-left m-t-md">
        <div class="col-lg-12">
            @include('admin.components.tables.account.security.index')
        </div>
    </div>
@endsection