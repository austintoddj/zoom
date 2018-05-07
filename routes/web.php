<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth Routes...
App\Helpers\Routes\Parser::parseRouteFiles(__DIR__.'/auth/');

// Frontend Routes...
App\Helpers\Routes\Parser::parseRouteFiles(__DIR__.'/frontend/');

// Backend Routes...
App\Helpers\Routes\Parser::parseRouteFiles(__DIR__.'/backend/');
