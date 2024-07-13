<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckOutController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ShopController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('contact', [HomeController::class, 'contact']);

Route::prefix('account')->group(function() {
    Route::get('login', [AccountController::class, 'login']);
    Route::post('login', [AccountController::class, 'checkLogin']);
    Route::post('logout', [AccountController::class, 'logout']);
    Route::get('register', [AccountController::class, 'register']);
    Route::post('register', [AccountController::class, 'postRegister']);

    Route::prefix('my-order')->middleware('CheckMemberLogin')->group(function() {
        Route::get('/', [AccountController::class, 'myOrderIndex']);
        Route::get('/{id}', [AccountController::class, 'myOrderShow']);
    });
});

Route::prefix('admin')->group(function() {
    Route::get('login', [AdminHomeController::class, 'getLogin']);
    Route::post('login', [AdminHomeController::class, 'postLogin']);

    Route::middleware('CheckAdminLogin')->group(function() {
        Route::resource('category', ProductCategoryController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('product', ProductController::class);
        Route::resource('product/{product_id}/image', ProductImageController::class);
        Route::resource('order', OrderController::class);
        Route::redirect('', 'admin/order');
        Route::post('logout', [AdminHomeController::class, 'logout']);
    });
});


Route::prefix('shop')->group(function () {
    Route::get('', [ShopController::class, 'index']);
    Route::get('product/{id}', [ShopController::class, 'show']);
    Route::post('product/{id}', [ShopController::class, 'postRating'])->middleware('CheckMemberLogin');
    Route::get('category/{categoryName}', [ShopController::class, 'category']);
});

Route::prefix('cart')->middleware('CheckMemberLogin')->group(function () {
    Route::get('add', [CartController::class, 'add']);
    Route::get('/', [CartController::class, 'index']);
    Route::get('delete', [CartController::class, 'delete']);
    Route::get('update', [CartController::class, 'update']);
});

Route::prefix('checkout')->middleware('CheckMemberLogin')->group(function () {
    Route::get('', [CheckOutController::class, 'index']);
    Route::post('', [CheckOutController::class, 'addOrder']);
    Route::get('/result', [CheckOutController::class, 'result']);
});
