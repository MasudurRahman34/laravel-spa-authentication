<?php

Route::namespace('Gostavocms\LaravelSpaAuth\Http\Controllers')
    ->group(function () {
        Route::post(config('routes.login'), 'LoginController@login');
        Route::resource('test', 'TestController');
    });
