@extends('layouts.app')

@section('title', 'Roles')

@section('content')
    @include('components.spinners.page-loader')
    @include('components.nav.navbar')
    @include('components.nav.sidebar')

    <section class="content">
        <header class="content__title">
            <h1>Roles</h1>
            <small>Welcome to the unique Material Design admin web app experience!</small>

            <div class="actions">
                <a href="" class="actions__item fas fa-chart-line"></a>
                <a href="" class="actions__item fas fa-check-double"></a>

                <div class="dropdown actions__item">
                    <i data-toggle="dropdown" class="fas fa-ellipsis-v"></i>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="" class="dropdown-item">Refresh</a>
                        <a href="" class="dropdown-item">Manage Widgets</a>
                        <a href="" class="dropdown-item">Settings</a>
                    </div>
                </div>
            </div>
        </header>

        @include('components.nav.footer')
    </section>
@endsection
