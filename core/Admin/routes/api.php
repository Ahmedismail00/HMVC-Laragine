<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api', 'middleware' => ['auth:passport']], function () {
    # V1
    Route::namespace('Core\Admin\Controllers\API\V1')->prefix('v1')->name('api.v1.')->group(function () {
        #*** Ex: START: Admin ***#
        Route::apiResource('admins', 'AdminController');
        #*** END: Admin ***#
    });
});
