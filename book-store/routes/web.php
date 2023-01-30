<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Front\AddressController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Front\CheckOutController;
use App\Http\Controllers\Front\OrderHistory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\OrderController;
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

Route::get('/',[HomeController::class,'index']);

Route::prefix('shop')->group(function (){
    Route::get('/',[ShopController::class,'index']);
    Route::get('/{categoryName}',[ShopController::class,'category']);
    Route::get('product/{id}',[ShopController::class,'show']);
    Route::post('product/{id}/feedback',[ShopController::class,'feedback']);
    Route::post('product/{id}',[ShopController::class,'postComment']);
    Route::get('{categoryName}',[ShopController::class,'category']);
});

Route::prefix('account')->middleware('CheckUserLogin')->group(function (){
    Route::resource('address',AddressController::class);
    Route::get('/history',[OrderHistory::class,'index']);
    Route::put('/order/{id}',[OrderHistory::class,'cancel']);
});

Route::prefix('cart')->middleware('CheckUserLogin')->group(function(){
    Route::get('/',[CartController::class,'index']);
    Route::put('/update',[CartController::class,'update']);
    Route::get('/delete/{rowId}',[CartController::class,'delete']);
    Route::get('/destroy',[CartController::class,'destroy']);
    Route::get('/add/{id}',[CartController::class,'add']);
    Route::post('/add',[CartController::class,'postAdd']);
});

Route::post('/login',[AccountController::class,'checkLogin']);
Route::post('/register',[AccountController::class,'register']);
Route::get('/logout',[AccountController::class,'logout']);

Route::prefix('checkout')->middleware('CheckUserLogin')->group(function (){
    Route::get('/',[CheckOutController::class,'index']);
    Route::post('/',[CheckOutController::class,'checkout']);
});

//Admin
Route::prefix('admin')->middleware('CheckAdminLogin')->group(function (){
    Route::redirect('','admin/user');
    Route::resource('user',UserController::class);
    Route::resource('author',AuthorController::class);
    Route::resource('category',ProductCategoryController::class);
    Route::resource('product',ProductController::class);
    Route::resource('product/{product_id}/image',ProductImageController::class);
    Route::resource('order',OrderController::class);

    Route::prefix('login')->group(function (){
        Route::get('/',[\App\Http\Controllers\Admin\HomeController::class,'getLogin'])->withoutMiddleware('CheckAdminLogin');
        Route::post('/',[\App\Http\Controllers\Admin\HomeController::class,'postLogin'])->withoutMiddleware('CheckAdminLogin');
    });

    Route::get('logout',[\App\Http\Controllers\Admin\HomeController::class,'logout']);

});



