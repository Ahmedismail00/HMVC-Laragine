<?php

Route::namespace('Core\Log\Controllers\Web')->prefix('admin')->name('admin.')->group(function () {
    #*** Ex: START: Log ***#
    // Route::resource('logs', 'LogController')->except([
    //    'store', 'update', 'destroy'
    // ]);
    #*** END: Log ***#
});
