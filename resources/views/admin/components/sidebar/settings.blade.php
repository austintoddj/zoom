<h6 class="text-muted text-uppercase">Settings</h6>
<div class="list-group">
    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action {{ Route::is('profile') ? 'active' : '' }}">
        <i class="icon-sm {{ Route::is('profile') ? 'fill-primary' : 'fill-muted' }}">@icon('user-solid-circle')</i> Profile
    </a>
    <a href="{{ route('status') }}" class="list-group-item list-group-item-action {{ Route::is('status') ? 'active' : '' }}">
        <i class="icon-sm {{ Route::is('status') ? 'fill-primary' : 'fill-muted' }}">@icon('station')</i> Status
    </a>
    <a href="{{ route('security') }}" class="list-group-item list-group-item-action {{ Route::is('security') ? 'active' : '' }}">
        <i class="icon-sm {{ Route::is('security') ? 'fill-primary' : 'fill-muted' }}">@icon('lock-closed')</i> Security
    </a>
</div>