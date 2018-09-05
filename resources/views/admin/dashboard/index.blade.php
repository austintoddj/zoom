@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Dashboard</h6>
            <h2 class="dashhead-title">Overview</h2>
        </div>
    </div>
    <hr class="mt-3">

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <p>Welcome to Zoom! Get familiar with Zoom and explore it's features in the documentation:</p>
@endsection
