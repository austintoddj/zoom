<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('img/laravel-zoom.svg') }}" alt="Laravel Zoom Logo" height="21">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <img src="{{ Helper::gravatar(Auth::user()->email) }}"
                             alt="{{ Auth::user()->name }} Profile Image"
                             style="border-radius: 15%; width: 23px">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
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
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>