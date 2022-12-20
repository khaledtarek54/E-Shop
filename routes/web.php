<?php

use App\Http\Controllers\Admin\FrontendController as AdminFrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
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
Route::get('/',[FrontendController::class,'index']);
Route::get('category',[FrontendController::class ,'category']);
Route::get('view.category/{slug}',[FrontendController::class ,'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class ,'productview']);


Route::post('add-to-cart',[CartController::class ,'addproduct']);
Route::post('delete-cart-item',[CartController::class ,'deleteproduct']);
Route::post('update-cart',[CartController::class ,'updatecart']);
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//add to wishlist
Route::post('add-to-wishlist',[WishlistController::class ,'add']);
Route::post('addtocarttt',[WishlistController::class ,'addproduct']);
Route::post('remove-from-wishlist',[WishlistController::class ,'destroy']);




Auth::routes();

Route::get('load-cart-data',[CartController::class ,'cartcount']);
Route::get('load-wishlist-count',[WishlistController::class ,'wishlistcount']);


Route::middleware(['auth'])->group(function(){

    Route::get('cart',[CartController::class ,'viewcart']);
    Route::get('checkout',[CheckoutController::class , 'index']);
    Route::post('place-order',[CheckoutController::class , 'placeorder']);
    Route::get('my-orders',[UserController::class ,'index']);
    Route::get('view-order/{id}',[UserController::class ,'vieworder']);
    Route::get('wishlist',[WishlistController::class ,'index']);
    
    
}); 

Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::get('/dashboard', 'App\Http\Controllers\Admin\DashboardController@index' );

    Route::get('categories', 'App\Http\Controllers\Admin\CategoryController@index' );

    Route::get('add.category','App\Http\Controllers\Admin\CategoryController@add');
    Route::post('insert.category','App\Http\Controllers\Admin\CategoryController@insert');
    Route::get('edit.cat/{id}','App\Http\Controllers\Admin\CategoryController@edit');
    Route::put('update.category/{id}','App\Http\Controllers\Admin\CategoryController@update');
    Route::get('delete.cat/{id}','App\Http\Controllers\Admin\CategoryController@delete');

    Route::get('products','App\Http\Controllers\Admin\ProductController@index');
    Route::get('add.products','App\Http\Controllers\Admin\ProductController@add');
    Route::post('insert.product','App\Http\Controllers\Admin\ProductController@insert');
    Route::get('edit.product/{id}','App\Http\Controllers\Admin\ProductController@edit');
    Route::put('update.product/{id}','App\Http\Controllers\Admin\ProductController@update');
    Route::get('delete.product/{id}','App\Http\Controllers\Admin\ProductController@delete');



    
    Route::get('orders','App\Http\Controllers\Admin\OrderController@index');
    Route::get('admin/view-order/{id}','App\Http\Controllers\Admin\OrderController@vieworder');
    Route::post('update-order/{id}','App\Http\Controllers\Admin\OrderController@updateorder');
    Route::get('order-history','App\Http\Controllers\Admin\OrderController@orderhistory');


    Route::get('users','App\Http\Controllers\Admin\DashboardController@users');
    Route::get('view.user/{id}','App\Http\Controllers\Admin\DashboardController@viewuser');
});