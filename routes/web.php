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
            'index'   => 'user.index',
            'create'  => 'user.create',
            'store'   => 'user.index',
            'show'    => 'user.show',
            'edit'    => 'user.edit',
            'update'  => 'user.update',
            'destroy' => 'user.destroy',
        ]);

        // Role routes...
        Route::resource('roles', 'RoleController')->names([
            'index'   => 'role.index',
            'create'  => 'role.create',
            'store'   => 'role.index',
            'show'    => 'role.show',
            'edit'    => 'role.edit',
            'update'  => 'role.update',
            'destroy' => 'role.destroy',
        ]);

        // Permission routes...
        Route::resource('permissions', 'PermissionController')->names([
            'index'   => 'permission.index',
            'create'  => 'permission.create',
            'store'   => 'permission.index',
            'show'    => 'permission.show',
            'edit'    => 'permission.edit',
            'update'  => 'permission.update',
            'destroy' => 'permission.destroy',
        ]);
    });

    // Tool routes...
    Route::prefix('tools')->group(function () {
        // Backup routes...
        Route::resource('backups', 'BackupController', [
            'except' => ['create', 'edit', 'update', 'destroy'],
            'names'  => [
                'index'   => 'backup.index',
                'store'   => 'backup.store',
                'show'    => 'backup.show',
                'destroy' => 'backup.destroy',
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
