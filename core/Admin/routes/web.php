<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Core\Admin\Controllers\Web')->prefix('admin')->name('admin.')->group(function () {
    #*** Ex: START: Admin ***#
    Route::resource('admins', 'AdminController')->except([
       'store', 'update', 'destroy'
    ]);
    #*** END: Admin ***#
});
