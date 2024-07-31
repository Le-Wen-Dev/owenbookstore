<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\InventoryController;
use App\Models\Favorites;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/allproduct', [HomeController::class, 'allproduct'])->name('allproduct');
Route::get('/category/{category_id}', [HomeController::class, 'get_products_by_idcategory'])->name('products.by.category');
Route::get('/detail/{id}', [HomeController::class, 'get_product_detail'])->name('product.detail');
Route::get('/search', [HomeController::class, 'search'])->name('products.search');
Route::prefix('/')->group(function () {
    Route::get('/favorites', [FavouriteController::class, 'index'])->name('favorites');
    Route::post('/addToFavorites', [FavouriteController::class, 'addToFavorites']);
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/addtocart', [CartController::class, 'addToCart']);
    Route::post('/removecart', [CartController::class, 'removeCart'])->name('remove.cart'); //xóa
    Route::post('/removecart/header', [CartController::class, 'removeCartheader'])->name('remove.cart.header'); //xóa
    Route::post('/removefavorites', [FavouriteController::class, 'removeFavarites'])->name('removefavorites'); //xóa
    Route::post('/remove-all-cart', [CartController::class, 'removeAllCart'])->name('remove.all.cart');
    Route::post('/remove-all-favorites', [FavouriteController::class, 'removeAllFavarites'])->name('remove.all.favorites');
});


////----------------------------------------------------------------Admin------------------------------------------------------------
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('admin');;
Route::get('admin/users', [UserController::class, 'users'])->name('admin/users');
Route::get('admin/categories', [ProductController::class, 'categories'])->name('admin/categories');
Route::get('admin/products', [ProductController::class, 'products'])->name('admin/products');
// manager product
Route::get('admin/formaddproduct', [ProductController::class, 'formAddpro'])->name('admin/formaddproduct');
Route::post('admin/addproduct', [ProductController::class, 'create'])->name('admin/addproduct');
Route::get('admin/formeditproduct/{id}', [ProductController::class, 'formedit']);
Route::post('admin/editproduct/{id}', [ProductController::class, 'edit'])->name('admin/editproduct');
Route::get('admin/remove/{id}', [ProductController::class, 'remove'])->name('remove');


////----------------------------------------------------------------Auth  ------------------------------------------------------------
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register-post', [AuthController::class, 'register_post'])->name('register-post');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login-post', [AuthController::class, 'login_post'])->name('login-post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

////----------------------------------------------------------------Reset Qua Mail ------------------------------------------------------------
/// -> forgot_password.balde.php và reset_password.blade.php

Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot.password.form');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('forgot.password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

////----------------------------------------------------------------OTP ------------------------------------------------------------

/// -> send_otp_form.balde.php và verifyotp.blade.php
// Route để hiển thị form nhập email để gửi OTP
Route::get('/send-otp', [AuthController::class, 'showSendOtpForm'])->name('send.otp.form');
// Route để xử lý việc gửi email chứa OTP
Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('send.otp');
// Route để hiển thị form nhập OTP để xác nhận
Route::get('/verify-otp', [AuthController::class, 'showVerifyOtpForm'])->name('verify.otp.form');
// Route để xử lý việc xác nhận OTP
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify.otp');

////----------------------------------------------------------------Kho hàng ------------------------------------------------------------

Route::get('/inventory', [InventoryController::class, 'getInventory'])->name('inventory');
Route::get('/import_pro/{id}', [InventoryController::class, 'importInventory'])->name('import_pro');
Route::put('/import_pro/import/{id}', [InventoryController::class, 'import_Inventory'])->name('import.product');



Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/districts', [CheckoutController::class, 'getDistrictsByProvince'])->name('districts.byProvince');
Route::get('/wards', [CheckoutController::class, 'getWardsByDistrict'])->name('wards.byDistrict');
Route::post('/calculate-shipping-fee', [CheckoutController::class, 'calculateShipping'])->name('calculate.shipping.fee');
Route::post('/apply-voucher', [CheckoutController::class, 'applyVoucher']);
Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
Route::get('/checkout-success', [CheckoutController::class, 'checkout_success'])->name('checkout.orderSuccess');
