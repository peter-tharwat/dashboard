<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('index');




    Route::post('/upload-image',[AdminController::class,'upload-image'])->name('upload-image');
    Route::post('/notifications-seen',[AdminController::class,'notifications_seen'])->name('notifications.seen');
});




/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
 