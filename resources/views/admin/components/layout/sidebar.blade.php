<nav class="sidebar-nav">
    <div class="sidebar-header">
        <button class="nav-toggler nav-toggler-md sidebar-toggler" data-target="#nav-toggleable-md" data-toggle="collapse" type="button"><span class="sr-only">Toggle nav</span></button>
        <a class="sidebar-brand img-responsive" href="{{ route('dashboard') }}">
            <i class="fas fa-bolt fa-fw sidebar-brand-icon"></i>
        </a>
    </div>
    <div class="collapse nav-toggleable-md" id="nav-toggleable-md">
        <form class="sidebar-form">
            <input class="form-control form" placeholder="Search..." type="text">
            <button class="btn-link" type="submit">
                <i class="fas fa-search fa-fw"></i>
            </button>
        </form>
        <ul class="nav nav-pills nav-stacked flex-column">
            <li class="nav-header">Account</li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('settings') ? 'active' : '' }}" href="{{ route('settings') }}">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('security') ? 'active' : '' }}" href="{{ route('security') }}">Security</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();" aria-label="Logout">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </li>

            @role('Super Admin')
            <li class="nav-header">Resources</li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('users*') ? 'active' : '' }}" href="{{ route('users') }}">Users</a>
            </li>
            @endrole
        </ul>
        <hr class="visible-xs mt-3">
    </div>
</nav>