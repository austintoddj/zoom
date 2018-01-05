<?php

Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController')->name('dashboard');
    Route::redirect('/settings', '/settings/profile')->name('settings');

    Route::prefix('settings')->group(function () {
        Route::get('/profile', 'ProfileController@index')->name('profile');
        Route::post('/profile', 'ProfileController@update');
        Route::get('/security', 'SecurityController')->name('security');
        Route::get('/status', 'StatusController')->name('status');
    });
});
