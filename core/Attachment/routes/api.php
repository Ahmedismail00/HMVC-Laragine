<?php

Route::group(['prefix' => 'api', 'middleware' => []], function () {
    # V1
    Route::namespace('Core\Attachment\Controllers\API\V1')->prefix('v1')->name('api.v1.')->group(function () {
        #*** Ex: START: Attachment ***#
        // Route::apiResource('attachments', 'AttachmentController');
        #*** END: Attachment ***#
    });
});
