<?php

use Carbon\Carbon;
use Cloudinary\Cloudinary;
use Core\Admin\Models\Admin;
use Core\Attachment\Models\Attachment;
use Helper\Attachment as HelperAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;
use Intervention\Image\Facades\Image;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/ss', function () {
    return view('welcome');
});


Route::post('/image',function(Request $request){

    $uploadedFileUrl = cloudinary()->upload($request->file('image_test')->getRealPath())->getSecurePath();

    // $admin = Admin::first();
    // $file = $request->image_test;
    // HelperAttachment::addAttachment($file,$admin,'product-'.'1');
    // HelperAttachment::updateAttachment($file , $admin->attachmentRelation , $admin , 'product-'.'1');
    // HelperAttachment::deleteAttachment($admin);

    // dd($request->all());

    dd(1);
})->name('image.test');



Route::get('/cloud',function(){
    $cloud = new Cloudinary();
    $ss = $cloud->adminApi();
    dd($ss);
});
