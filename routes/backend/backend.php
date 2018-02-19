<?php

Route::group(['namespace' => 'Backend', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController')->name('dashboard');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile', 'ProfileController@update');
});
