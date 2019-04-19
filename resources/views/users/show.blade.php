@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    @include('components.spinners.page-loader')
    @include('components.nav.navbar')
    @include('components.nav.sidebar')

    <section class="content">
        <div class="content__inner content__inner--sm">
            <header class="content__title">
                <h1>{{ $user->fullName }}</h1>
                <small>Joined in {{ $user->created_at->format('F Y') }}</small>

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

            <div class="card profile">
                <div class="profile__img">
                    <img
                        @isset($user->profile_image)
                            src="{{ $user->profile_image }}"
                        @else
                            src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim($user->email))), '?s=500') }}"
                        @endisset
                        alt="{{ $user->name }}">
                </div>

                <div class="profile__info">
                    @isset($user->bio)
                        <p>{{ $user->bio }}</p>
                    @endisset

                    <ul class="icon-list">
                        @isset($user->phoneNumber)
                            <li>
                                <i class="fas fa-phone"></i> <a href="tel:{{ $user->phoneNumber->phone_number }}">{{ \App\Helpers\Data\PhoneNumber::prettyFormatPhoneNumber($user->phoneNumber->phone_number) }}</a>
                            </li>
                        @endisset

                        <li><i class="fas fa-envelope"></i> <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></li>

                        @isset($user->address)
                            <li><i class="fas fa-map-pin"></i>{{ $user->fullAddress }}</li>
                        @endisset
                    </ul>
                </div>
            </div>

            <div class="toolbar">
                <nav class="toolbar__nav">
                    <a class="active" href="profile-about.html">About</a>
                    <a href="profile-photos.html">Photos</a>
                    <a href="profile-contacts.html">Contacts</a>
                </nav>

                <div class="actions">
                    <i class="actions__item zmdi zmdi-search" data-ma-action="toolbar-search-open"></i>
                </div>

                <div class="toolbar__search">
                    <input type="text" placeholder="Search...">

                    <i class="toolbar__search__close zmdi zmdi-long-arrow-left"
                       data-ma-action="toolbar-search-close"></i>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    @isset($user->bio)
                        <h4 class="card-body__title mb-4">Bio</h4>
                        <p>{{ $user->bio }}</p>
                        <br>
                    @endisset

                    <h4 class="card-body__title mb-4">Social Links</h4>

                    <ul class="icon-list">
                        @isset($user->social['twitter'])
                            <li><i class="fab fa-twitter"></i>
                                <a href="{{ sprintf('%s%s', 'https://twitter.com/@', $user->social['twitter']) }}" target="_blank">{{ sprintf('%s%s', '@', $user->social['twitter']) }}</a>
                            </li>
                        @endisset

                        @isset($user->social['facebook'])
                            <li><i class="fab fa-facebook-f"></i>
                                <a href="{{ sprintf('%s%s', 'https://facebook.com/', $user->social['facebook']) }}" target="_blank">{{ $user->social['facebook'] }}</a>
                            </li>
                        @endisset

                        @isset($user->social['instagram'])
                            <li><i class="fab fa-instagram"></i>
                                <a href="{{ sprintf('%s%s', 'https://instagram.com/', $user->social['instagram']) }}" target="_blank">{{ $user->social['instagram'] }}</a>
                            </li>
                        @endisset

                        @isset($user->social['youtube'])
                            <li><i class="fab fa-youtube"></i>
                                <a href="{{ sprintf('%s%s', 'https://youtube.com/', $user->social['youtube']) }}" target="_blank">{{ $user->social['youtube'] }}</a>
                            </li>
                        @endisset
                    </ul>
                </div>
            </div>
        </div>

        @include('components.nav.footer')
    </section>
@endsection
