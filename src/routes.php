<?php

Route::namespace('Gostavocms\LaravelSpaAuth\Http\Controllers')
    ->group(function () {
        Route::post(config('gostavocms-spa-auth.login.path'), 'LoginController@login');
        Route::post(config('gostavocms-spa-auth.logout.path'), 'LoginController@logout');
        Route::post(config('gostavocms-spa-auth.register.path'), 'RegisterController@register');
        Route::post(config('gostavocms-spa-auth.forgot_password.path'), 'ForgotPasswordController@sendResetLinkEmail');
        Route::post(config('gostavocms-spa-auth.reset_password.path'), 'ResetPasswordController@reset');

        if (config('app.env') == 'testing') {
            Route::resource('gostavocms-spa-auth-test', 'TestController');
        }
    });
