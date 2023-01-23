<?php

Route::namespace('Core\Attachment\Controllers\Web')->prefix('admin')->name('admin.')->group(function () {
    #*** Ex: START: Attachment ***#
    // Route::resource('attachments', 'AttachmentController')->except([
    //    'store', 'update', 'destroy'
    // ]);
    #*** END: Attachment ***#
});
