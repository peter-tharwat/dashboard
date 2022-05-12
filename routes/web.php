<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RedirectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\TrafficsController;
use App\Http\Controllers\FooterLinkController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuLinkController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactReplyController;
use App\Http\Controllers\AnnouncementController;


Auth::routes();
Route::get('/', function () {return view('front.index');})->name('home');

Route::prefix('admin')->middleware(['auth','ActiveAccount'])->name('admin.')->group(function () {

    Route::get('/',[AdminController::class,'index'])->name('index');

    Route::middleware(['CheckRole:ADMIN'])->group(function () {

        
        Route::resource('announcements',AnnouncementController::class);
        Route::resource('files',FileController::class);
        Route::post('contacts/resolve',[ContactController::class,'resolve'])
                ->can('resolve',\App\Models\Contact::class)->name('contacts.resolve');
        Route::resource('contacts',ContactController::class);
        Route::resource('menus',MenuController::class);
        Route::resource('users',UserController::class);
        Route::resource('articles',ArticleController::class);
        Route::resource('pages',PageController::class);
        Route::resource('contact-replies',ContactReplyController::class);
        Route::post('faqs/order',[FaqController::class,'order'])->name('faqs.order');
        Route::resource('faqs',FaqController::class);
        Route::post('menu-links/get-type',[MenuLinkController::class,'getType'])->name('menu-links.get-type');
        Route::post('menu-links/order',[MenuLinkController::class,'order'])->name('menu-links.order');
        Route::resource('menu-links',MenuLinkController::class);
        Route::resource('categories',CategoryController::class);
        Route::resource('redirections',RedirectionController::class);
        Route::get('traffics',[TrafficsController::class,'index'])->name('traffics.index');
        Route::get('traffics/{traffic}/logs',[TrafficsController::class,'logs'])->name('traffics.logs');
        Route::get('error-reports',[TrafficsController::class,'error_reports'])->name('traffics.error-reports');
        Route::get('error-reports/{report}',[TrafficsController::class,'error_report'])->name('traffics.error-report');
        Route::post('footer-links/order',[FooterLinkController::class,'order'])->name('footer-links.order');
        Route::resource('footer-links',FooterLinkController::class);
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/',[SettingController::class,'index'])->name('index');
            Route::put('/{settings}/update',[SettingController::class,'update'])->name('update');
        });
    });

    Route::prefix('upload')->name('upload.')->group(function(){
        Route::post('/image',[HelperController::class,'upload_image'])->name('image');
        Route::post('/file',[HelperController::class,'upload_file'])->name('file');
        Route::post('/remove-file',[HelperController::class,'remove_files'])->name('remove-file');
    });

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/',[ProfileController::class,'index'])->name('index')->can('control', User::class);
        Route::get('/edit',[ProfileController::class,'edit'])->name('edit')->can('control', User::class);
        Route::put('/update',[ProfileController::class,'update'])->name('update')->can('control', User::class);
        Route::put('/update-password',[ProfileController::class,'update_password'])->name('update-password')->can('control', User::class);
        Route::put('/update-email',[ProfileController::class,'update_email'])->name('update-email')->can('control', User::class);
    });

    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::get('/',[NotificationsController::class,'index'])->name('index');
        Route::get('/ajax',[NotificationsController::class,'notifications_ajax'])->name('ajax');
        Route::post('/see',[NotificationsController::class,'notifications_see'])->name('see');
    });
    
});


Route::get('blocked',[HelperController::class,'blocked_user'])->name('blocked');
Route::get('robots.txt',[HelperController::class,'robots']);
Route::get('manifest.json',[HelperController::class,'manifest'])->name('manifest');
Route::get('sitemap.xml',[SiteMapController::class,'sitemap']);
Route::get('sitemaps/links','SiteMapController@custom_links');
Route::get('sitemaps/{name}/{page}/sitemap.xml',[SiteMapController::class,'viewer']);


Route::view('contact','front.pages.contact')->name('contact');
Route::get('page/{page}',[FrontController::class,'page'])->name('page.show');
Route::get('category/{category}',[FrontController::class,'category'])->name('category.show');
Route::get('article/{article}',[FrontController::class,'article'])->name('article.show');
Route::get('blog',[FrontController::class,'blog'])->name('blog');
Route::post('contact',[FrontController::class,'contact_post'])->name('contact-post');