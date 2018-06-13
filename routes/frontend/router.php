<?php

Route::group(['namespace' => 'Frontend', 'middleware' => 'web'], function () {
    Route::view('/', 'frontend.home.index')->name('home');
});
