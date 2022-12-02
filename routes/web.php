<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\adminController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\User\userController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin/logout', [logoutController::class, 'Logout'])->name('admin.logout');

// Admin Side side  routes
Route::prefix('Admin')->group(function () {
    Route::get('/userview', [adminController::class, 'userView'])->name('admin.userview');
    Route::get('/useradd', [adminController::class, 'userAdd'])->name('admin.useradd');
    Route::post('/userstore', [adminController::class, 'userStore'])->name('admin.userstore');
    Route::get('/useredit{id}', [adminController::class, 'userEdit'])->name('admin.useredit');
    Route::post('/userupdate{id}', [adminController::class, 'userUpdate'])->name('admin.userupdate');
    Route::get('/userdelete{id}', [adminController::class, 'userDelete'])->name('admin.userdelete');
    Route::get('/userrole', [UserRoleController::class, 'roleView'])->name('admin.userrole');
    Route::get('changeStatus', [adminController::class, 'changeStatus']);
    Route::get('/addProducts', [ProductController::class, 'addProduct'])->name('admin.addProducts');
    Route::post('/storeProduct', [ProductController::class, 'storeProduct'])->name('admin.storeProduct');
    
    Route::get('/add-product-image', [ProductImageController::class, 'add_Product_image'])->name('admin.add-product-image');
    Route::post('/store-Product-image', [ProductImageController::class, 'store_Product_Image'])->name('admin.store-Product-image');
    Route::get('/product-list',[ProductController::class,'productList'])->name('admin.product-list');
    Route::get('/price-filter',[ProductController::class,'priceFilter'])->name('admin.price-filter');

    Route::get('/addCategory', [CategoryController::class, 'addCategories'])->name('admin.addCategory');
    Route::post('/store-category', [CategoryController::class, 'storeCategory'])->name('admin.store-category');


    Route::get('/add-cart/{id}',[CartController::class,'addCartProduct'])->name('product.add-cart');
    Route::get('cart', [CartController::class, 'cart'])->name('cart');
    Route::patch('update-cart', [CartController::class, 'update'])->name('update_cart');
    Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove_from_cart');

    Route::get('/add-order', [OrderController::class, 'addOrder'])->name('product.add-order');
    Route::post('/store-order', [OrderController::class, 'storeOrder'])->name('product.store-order');

    // https://www.youtube.com/watch?v=rq0IKZ2fHkE&ab_channel=SharmaCoder

});
//user side route
Route::prefix('User')->group(function () {
    Route::get('/viewdata', [userController::class, 'viewData'])->name('user.viewdata');
    //https://techsolutionstuff.com/post/datatable-server-side-custom-search-filter-in-laravel
    Route::get('/getusers', [userController::class, 'getUsers'])->name('test.getusers');
});


Route::get('changeStatus', [adminController::class, 'changeStatus']);


