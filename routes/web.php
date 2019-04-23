<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Dashboard routes...
    Route::get('dashboard', 'DashboardController')->name('dashboard');

    // Resource routes...
    Route::prefix('resources')->group(function () {
        // User routes...
        Route::resource('users', 'UserController')->names([
            'index'   => 'users.index',
            'create'  => 'users.create',
            'store'   => 'users.index',
            'show'    => 'users.show',
            'edit'    => 'users.edit',
            'update'  => 'users.update',
            'destroy' => 'users.destroy',
        ]);
    });

    // Tool routes...
    Route::prefix('tools')->group(function () {
        // Backup routes...
        Route::resource('backups', 'BackupController', [
            'except' => ['create', 'edit', 'update', 'destroy'],
            'names' => [
                'index'   => 'backups',
                'store'   => 'backups.store',
                'show'    => 'backups.show',
            ],
        ]);
    });

    // Settings routes...
    Route::prefix('settings')->group(function () {
        Route::get('', 'SettingsController@index')->name('settings.index');
        Route::post('', 'SettingsController@update')->name('settings.update');
    });

    // Media routes...
    Route::prefix('media')->group(function () {
        Route::post('upload', 'MediaController@store')->name('media.store');
    });
});
