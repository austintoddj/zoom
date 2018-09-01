<?php

Route::middleware('auth')->group(function () {
    Route::get('user', 'UserController')->name('user');
});
