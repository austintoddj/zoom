<div class="border-bottom">
    <div class="container d-flex justify-content-center px-0">
        <div class="col-md-10 px-0">
            <nav class="navbar navbar-light justify-content-between flex-nowrap flex-row py-1">
                <!-- Left Side Of Navbar -->
                <a class="navbar-brand logo mr-4 font-weight-bold py-0"
                   href="{{ route('dashboard') }}">
                    <i class="fas fa-bolt"></i>
                </a>

                <ul class="navbar-nav mr-auto flex-row float-right">
                    <li class="text-muted font-weight-bold">
                        @if(session('notify'))
                            <span class="text-success">{{ session('notify') }}</span>
                        @endif
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                @auth()
                    @yield('actions')

                    <div class="dropdown">
                        <a href="#" id="navbarDropdown" class="nav-link px-0 text-secondary" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=200') }}"
                                 class="rounded-circle my-0"
                                 style="width: 31px"
                                 alt="{{ auth()->user()->name }}"
                            >
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>

                            <div class="dropdown-divider"></div>
                            <h6 class="dropdown-header">Resources</h6>
                            <a class="dropdown-item" href="#">Users</a>
                            <a class="dropdown-item" href="#">Roles</a>

                            <div class="dropdown-divider"></div>
                            <h6 class="dropdown-header">Tools</h6>
                            <a class="dropdown-item" href="#">Backups</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Account Settings</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Sign out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endauth
            </nav>
        </div>
    </div>
</div>
