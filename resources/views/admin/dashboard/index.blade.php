@extends('layouts.admin')

@section('content')
    <main class="mt-4 mb-4">
        <div class="row">
            <div class="col-md-2">
                <aside id="mainSidebar">
                    <ul class="nav flex-column">
                        <li class="nav-item active">
                            <a href="{{ url('/home') }}" class="nav-link">
                                <i>@icon('dashboard')</i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i>@icon('user-solid-circle')</i>Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i>@icon('stand-by')</i>Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </aside>
            </div>
            <div class="col-md-10">
                <section class="mainContent">
                    <div class="card">
                        <div class="card-header">Overview</div>
                        <div class="card-body p-0">
                            <div class="container-fluid">
                                <div class="stats row">
                                    <div class="stat col-3 p-4">
                                        <h2 class="stat-title">Block 1</h2>
                                        <h3 class="stat-meta">&nbsp;</h3> <span class="stat-value">
                                {{ rand(10,100) }}
                            </span>
                                    </div>
                                    <div class="stat col-3 p-4"><h2 class="stat-title">Block 2</h2>
                                        <h3 class="stat-meta">&nbsp;</h3> <span class="stat-value">
                                {{ rand(10,100) }}
                            </span></div>
                                    <div class="stat col-3 p-4"><h2 class="stat-title">Block 3</h2>
                                        <h3 class="stat-meta">&nbsp;</h3> <span class="stat-value">
                                {{ rand(10,100) }}
                            </span></div>
                                    <div class="stat col-3 p-4 border-right-0"><h2 class="stat-title">Block 4</h2>
                                        <h3 class="stat-meta">&nbsp;</h3>
                                        <div class="d-flex align-items-center">
                                            <div class="statusIcon mr-2">
                                                <svg class="fill-danger">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                         xlink:href="#zondicon-close-outline"></use>
                                                </svg></div>
                                            <span class="stat-value">
                                  {{ rand(10,100) }}
                                </span></div>
                                    </div>
                                    <div class="stat col-3 p-4 border-bottom-0"><h2 class="stat-title">Block 5</h2>
                                        <h3 class="state-meta">&nbsp;</h3> <span class="stat-value">
                                {{ rand(10,100) }}
                            </span></div>
                                    <div class="stat col-3 p-4 border-bottom-0"><h2 class="stat-title">Block 6</h2>
                                        <h3 class="stat-meta">
                                            &nbsp;
                                        </h3> <span class="stat-value">
                                {{ rand(10,100) }}
                            </span></div>
                                    <div class="stat col-3 p-4 border-bottom-0"><h2 class="stat-title">Block 7</h2>
                                        <h3 class="state-meta">&nbsp;</h3> <span class="stat-value">
                                {{ rand(10,100) }}
                            </span></div>
                                    <div class="stat col-3 p-4 border-0"><h2 class="stat-title">Block 8</h2>
                                        <h3 class="state-meta">&nbsp;</h3> <span class="stat-value">
                                {{ rand(10,100) }}
                            </span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <footer id="mainFooter" class="pt-4 pb-4 text-center">
        Laravel Zoom is open-sourced software licensed under the <a href="http://opensource.org/licenses/MIT">MIT License</a>.
    </footer>
@endsection