<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @if (config('auth.registration'))
                        <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ gravatar(Auth::user()->email) }}"
                                 alt="{{ Auth::user()->name }} Profile Image"
                                 width="20"
                                 class="rounded">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <h6 class="dropdown-header">Signed in as <strong>{{ Auth::user()->name }}</strong></h6>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('dashboard') }}" class="dropdown-item {{ Route::is('dashboard') ? 'text-primary' : '' }}"
                               aria-label="Dashboard">Dashboard</a>
                            <a href="{{ route('profile') }}" class="dropdown-item {{ Route::is('profile') ? 'text-primary' : '' }}" aria-label="Profile">Your Profile</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                               aria-label="Log Out">Log Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>