<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\TestController;

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
Auth::routes();
Route::get('/', function () {return view('front.index');});
Route::get('/test',[TestController::class,'index']);

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('index');




    Route::post('/upload-image',[AdminController::class,'upload_image'])->name('upload-image');

    
    Route::get('/notifications-ajax',[NotificationsController::class,'notifications_ajax'])->name('notifications.ajax');
    Route::post('/notifications-see',[NotificationsController::class,'notifications_see'])->name('notifications.see');
});




/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
 