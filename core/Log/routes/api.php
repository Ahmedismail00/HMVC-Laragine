<?php

Route::group(['prefix' => 'api', 'middleware' => []], function () {
    # V1
    Route::namespace('Core\Log\Controllers\API\V1')->prefix('v1')->name('api.v1.')->group(function () {
        #*** Ex: START: Log ***#
        // Route::apiResource('logs', 'LogController');
        #*** END: Log ***#
    });
});
