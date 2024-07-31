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
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VoucherController;
use App\Models\Favorites;
use App\Http\Controllers\BankController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderControllerr;

Route::get('/laylsgd', [BankController::class, 'laylsgd']);
Route::post('/store-bank-data', [BankController::class, 'storeBankData']);
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
// manager user 
Route::get('admin/users', [UserController::class, 'users'])->name('admin/users');
Route::post('admin/adduser', [UserController::class, 'add'])->name('admin/adduser');
Route::get('admin/edituser/{id}', [UserController::class, 'formedit'])->name('admin/edituser');
Route::post('admin/edituser/{id}', [UserController::class, 'edit'])->name('admin/edituser');
Route::get('admin/removeuser/{id}', [UserController::class, 'remove'])->name('admin/removeuser');
//manager category
Route::get('admin/categories', [CategoryController::class, 'categories'])->name('admin/categories');
Route::post('admin/addcategory', [CategoryController::class, 'add'])->name('admin/addcategory');
Route::get('admin/editcategory/{id}', [CategoryController::class, 'formedit'])->name('admin/editcategory');
Route::post('admin/editcategory/{id}', [CategoryController::class, 'edit'])->name('admin/editcategory');
Route::get('admin/removecategory/{id}', [CategoryController::class, 'remove'])->name('admin/removecategory');
// manager product
Route::get('admin/products', [ProductController::class, 'products'])->name('admin/products');
Route::get('admin/formaddproduct', [ProductController::class, 'formAddpro'])->name('admin/formaddproduct');
Route::post('admin/addproduct', [ProductController::class, 'create'])->name('admin/addproduct');
Route::get('admin/formeditproduct/{id}', [ProductController::class, 'formedit']);
Route::post('admin/editproduct/{id}', [ProductController::class, 'edit'])->name('admin/editproduct');
Route::get('admin/remove/{id}', [ProductController::class, 'remove'])->name('remove');
// manager voucher
Route::get('admin/vouchers', [VoucherController::class, 'vouchers'])->name('admin/vouchers');
Route::post('admin/addvoucher', [VoucherController::class, 'add'])->name('admin/addvouchers');
Route::get('admin/editvoucher/{id}', [VoucherController::class, 'formedit'])->name('admin/editvouchers');
Route::post('admin/editvoucher/{id}', [VoucherController::class, 'edit'])->name('admin/editvouchers');
Route::get('admin/removevoucher/{id}', [VoucherController::class, 'remove'])->name('admin/removevoucher');
// manager orders
Route::get('admin/orders', [OrderController::class, 'orders'])->name('admin/orders');
Route::patch('admin/order/update-status/{id}', [OrderController::class, 'updateStatus'])->name('admin.order.updateStatus');
Route::get('admin/removeorder/{id}', [OrderController::class, 'remove'])->name('admin.order.removeOrder');
Route::get('admin/detailoder/{id}', [OrderController::class, 'detail'])->name('admin.order.detail');



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


//---------------------------checkout--------------------------------
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/districts', [CheckoutController::class, 'getDistrictsByProvince'])->name('districts.byProvince');
Route::get('/wards', [CheckoutController::class, 'getWardsByDistrict'])->name('wards.byDistrict');
Route::post('/calculate-shipping-fee', [CheckoutController::class, 'calculateShipping'])->name('calculate.shipping.fee');
Route::post('/apply-voucher', [CheckoutController::class, 'applyVoucher']);
Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
Route::get('/checkout-success', [CheckoutController::class, 'checkout_success'])->name('checkout.orderSuccess');
