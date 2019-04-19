<aside class="sidebar">
    <div class="scrollbar-inner">
        <div class="user">
            <div class="user__info" data-toggle="dropdown">
                <img
                    @isset(auth()->user()->profile_image)
                        src="{{ auth()->user()->profile_image }}"
                    @else
                        src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=500') }}"
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

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Sign out') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>

        <ul class="navigation">
            <li class="{{ app('router')->is('dashboard') ? 'navigation__active' : '' }}"><a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="navigation__sub {{ app('router')->is('client*') ? 'navigation__sub--active navigation__sub--toggled' : '' }}">
                <a href=""><i class="fas fa-users"></i> Users</a>
                <ul>
                    <li class="{{ app('router')->is('users.index') ? 'navigation__active' : '' }}"><a href="{{ route('users.index') }}">All Users</a></li>
                    <li class="{{ app('router')->is('users.create') ? 'navigation__active' : '' }}"><a href="{{ route('users.create') }}">Add New</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
