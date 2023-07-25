<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ProductCartController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubCategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

//Admin logout
Route::get('/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');

Route::prefix('admin')->group(function () {
    Route::get('/user/profile', [AdminController::class,'UserProfile'])->name('user.profile');
    Route::post('/user/profile/store', [AdminController::class,'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/change/password', [AdminController::class,'ChangePassword'])->name('change.password');
    Route::post('/user/update/password', [AdminController::class,'UpdatePassword'])->name('update.password');
});


Route::prefix('category')->group(function () {

    Route::get('/all', [CategoryController::class,'AllCategory'])->name('all.categories');
    Route::get('/add', [CategoryController::class,'AddCategory'])->name('add.category');
    Route::post('/store', [CategoryController::class,'StoreCategory'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class,'EditCategory'])->name('category.edit');
    Route::post('/update/{id}',[CategoryController::class, 'UpdateCategory'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class,'DeleteCategory'])->name('category.delete');
});


Route::prefix('subcategory')->group(function () {

    Route::get('/all', [SubCategoryController::class, 'AllSubCategory'])->name('all.subcategories');
    Route::get('/add', [SubCategoryController::class, 'AddSubCategory'])->name('add.subcategory');
    Route::post('/store', [SubCategoryController::class, 'StoreSubCategory'])->name('subcategory.store');
    Route::get('/edit/{id}', [SubCategoryController::class, 'EditSubCategory'])->name('subcategory.edit');
    Route::post('/update/{id}', [SubCategoryController::class, 'UpdateSubCategory'])->name('subcategory.update');
    Route::get('/delete/{id}', [SubCategoryController::class, 'DeleteSubCategory'])->name('subcategory.delete');
    Route::get('/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
});




Route::prefix('products')->group(function () {

    Route::get('/all', [ProductListController::class, 'AllProductList'])->name('all.products');
    Route::get('/add', [ProductListController::class, 'AddProductList'])->name('add.product');
    Route::post('/store',[ProductListController::class, 'StoreProduct'])->name( 'product.store');
    Route::get('/delete/{id}', [ProductListController::class, 'DeleteProduct'])->name('product.delete');
    Route::get('/edit/{id}', [ProductListController::class, 'EditProduct'])->name('product.edit');
    Route::post('/update/{id}',[ProductListController::class, 'UpdateProduct'])->name('product.update');
});

Route::prefix('order')->group(function () {
    Route::get('/pending', [ProductCartController::class, 'PendingOrder'])->name('pending.order');
    Route::get('/processing', [ProductCartController::class, 'ProcessingOrder'])->name('processing.order');
    Route::get('/complete', [ProductCartController::class, 'CompleteOrder'])->name('complete.order');
    Route::get('/details/{id}', [ProductCartController::class, 'OrderDetails'])->name('order.details');
    Route::get('/processing/{id}', [ProductCartController::class, 'PendingToProcessing'])->name('pending.processing');
    Route::get('/complete/{id}', [ProductCartController::class, 'ProcessingToComplete'])->name('processing.complete');
    Route::get('/delete/{id}', [ProductCartController::class, 'OrderDelete'])->name('order.delete');
});


Route::prefix('contact')->group(function () {
    Route::get('/all/messages', [ContactController::class, 'AllMessages'])->name('all.messages');
    Route::get('/message/delete/{id}', [ContactController::class, 'DeleteMessage'])->name('message.delete');
});


Route::prefix('notification')->group(function () {
    Route::get('/all/notification', [NotificationController::class, 'AllNotification'])->name('all.notification');
    Route::get('/add/notification', [NotificationController::class, 'AddNotification'])->name('add.notification');
    Route::post('/store', [NotificationController::class, 'StoreNotification'])->name('notification.store');
    Route::post('/delete/notification/{id}', [NotificationController::class, 'DeleteNotification'])->name('notificcation.delete');
    Route::post('/update',[NotificationController::class, 'UpdateNotification'])->name('update.notification');
});


Route::prefix('slider')->group(function () {

    Route::get('/all/slider', [SliderController::class, 'AllSliders'])->name('all.sliders');
    Route::get('/add/slider', [SliderController::class, 'AddSlider'])->name('slider.add');
    Route::post('/store', [SliderController::class, 'StoreSlider'])->name('slider.store');
    Route::get('/delete/slider/{id}', [SliderController::class, 'DeleteSlider'])->name('slider.delete');
    Route::post('/update',[SliderController::class, 'UpdateSlider'])->name('slider.update');

});

Route::prefix('siteinfo')->group(function () {

    Route::get('/all/slider', [SiteInfoController::class, 'AllInformation'])->name('all.infos');
    Route::post('/update/siteinfo',[SiteInfoController::class, 'UpdateSiteInfo'])->name('update.siteinfo');
});

Route::prefix('review')->group(function(){

    Route::get('/all/reviews',[ReviewController::class, 'AllReviews'])->name('all.reviews');

});
