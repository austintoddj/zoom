<?php

Route::group(['namespace' => 'Backend', 'middleware' => 'auth'], function () {
    Route::get('dashboard', 'DashboardController')->name('dashboard');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'ProfileController@index')->name('profile');
        Route::post('/', 'ProfileController@update')->name('profile.update');
    });
});
