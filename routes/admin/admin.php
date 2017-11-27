<?php

Route::group(['namespace' => 'Admin'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
