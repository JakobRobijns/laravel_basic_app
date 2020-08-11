<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

/*  USER AUTHENTICATION */
Route::prefix('auth')
    ->namespace('API\V1\Auth')
    ->group(function () {
    Route::post('signup', 'RegisterController@signup');
    Route::post('signup/activate/{token}', 'RegisterController@activate');
    Route::post('login', 'LoginController@login');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'LoginController@logout');
        Route::get('user', 'UserController@user');
    });
});


