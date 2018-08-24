<nav class="navbar navbar-expand-lg navbar-light navbar-laravel mb-4">
    <div class="container">
        <a class="navbar-brand" href="@guest {{ url('/') }} @else {{ route('dashboard') }} @endguest">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @if (config('auth.registration'))
                        <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="resourceDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Resources
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="resourceDropdown">
                            <a class="dropdown-item" href="{{ route('users') }}">Users</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ \App\Helpers\Images\Avatar::generateGravatarUrl(Auth::user()->email) }}" class="rounded-circle" width="20">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ route('settings') }}" class="dropdown-item {{ Route::is('settings*') ? 'bg-light' : '' }}" aria-label="Settings">Settings</a>
                            <a href="{{ route('logout') }}" class="dropdown-item"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                               aria-label="Logout">Logout</a>
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