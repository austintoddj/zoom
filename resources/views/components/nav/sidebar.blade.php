<aside class="sidebar">
    <div class="scrollbar-inner">
        <div class="user">
            <div class="user__info" data-toggle="dropdown">
                <img
                    @isset(auth()->user()->profile_image)
                        src="{{ auth()->user()->profile_image }}"
                    @else
                        src="{{ sprintf('https://secure.gravatar.com/avatar/%s?s=500', md5(strtolower(trim(auth()->user()->email)))) }}"
                    @endisset
                     class="user__img"
                     alt="{{ auth()->user()->fullName }}">
                <div>
                    <div class="user__name">{{ auth()->user()->fullName }}</div>
                    <div class="user__email">{{ auth()->user()->email }}</div>
                </div>
            </div>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('users.show', auth()->user()->id) }}">View profile</a>
                <a class="dropdown-item" href="{{ route('settings.index') }}">Settings</a>
                <a class="dropdown-item" href="#">Privacy and security</a>
            </div>
        </div>

        <ul class="navigation">
            <li class="{{ app('router')->is('dashboard') ? 'navigation__active' : '' }}"><a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="navigation__sub {{ app('router')->is('resources*') ? 'navigation__sub--active navigation__sub--toggled' : '' }}">
                <a href=""><i class="fas fa-th-large"></i> Resources</a>
                <ul>
                    <li class="{{ app('router')->is('users.index') ? 'navigation__active' : '' }}"><a href="{{ route('users.index') }}">Users</a></li>
                    <li class="{{ app('router')->is('roles.index') ? 'navigation__active' : '' }}"><a href="{{ route('roles.index') }}">Roles</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Log out') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>
