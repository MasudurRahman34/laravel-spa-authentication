<?php

Route::namespace('Gostavocms\LaravelSpaAuth\Http\Controllers')
    ->group(function () {
        Route::post(config('gostavocms-spa-auth.routes.login'), 'LoginController@login');
        Route::post(config('gostavocms-spa-auth.routes.logout'), 'LoginController@logout');
        Route::resource('gostavocms-spa-auth-test', 'TestController');
    });
