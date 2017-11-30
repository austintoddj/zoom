<?php

Route::group(['namespace' => 'Admin'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile', 'ProfileController@update');
    Route::get('/activity', 'ActivityController@index')->name('activity');
});
