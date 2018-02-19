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
Helper::includeRouteFiles(__DIR__.'/auth/');

// Frontend Routes...
Helper::includeRouteFiles(__DIR__ . '/frontend/');

// Backend Routes...
Helper::includeRouteFiles(__DIR__ . '/backend/');
