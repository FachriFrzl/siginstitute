<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'aboutus'])->name('about');
Route::get('/landingpage', [HomeController::class, 'landing'])->name('landing');
Route::get('/SpecialClassSIG', [HomeController::class, 'landing2'])->name('specialclass');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/daftaruser', [UserController::class, 'index'])->name('back');
    Route::post('/product/add_cart/{id}',[ProductController::class, 'add_cart'])->name('add_cart');
    Route::get('/cart',[ProductController::class, 'cart'])->name('cart');
    Route::post('/detail', [ProductController::class, 'detail'])->name('detail');
    Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/checkout/invoice/{id}',[CheckoutController::class, 'invoice'])->name('invoice');
    Route::get('/siginstitute', [ProductController::class, 'index'])->name('siginstitute');
    Route::get('/my-order',[OrderController::class, 'myorder'])->name('myorder');
    // routes/web.php
    Route::delete('/cart/remove',[ProductController::class,'remove'])->name('remove');
    Route::post('cart/applypromo', [ProductController::class, 'ApplyPromo'])->name('promo');
    //route admin
    Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/akun', [AdminController::class, 'akun'])->name('akun');
    Route::get('/admin/order',[AdminController::class, 'order'])->name('order');
    Route::get('/admin/product', [AdminController::class, 'adminproduct'])->name('adminproduct');
    Route::get('/admin/product/create', [AdminController::class, 'createproduct'])->name('createproduct');
    Route::post('/admin/product/create/store',[AdminController::class, 'storeproduct'])->name('storeproduct');
    Route::get('/admin/product/edit/{id}',[AdminController::class, 'editproduct'])->name('editproduct');
    Route::put('/admin/product/edit/update/{id}', [AdminController::class, 'updateproduct'])->name('updateproduct');
    Route::delete('/admin/product/delete/{id}', [AdminController::class, 'destroy'])->name('deleteProduct');
    Route::get('/admin/voucher', [AdminController::class, 'voucher'])->name('voucher');
    Route::get('/admin/voucher/create',[AdminController::class, 'createvoucher'])->name('createvoucher');
    Route::post('/admin/voucher/create/store',[AdminController::class, 'storevoucher'])->name('storevoucher');
    Route::get('/admin/voucher/edit/{id}',[AdminController::class, 'editvoucher'])->name('editvoucher');
    Route::put('/admin/voucher/edit/update/{id}', [AdminController::class, 'updatevoucher'])->name('updatevoucher');
    Route::delete('/admin/voucher/delete/{id}', [AdminController::class, 'destroyVoucher'])->name('destroyVoucher');
});
