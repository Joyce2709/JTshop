<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\MaterialProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
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
Route::get('/trang-chu',[HomeController::class,'index']);
Route::get('/admin',[AdminController::class,'index']);
Route::get('/dashboard',[AdminController::class,'show_dashboard']);
Route::get('/logout',[AdminController::class,'logout']);
Route::post('/admin-dashboard',[AdminController::class,'dashboard']);

//category product: danh mục sản phẩm
Route::get('/add-category-product',[CategoryProduct::class,'add_category_product']);
Route::get('/edit-category-product/{category_product_id}',[CategoryProduct::class,'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}',[CategoryProduct::class,'delete_category_product']);
Route::get('/all-category-product',[CategoryProduct::class,'all_category_product']);
Route::get('/unactive-category-product/{category_product_id}',[CategoryProduct::class,'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}',[CategoryProduct::class,'active_category_product']);
Route::post('/save-category-product',[CategoryProduct::class,'save_category_product']);
Route::post('/update-category-product/{category_product_id}',[CategoryProduct::class,'update_category_product']);

//Material product: chất liệu sản phẩm
Route::get('/add-material-product',[MaterialProduct::class,'add_material_product']);
Route::get('/edit-material-product/{material_product_id}',[MaterialProduct::class,'edit_material_product']);
Route::get('/delete-material-product/{material_product_id}',[MaterialProduct::class,'delete_material_product']);
Route::get('/all-material-product',[MaterialProduct::class,'all_material_product']);
Route::get('/unactive-material-product/{material_product_id}',[MaterialProduct::class,'unactive_material_product']);
Route::get('/active-material-product/{material_product_id}',[MaterialProduct::class,'active_material_product']);
Route::post('/save-material-product',[MaterialProduct::class,'save_material_product']);
Route::post('/update-material-product/{material_product_id}',[MaterialProduct::class,'update_material_product']);

//product: sản phẩm
Route::get('/add-product',[ProductController::class,'add_product']);
Route::get('/edit-product/{product_id}',[ProductController::class,'edit_product']);
Route::get('/delete-product/{product_id}',[ProductController::class,'delete_product']);
Route::get('/all-product',[ProductController::class,'all_product']);
Route::get('/unactive-product/{product_id}',[ProductController::class,'unactive_product']);
Route::get('/active-product/{product_id}',[ProductController::class,'active_product']);
Route::post('/save-product',[ProductController::class,'save_product']);
Route::post('/update-product/{product_id}',[ProductController::class,'update_product']);
//post: bài viết
Route::get('/add-post',[PostController::class,'add_post']);
Route::get('/edit-post/{post_id}',[PostController::class,'edit_post']);
Route::get('/delete-post/{post_id}',[PostController::class,'delete_post']);
Route::get('/all-post',[PostController::class,'all_post']);
Route::get('/unactive-post/{post_id}',[PostController::class,'unactive_post']);
Route::get('/active-post/{post_id}',[PostController::class,'active_post']);
Route::post('/save-post',[PostController::class,'save_post']);
Route::post('/update-post/{post_id}',[PostController::class,'update_post']);

//Danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{category_id}',[CategoryProduct::class,'show_category_home']);
Route::get('/chat-lieu-san-pham/{material_id}',[MaterialProduct::class,'show_material_home']);
Route::get('/chi-tiet-san-pham/{product_id}',[ProductController::class,'details_product']);

//cart
Route::post('/update-cart-quantity',[CartController::class,'update_cart_quantity']);
Route::post('/update-cart',[CartController::class,'update_cart']);
Route::post('/save-cart',[CartController::class,'save_cart']);
Route::post('/add-cart-ajax',[CartController::class,'add_cart_ajax']);
Route::get('/show-cart',[CartController::class,'show_cart']);
Route::get('/gio-hang',[CartController::class,'gio_hang']);
Route::get('/delete-to-cart/{rowId}',[CartController::class,'delete_to_cart']);
Route::get('/del-product/{session_id}',[CartController::class,'delete_product']);
Route::get('/del-all-product',[CartController::class,'delete_all_product']);

