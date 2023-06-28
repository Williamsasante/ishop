<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishController;
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



Route::middleware('admin:admin')->group(function () {
    Route::get('admin/login', [AdminController::class, 'loginForm']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
});


//All routes for Admin
Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('/admin/Profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
Route::get('/admin/Profile/Edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/Profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password',[AdminProfileController::class,'AdminChangePassword'])->name('admin.change.password');
Route::post('/update/change/password',[AdminProfileController::class,'AdminUpdateChangePassword'])->name('update.change.password');

//All routes for Users
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
    })->name('dashboard');
Route::get('/',[IndexController::class,'index']);
Route::get('/user/logout',[IndexController::class,'UserLogout'])->name('user.logout');
Route::get('/user/UserProfile',[IndexController::class,'UserProfile'])->name('user.profile');
Route::post('/user/Profile/store',[IndexController::class,'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password',[IndexController::class,'ChangePassword'])->name('change.password');
Route::post('/user/Password/Update',[IndexController::class,'UserPasswordUpdate'])->name('user.password.update');

//Brands Route at Admin
Route::prefix('brand')->group(function(){
Route::get('/view',[BrandController::class,'BrandView'])->name('all.brand');
Route::post('/store',[BrandController::class,'BrandStore'])->name('brand.store');
Route::get('/edit/{id}',[BrandController::class,'BrandEdit'])->name('brand.edit');
Route::post('/update',[BrandController::class,'BrandUpdate'])->name('brand.update');
Route::get('/delete/{id}',[BrandController::class,'BrandDelete'])->name('brand.delete');

});

//Categories Route at Admin
Route::prefix('category')->group(function(){
Route::get('/view',[CategoryController::class,'CategoryView'])->name('all.category');
Route::post('/store',[CategoryController::class,'CategoryStore'])->name('category.store');
Route::post('/update/{id}',[CategoryController::class,'CategoryUpdate'])->name('category.update');
Route::get('/delete/{id}',[CategoryController::class,'CategoryDelete'])->name('category.delete');
Route::get('/edit1/{id}',[CategoryController::class,'CategoryEditEdit'])->name('category.edit.edit');

});
//SubCategories Route at Admin
Route::prefix('subcategory')->group(function(){
Route::get('/sub/view',[SubCategoryController::class,'SubCategoryView'])->name('all.subcategory');
Route::post('/sub/store',[SubCategoryController::class,'SubCategoryStore'])->name('subcategory.store');
Route::get('/edit/{id}',[SubCategoryController::class,'SubCategoryEdit'])->name('subcategory.edit');
Route::get('/sub/delete/{id}',[SubCategoryController::class,'SubCategoryDelete'])->name('subcategory.delete');
Route::get('/sub/edit/{id}',[SubCategoryController::class,'SubCategoryEditEdit'])->name('subcategory.edit.edit');
Route::post('/sub/update/{id}',[SubCategoryController::class,'SubCategoryUpdate'])->name('subcategory.update');


});

//Products Route at Admin
Route::prefix('product')->group(function(){
Route::get('/add',[ProductController::class,'AddProduct'])->name('all-product');
Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product-store');
Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');
Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');
Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');

});

// Slider Route at Admin
//GFGF
//help
Route::prefix('slider')->group(function(){
Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');
Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');


});
// Product Details at Frontend
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);
// Product View Modal with Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

// Add to Cart Store Data
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);


// Get Data from mini cart
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);
// Remove mini cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// Add to Wishlist
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);

// Wishlist page
Route::get('/wishlist', [WishController::class, 'ViewWishlist'])->name('wishlist');
Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
Route::post('/add-product-to-wishlist/{product_id}', [WishController::class, 'AddProductToWishList']);