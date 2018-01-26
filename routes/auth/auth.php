<?php

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login/{social}', 'LoginController@socialLogin')->where('social', 'twitter|facebook|google|github');
    Route::get('/login/{social}/callback', 'LoginController@handleProviderCallback')->where('social', 'twitter|facebook|google|github');
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    if (config('auth.registration')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');
});