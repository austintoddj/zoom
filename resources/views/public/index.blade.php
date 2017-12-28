@extends('layouts.public')

@section('content')
    <div class="container pt-4">
        <nav class="navbar navbar-light navbar-expand-sm text-uppercase app-navbar mb-5">
            <a class="navbar-brand mr-auto" href="../">
                <span>Mochi</span>
            </a>
            <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarResponsive"
                    aria-controls="navbarResponsive"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                        @if (config('auth.registration'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </nav>
    </div>

    <div class="block app-block-intro">
        <div class="container text-xs-center">
            <h1 class="block-title mb-0 text-uppercase app-myphone-brand">Mochi</h1>
            <p class="lead mb-5 pb-5">Task management and a calendar for all</p>
            <img src="{{ asset('img/iphone-to-iphone-sized.jpg') }}">
        </div>
    </div>

    <div class="block block-bordered-lg">
        <div class="container text-center app-translate-15" data-transition="entrance">
            <blockquote class="pull-quote">
                <img class="rounded-circle" src="{{ asset('img/avatar-mdo.png') }}">
                <p>
                    “Task management. Calendars. Email. They all have one thing in common&hellip;literally no one enjoys
                    managing them. Thanks to years of research, we can now predict every single thing you'll ever have
                    to do
                    or go to. Yeah, we're that good.”
                </p>
                <cite>Mark Otto, Creator of Mochi</cite>
            </blockquote>
        </div>
    </div>

    <div class="block block-bordered-lg pb-0 app-block-stats">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <img
                            src="{{ asset('img/iphone-perspective-sized.jpg') }}"
                            class="app-translate-5"
                            data-transition="entrance">
                    <hr class="mt-0 mb-5 mx-auto d-md-none">
                </div>
                <div class="col-lg-5 col-md-6 text-center text-md-left pb-5">
                    <p class="lead">
                        We've been working for over 100 years to build the best possible app for all your needs. We're
                        glad
                        that others agree.
                    </p>
                    <div class="row my-4">
                        <div class="col-6 mb-3">
                            <div class="statcard">
                                <h1 class="statcard-number block-title">92m</h1>
                                <span class="statcard-desc">Downloads</span>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="statcard">
                                <h1 class="statcard-number block-title">8m</h1>
                                <span class="statcard-desc">Reviews</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 d-none d-lg-flex">
                        <div class="col-6 mb-3">
                            <div class="statcard">
                                <h1 class="statcard-number block-title">78k</h1>
                                <span class="statcard-desc">Developers</span>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="statcard">
                                <h1 class="statcard-number block-title">97%</h1>
                                <span class="statcard-desc">Happiness</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="block block-bordered-lg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8 text-center mb-5">
                    <p class="lead mx-auto">With over <strong>20 years of collective experience</strong>, we take the
                        unthinkable and make it just a couple quick taps away.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <ul class="featured-list">
                        <li class="mb-5">
                            <div class="featured-list-icon text-primary">
                                <span class="icon icon-image"></span>
                            </div>
                            <p class="featured-list-icon-text mb-0"><strong>Upload unlimited images</strong></p>
                            <p class="featured-list-icon-text">
                                We process all the images you upload and take full advantage of modern cloud based
                                storage
                                to host them at blazing fast speeds.
                            </p>
                        </li>

                        <li class="mb-5">
                            <div class="featured-list-icon text-primary">
                                <span class="icon icon-hour-glass"></span>
                            </div>
                            <p class="featured-list-icon-text mb-0"><strong>Tracked time savings</strong></p>
                            <p class="featured-list-icon-text">
                                This means you save tons of time by using our world class task manager and calendar and
                                constantly reminds you how great it is.
                            </p>
                        </li>

                    </ul>
                </div>
                <div class="col-sm-6">
                    <ul class="featured-list">

                        <li class="mb-5">
                            <div class="featured-list-icon text-primary">
                                <span class="icon icon-cloud"></span>
                            </div>
                            <p class="featured-list-icon-text mb-0"><strong>Share from anywhere</strong></p>
                            <p class="featured-list-icon-text">
                                Do it over the cloud, from anywhere, on any device. Mochi is super fast and always
                                available, to not only you, but all your friends
                            </p>
                        </li>

                        <li class="mb-5">
                            <div class="featured-list-icon text-primary">
                                <span class="icon icon-emoji-neutral"></span>
                            </div>
                            <p class="featured-list-icon-text mb-0"><strong>Use stickers and express yourself</strong>
                            </p>
                            <p class="featured-list-icon-text">
                                Share with emoji anyone in the world. We've baked them directly into Mochi. These
                                probably
                                won't help with productivity though.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="block block-bordered-lg pl-0 pt-0 pr-0">
        <div id="carousel-example-generic" class="carousel carousel-light slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="block">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-sm-8">
                                    <p class="lead mx-auto text-center">
                                        Instead of guessing how much time you spend on each of your tasks, why not have
                                        automagically record everything and have easy reporting without lifting a
                                        finger?
                                        <span class="hidden-xs">Well now you can with ease.</span>
                                    </p>
                                </div>
                            </div>
                            <img class="img-fluid mt-5 app-block-game-img d-block img-fluid"
                                 src="{{ asset('img/iphone-flat-sized.jpg') }}">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="block">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-sm-8">
                                    <p class="lead mx-auto text-center">
                                        Instead of guessing how much time you spend on each of your tasks, why not have
                                        automagically record everything and have easy reporting without lifting a
                                        finger?
                                        <span class="hidden-xs">Well now you can with ease.</span>
                                    </p>
                                </div>
                            </div>
                            <img class="img-fluid mt-5 app-block-game-img d-block img-fluid"
                                 src="{{ asset('img/iphone-flat-sized.jpg') }}">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="block">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-sm-8">
                                    <p class="lead mx-auto text-center">
                                        Instead of guessing how much time you spend on each of your tasks, why not have
                                        automagically record everything and have easy reporting without lifting a
                                        finger?
                                        <span class="hidden-xs">Well now you can with ease.</span>
                                    </p>
                                </div>
                            </div>
                            <img class="img-fluid mt-5 app-block-game-img d-block img-fluid"
                                 src="{{ asset('img/iphone-flat-sized.jpg') }}">
                        </div>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="icon icon-chevron-thin-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="icon icon-chevron-thin-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="block block-bordered-lg block-overflow-hidden pb-0 app-block-design">
        <div class="container">
            <div class="row app-pos-r">
                <div class="col-sm-7 text-center text-sm-left">
                    <p class="lead">
                        We focused on design relentlessly. We loved it so much, we spent just as much time taking these
                        crazy high resolution photos. Here are some more stats on that.
                    </p>
                    <div class="row">
                        <div class="col-4">
                            <div class="statcard">
                                <h1 class="statcard-number block-title">1m</h1>
                                <span class="statcard-desc">Photos</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="statcard">
                                <h1 class="statcard-number block-title">2k</h1>
                                <span class="statcard-desc">gigs</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="statcard">
                                <h1 class="statcard-number block-title">7</h1>
                                <span class="statcard-desc">Friends</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right app-block-design-img">
            <img src="{{ asset('img/iphone-reverse-perspective-sized.jpg') }}" class="app-translate-50"
                 data-transition="entrance">
        </div>
    </div>

    <div class="block block-bordered-lg text-center">
        <div class="container-fluid">
            <p class="lead mb-4">
                Join over 900,000 nerds already using Mochi. Get the Mochi App <strong>free</strong> forever!
            </p>
            <form class="form-inline d-flex justify-content-center">
                <input class="form-control mb-3" placeholder="Email Address">
                <input class="form-control mb-3 ml-sm-1" type="password" placeholder="Create a Password">
                <button class="btn btn-primary mb-3 ml-sm-1">Get started</button>
            </form>
            <small class="text-muted">
                By clicking "Get started" I agree to Mochi's
                <a href="#">Terms of service</a>
            </small>
        </div>
    </div>

    <div class="block app-block-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 mb-4">
                    <ul class="list-unstyled list-spaced">
                        <li><h6 class="text-uppercase">Products</h6></li>
                        <li>Todo</li>
                        <li>Calendario</li>
                        <li>Email Town</li>
                        <li>Pomodorotary</li>
                        <li>ChillTower</li>
                    </ul>
                </div>
                <div class="col-sm-2 mb-4">
                    <ul class="list-unstyled list-spaced">
                        <li><h6 class="text-uppercase">Extras</h6></li>
                        <li>AutotuneU</li>
                        <li>Freestyler</li>
                        <li>Chillaxation</li>
                    </ul>
                </div>
                <div class="col-sm-2 mb-4">
                    <ul class="list-unstyled list-spaced">
                        <li><h6 class="text-uppercase">Support</h6></li>
                        <li>Online Support</li>
                        <li>Telephone Sales</li>
                        <li>Help Desk</li>
                        <li>Workshops</li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <h6 class="text-uppercase">About</h6>
                    <p>Shoutout to Invision team for creating the <a href="http://www.invisionapp.com/do">Do UI kit</a>
                        that
                        we used to fake our app screenshots. Also to the Dribbble community for providing phone mockups
                        that
                        look amazing.</p>
                </div>
            </div>
        </div>
    </div>
@endsection