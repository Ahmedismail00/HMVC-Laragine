<?php

use Illuminate\Support\Facades\Route;

    # V1
    Route::namespace('Core\Admin\Controllers\API\V1')->prefix('v1')->name('api.v1.')->group(function () {

        Route::group(['prefix' => 'auth'], function () {
            Route::post('login', 'Auth\AuthController@login')->name('login');
            Route::post('register', 'Auth\AuthController@register');
            Route::group(['middleware' => 'auth:admin-api'], function () {
                Route::post('logout', 'Auth\AuthController@logout');
                Route::get('user', 'Auth\AuthController@user');
            });
        });

        #*** Ex: START: Admin ***#
        // Route::apiResource('admins', 'AdminController');
        #*** END: Admin ***#
    });
