@extends('layouts.admin')

@section('title', 'Profile')

@section('content')
    @include('admin.components.notifications.success')
    @include('admin.forms.profile')
@endsection