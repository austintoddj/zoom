@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                <div class="container">
                    <p>Laravel Zoom is a boilerplate meant to standardize much of the setup that almost every web application needs. Reclaim your first few hours of development on every new project by allowing Laravel Zoom to give you a little speed boost.</p>
                    <hr>
                    <div class="pull-right">
                        <ul class="list-inline small">
                            <li class="list-inline-item">
                                <a href="https://github.com/austintoddj/laravel-zoom/wiki" target="_blank">Documentation</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://github.com/austintoddj/laravel-zoom" target="blank">
                                    Github
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://github.com/austintoddj/laravel-zoom/blob/master/license" target="blank">
                                    License
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://github.com/austintoddj/laravel-zoom/releases" target="blank">
                                    Releases
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="pull-left">
                        <p class="small">version: {{ Constants::APP_VERSION }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection