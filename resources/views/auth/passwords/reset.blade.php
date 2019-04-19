@extends('layouts.app')

@section('title', 'Reset password')

@section('content')
<div class="login__block active" id="l-register">
    <div class="login__block__header palette-Blue bg">
        <i class="fas fa-user-circle"></i>
        Reset your password
    </div>

    @include('auth.components.forms.reset')
</div>
@endsection
