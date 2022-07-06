<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\productController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\deliveryController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\order_detailController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\postController;
use App\Http\Controllers\category_postController;
use App\Http\Controllers\employeeController;

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

Route::get('/',[homeController::class,'index']);
Route::get('/home/{slug}', [productController::class,'product_detail']);
Route::get('/thuong-hieu', function(){
    return view('public/thuonghieu');
});
Route::get('/cat-tia-long-cho-meo', function(){
    return view('public/service/cat_tia_long_cho_meo');
});
Route::get('/tam-spa-cho-meo', function(){
    return view('public/service/tam_spa_cho_meo');
});
Route::get('/he-thong-cua-hang', function(){
    return view('public/service/he_thong_cua_hang');
});

//cart
Route::get('/cart',  [cartController::class,'index'])->middleware('user');
Route::post('/cart/store', [cartController::class,'store'])->middleware('user');
Route::get('/cart/delete/{id}', [cartController::class,'delete'])->middleware('user');
Route::post('/cart/update/{id}', [cartController::class,'update'])->middleware('user');
Route::post('/delivery', [cartController::class,'delivery'])->middleware('user');
Route::post('/order/store', [cartController::class,'order'])->middleware('user');
Route::get('/cart/history', [cartController::class,'history'])->middleware('user');
Route::get('/cart/history-detail/{id}', [cartController::class,'history_detail'])->middleware('user');
Route::get('/cart/status/{id}', [cartController::class,'status'])->middleware('user');
Route::post('/star/store', [cartController::class,'star_store'])->middleware('user');
Route::get('/cart/giohang', [cartController::class,'giohang'])->middleware('user');

//danh muc
Route::get('danh-muc/{slug}', [categoryController::class,'danhmuc']);
Route::post('/category/fill/{id}', [categoryController::class,'locgia']);

//từ khóa
Route::post('/keywords', [homeController::class,'keywords']);
Route::post('/search', [homeController::class,'search']);
Route::post('/dat-hang', [cartController::class,'dat_hang'])->middleware('user');
Route::get('/thanh-toan', function(){
    return view('public/cart/thanhtoan');
})->middleware('user');

Route::post('/create-vnpay', [cartController::class,'vnpay']);
Route::get('/return-vnpay', [cartController::class,'return_vnpay']);
Route::get('/danh-muc-tin-tuc/{slug}', [category_postController::class,'detail']);
Route::get('/tin-tuc/{slug}', [postController::class,'detail']);


//login
Route::get('/dang-nhap',function(){
    return view('public/login/signin');
});
Route::get('/dang-ky',function(){
    return view('public/login/signup');
});

Route::post('/signup',[loginController::class,'signup']);
Route::post('/signin',[loginController::class,'signin']);
// Route::get('/login/facebook',[LoginController::class,'login_facebook']);
// Route::get('/callback/facebook',[LoginController::class,'callback_facebook']);
// Route::get('/login/google',[LoginController::class,'login_google']);
// Route::get('/callback/google',[LoginController::class,'callback_google']);
Route::get('logout',[LoginController::class,'logout']);



Route::get('/admin/dangnhap', function () {
    return view('admin.login.signin');
});
Route::post('/admin/signin', [adminController::class,'signin']);
Route::get('/admin/dangky', function () {
    return view('admin.login.signup');
});
Route::post('/admin/signup', [adminController::class,'signup']);
Route::get('/admin/logout', [adminController::class,'logout']);


//admin
Route::group(['middleware'=>'admin'], function(){
Route::get('/dashboard', [adminController::class,'index']);
Route::post('/filldata', [adminController::class,'filldata'])->middleware('statistic.index');;
Route::post('/doughnut', [adminController::class,'doughnut'])->middleware('statistic.index');;
Route::post('/find-date', [adminController::class,'find_date'])->middleware('statistic.index');;

//product
Route::get('/dashboard/product/create', [productController::class,'create'])->middleware('product.create');
Route::get('/dashboard/product/index',[productController::class,'index'])->middleware('product.index');
Route::post('/dashboard/product/store',[productController::class,'store'])->middleware('product.create');
Route::get('/dashboard/product/delete/{id}',[productController::class,'delete'])->middleware('product.delete');
Route::get('/dashboard/product/edit/{id}',[productController::class,'edit'])->middleware('product.update');
Route::post('/dashboard/product/update/{id}',[productController::class,'update'])->middleware('product.update');
Route::get('/dashboard/image/delete/{id}',[productController::class,'delete_image'])->middleware('product.delete');
Route::get('/dashboard/product/status/{id}',[productController::class,'status'])->middleware('product.update');

//category
Route::get('/dashboard/category/create',[categoryController::class,'create'])->middleware('category.create');
Route::get('/dashboard/category/index',[categoryController::class,'index'])->middleware('category.index');
Route::post('/dashboard/category/store',[categoryController::class,'store'])->middleware('category.create');
Route::get('/dashboard/category/edit/{id}',[categoryController::class,'edit'])->middleware('category.update');
Route::post('/dashboard/category/update/{id}',[categoryController::class,'update'])->middleware('category.update');
Route::get('/dashboard/category/delete/{id}',[categoryController::class,'delete'])->middleware('category.delete');
Route::get('/dashboard/category/status/{id}',[categoryController::class,'status'])->middleware('category.update');

//delivery
Route::get('/dashboard/delivery/create',[deliveryController::class,'create'])->middleware('delivery.create');
Route::get('/dashboard/delivery/index',[deliveryController::class,'index'])->middleware('delivery.index');
Route::post('/dashboard/delivery/store',[deliveryController::class,'store'])->middleware('delivery.create');
Route::get('/dashboard/delivery/delete/{id}',[deliveryController::class,'delete'])->middleware('delivery.delete');
Route::post('/dashboard/delivery/update/{id}',[deliveryController::class,'update'])->middleware('delivery.update');
Route::get('/dashboard/delivery/edit/{id}',[deliveryController::class,'edit'])->middleware('delivery.update');

//order
Route::get('/dashboard/order/index',[orderController::class,'index'])->middleware('order.index');
Route::get('/dashboard/order/delete/{id}',[orderController::class,'delete'])->middleware('order.delete');
Route::post('/dashboard/order/update/{id}',[orderController::class,'update'])->middleware('order.update');
Route::get('/dashboard/order/detail/{id}',[orderController::class,'detail'])->middleware('order.detail');
Route::post('/dashboard/order/status/{id}',[orderController::class,'status'])->middleware('order.update');

//order detail
Route::get('/dashboard/order-detail/delete/{id}',[order_detailController::class,'delete'])->middleware('order.delete');

//customer
Route::get('/dashboard/customer/index',[customerController::class,'index'])->middleware('customer.index');

//permission
Route::get('/dashboard/permission/index',[permissionController::class,'index'])->middleware('phanquyen');
Route::post('/dashboard/phanquyen/{id}',[permissionController::class,'phanquyen'])->middleware('phanquyen');
Route::get('/dashboard/web/index',[adminController::class,'web'])->middleware('web.index');
Route::post('/dashboard/web/update',[adminController::class,'web_update'])->middleware('web.index');

//setting
Route::get('/dashboard/setting', [adminController::class,'setting']);

Route::post('/dashboard/doimatkhau', [adminController::class,'doimatkhau']);

//post
Route::get('/dashboard/post/create',[postController::class,'create']);
Route::get('/dashboard/post/index',[postController::class,'index']);
Route::post('/dashboard/post/store',[postController::class,'store']);
Route::get('/dashboard/post/delete/{id}',[postController::class,'delete']);
Route::post('/dashboard/post/update/{id}',[postController::class,'update']);
Route::get('/dashboard/post/edit/{id}',[postController::class,'edit']);
Route::get('/dashboard/post/status/{id}',[postController::class,'status']);

//category post
Route::get('/dashboard/categoryPost/create',[category_postController::class,'create']);
Route::get('/dashboard/categoryPost/index',[category_postController::class,'index']);
Route::post('/dashboard/categoryPost/store',[category_postController::class,'store']);
Route::get('/dashboard/categoryPost/delete/{id}',[category_postController::class,'delete']);
Route::post('/dashboard/categoryPost/update/{id}',[category_postController::class,'update']);
Route::get('/dashboard/categoryPost/edit/{id}',[category_postController::class,'edit']);
Route::get('/dashboard/categoryPost/status/{id}',[category_postController::class,'status']);

//employee
Route::get('/dashboard/employee/create',[employeeController::class,'create']);
Route::get('/dashboard/employee/index',[employeeController::class,'index'])->middleware('admin.index');
Route::post('/dashboard/employee/store',[employeeController::class,'store']);
Route::post('/dashboard/employee/update/{id}',[employeeController::class,'update'])->middleware('admin.update');
Route::get('/dashboard/employee/edit/{id}',[employeeController::class,'edit'])->middleware('admin.update');
Route::get('/dashboard/admin/delete/{id}',[adminController::class,'delete'])->middleware('admin.delete');

});

