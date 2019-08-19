<?php

Route::namespace('Gostavocms\LaravelSpaAuth\Http\Controllers')
    ->group(function () {
        Route::post(config('gostavocms-spa-auth.login.uri'), 'LoginController@login');
        Route::post(config('gostavocms-spa-auth.logout.uri'), 'LoginController@logout');
        Route::post(config('gostavocms-spa-auth.register.uri'), 'RegisterController@register');

        if (config('app.env') == 'testing') {
            Route::resource('gostavocms-spa-auth-test', 'TestController');
        }
    });
