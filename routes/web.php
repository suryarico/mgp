<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AdminUserController;
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
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});
Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return Redirect::to('login');
});
//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin');
Route::get('/category/{slug}', [App\Http\Controllers\ProductController::class, 'categoryWiseProduct']);
Route::get('/sub-category/{slug}', [App\Http\Controllers\ProductController::class, 'subcategoryWiseProduct']);
Route::post('/addtoCart', [App\Http\Controllers\ProductController::class, 'addtoCart'])->name('addtoCart');;
Route::post('/addtoWishlist', [App\Http\Controllers\ProductController::class, 'addtoWishlist'])->name('addtoWishlist');;
Route::get('/wishlist', [App\Http\Controllers\ProductController::class, 'wishlist'])->name('wishlist');;
Route::get('/cart', [App\Http\Controllers\OrderController::class, 'cart'])->name('cart');;
Route::post('/cart-update', [App\Http\Controllers\OrderController::class, 'cartUpdate'])->name('cartUpdate');;
Route::get('/checkout', [App\Http\Controllers\OrderController::class, 'checkOut'])->name('checkOut');;
Route::get('/placeOrder', [App\Http\Controllers\OrderController::class, 'placeOrder'])->name('placeOrder');;
Route::post('/showQuickview', [App\Http\Controllers\ProductController::class, 'showQuickview'])->name('showQuickview');;
Route::post('/getStatecharge', [App\Http\Controllers\OrderController::class, 'getStatecharge'])->name('getStatecharge');;
Route::post('/getCheckoutItems', [App\Http\Controllers\OrderController::class, 'getCheckoutItems'])->name('getCheckoutItems');;
/* Admin Routs */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
    /* users route*/
    Route::get('/users', [AdminUserController::class, 'getEmployeesAll'])->name('admin.users');
    Route::get('/users/add', [AdminUserController::class, 'add'])->name('admin.users.add');
    Route::get('/users/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/users/update', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::get('/users/delete/{id}', [AdminUserController::class, 'delete'])->name('admin.users.delete');
    Route::get('/users/getEmployees/', [AdminUserController::class, 'getEmployees'])->name('admin.users.getEmployees');
    Route::get('/getEmployeesAll', [AdminUserController::class, 'getEmployeesAll'])->name('admin.users.getEmployeesAll');


    /* users route end */

    /* Category route*/
    //Route::get('/categories', 'CategoryController@index')->name('admin.categories');
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/categories/add', [CategoryController::class, 'add'])->name('admin.categories.add');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories/update', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('admin.categories.delete');
    /* Category route end */

    /* SUbCategory route*/
    Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('admin.subcategories');
    Route::get('/subcategories/add', [SubCategoryController::class, 'add'])->name('admin.subcategories.add');
    Route::get('/subcategories/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin.subcategories.edit');
    Route::post('/subcategories/create', [SubCategoryController::class, 'create'])->name('admin.subcategories.create');
    Route::post('/subcategories/update', [SubCategoryController::class, 'update'])->name('admin.subcategories.update');
    Route::get('/subcategories/delete/{id}', [SubCategoryController::class, 'delete'])->name('admin.subcategories.delete');
    Route::POST('/SubCategoryController', [SubCategoryController::class, 'getsubcategory'])->name('getsubcategory');

    /* Products route*/
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/products/add', [ProductController::class, 'add'])->name('admin.products.add');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products/update', [ProductController::class, 'update'])->name('admin.products.update');
    Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name('admin.products.delete');
    /* Category route*/
    //Route::get('/categories', 'CategoryController@index')->name('admin.categories');
    Route::get('/banners', [BannerController::class, 'index'])->name('admin.banners');
    Route::get('/banners/add', [BannerController::class, 'add'])->name('admin.banners.add');
    Route::get('/banners/edit/{id}', [BannerController::class, 'edit'])->name('admin.banners.edit');
    Route::post('/banners/create', [BannerController::class, 'create'])->name('admin.banners.create');
    Route::post('/banners/update', [BannerController::class, 'update'])->name('admin.banners.update');
    Route::get('/banners/delete/{id}', [BannerController::class, 'delete'])->name('admin.banners.delete');
    Route::get('/banners/delete/{id}', [BannerController::class, 'delete'])->name('admin.banners.delete');
    /* Category route end */
});
/* Admin Routs */




/* User Frount Routs */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
});

/* User Frount Routs */