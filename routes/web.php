<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleCommentController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RedirectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\TrafficsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuLinkController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactReplyController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserPermissionController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PluginController;


Auth::routes();
Route::get('/', function () {return view('front.index');})->name('home');




Route::get('/test/share' , function (){
    /* To Get Data From All function name test In Modules Active Only */
    $data =  (new \App\Units\ModulesUnit())->ShareDataModules('Test');
    /* To Pass Arguments If Function has Parameters */
    $data2 =  (new \App\Units\ModulesUnit())->ShareDataModules('Test2' , 5);

    return $data2;
});



Route::prefix('admin')->middleware(['auth','ActiveAccount'])->name('admin.')->group(function () {

    Route::get('/',[AdminController::class,'index'])->name('index');

    Route::middleware('auth')->group(function () {

        //Route::get('countries',function(){return dd(config()->get('countries'));});
        Route::resource('announcements',AnnouncementController::class);
        Route::resource('files',FileController::class);
        Route::post('contacts/resolve',[ContactController::class,'resolve']);
        Route::resource('contacts',ContactController::class);
        Route::resource('menus',MenuController::class);
        Route::resource('users',UserController::class);
        Route::resource('roles',RoleController::class);



        Route::get('user-roles/{user}',[UserRoleController::class,'index'])->name('users.roles.index');
        Route::put('user-roles/{user}',[UserRoleController::class,'update'])->name('users.roles.update');
        Route::resource('articles',ArticleController::class);
        Route::resource('article-comments',ArticleCommentController::class);
        Route::resource('pages',PageController::class);
        Route::resource('tags',TagController::class);
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

    Route::prefix('plugins')->name('plugins.')->group(function(){
        Route::get('/',[PluginController::class,'index'])->name('index');
        Route::get('/create',[PluginController::class,'create'])->name('create');
        Route::post('/create',[PluginController::class,'store'])->name('store');
        Route::post('/{plugin}/activate',[PluginController::class,'activate'])->name('activate');
        Route::post('/{plugin}/deactivate',[PluginController::class,'deactivate'])->name('deactivate');
        Route::post('/{plugin}/delete',[PluginController::class,'delete'])->name('delete');
    });

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/',[ProfileController::class,'index'])->name('index');
        Route::get('/edit',[ProfileController::class,'edit'])->name('edit');
        Route::put('/update',[ProfileController::class,'update'])->name('update');
        Route::put('/update-password',[ProfileController::class,'update_password'])->name('update-password');
        Route::put('/update-email',[ProfileController::class,'update_email'])->name('update-email');
    });

    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::get('/',[NotificationsController::class,'index'])->name('index');
        Route::get('/ajax',[NotificationsController::class,'ajax'])->name('ajax');
        Route::post('/see',[NotificationsController::class,'see'])->name('see');
        Route::get('/create',[NotificationsController::class,'create'])->name('create');
        Route::post('/create',[NotificationsController::class,'store'])->name('store');
    });

});


Route::get('blocked',[HelperController::class,'blocked_user'])->name('blocked');
Route::get('robots.txt',[HelperController::class,'robots']);
Route::get('manifest.json',[HelperController::class,'manifest'])->name('manifest');
Route::get('sitemap.xml',[SiteMapController::class,'sitemap']);
Route::get('sitemaps/links',[SiteMapController::class,'custom_links']);
Route::get('sitemaps/{name}/{page}/sitemap.xml',[SiteMapController::class,'viewer']);


Route::view('contact','front.pages.contact')->name('contact');
Route::get('page/{page}',[FrontController::class,'page'])->name('page.show');
Route::get('tag/{tag}',[FrontController::class,'tag'])->name('tag.show');
Route::get('category/{category}',[FrontController::class,'category'])->name('category.show');
Route::get('article/{article}',[FrontController::class,'article'])->name('article.show');
Route::get('blog',[FrontController::class,'blog'])->name('blog');
Route::post('contact',[FrontController::class,'contact_post'])->name('contact-post');
Route::post('comment',[FrontController::class,'comment_post'])->name('comment-post');
