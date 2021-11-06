<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;


Auth::routes();




Route::get('/', function () {return view('front.index');});
Route::get('/test',[TestController::class,'index']);




Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('index');



    //Route::get('/profile',[AdminController::class,'upload_image']);
    Route::post('/upload-image',[HelperController::class,'upload_image'])->name('upload-image');





    Route::resource('articles',ArticleController::class);


    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/',[ProfileController::class,'index'])->name('index');
        Route::get('/edit',[ProfileController::class,'edit'])->name('edit');
        Route::put('/update',[ProfileController::class,'update'])->name('update');
    });
    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::get('/',[NotificationsController::class,'index'])->name('index');
        Route::get('/ajax',[NotificationsController::class,'notifications_ajax'])->name('ajax');
        Route::post('/see',[NotificationsController::class,'notifications_see'])->name('see');
    });
    
});