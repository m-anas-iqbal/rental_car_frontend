<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BorrowedController;
use App\Http\Controllers\CancelationController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\SettingController;
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
use Illuminate\Support\Facades\Artisan;

Route::get('clear-cache', function () {
    Artisan::call('view:clear');
   Artisan::call('config:cache');
   Artisan::call('route:cache');
   Artisan::call('cache:clear');
   Artisan::call('route:clear');
   Artisan::call('config:clear');

   return "Cache cleared successfully";
})->name('clear');



Route::get('/', [AdminController::class, 'login'])->name('login');
Route::post('/login_post', [AdminController::class, 'login_post'])->name('login_post');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // car addons Route
    Route::get('/admin/car_addons/add', [AdminController::class, 'car_addons_add']);
    Route::post('/admin/car_addons/add', [AdminController::class, 'car_addons_add_post']);
    Route::get('/admin/car_addons', [AdminController::class, 'car_addons']);
    Route::get('/admin/car_addons/edit/{id}', [AdminController::class, 'car_addons_edit']);
    Route::post('/admin/car_addons/edit', [AdminController::class, 'car_addons_edit_post']);
    Route::get('/admin/car_addons/view/{id}', [AdminController::class, 'car_addons_view']);
    Route::get('/admin/car_addons/{id}/{status}', [AdminController::class, 'status']);
    // car  Route
    Route::get('/admin/cars/add', [AdminController::class, 'cars_add']);
    Route::post('/admin/cars/add', [AdminController::class, 'cars_add_post']);
    Route::get('/admin/cars/{id?}', [AdminController::class, 'cars']);
    Route::get('/admin/cars/edit/{id}', [AdminController::class, 'cars_edit']);
    Route::post('/admin/cars/edit', [AdminController::class, 'cars_edit_post']);
    Route::get('/admin/cars/view/{id}', [AdminController::class, 'cars_view']);
    Route::get('/admin/cars/{id}/{status}', [AdminController::class, 'cars_status']);
    // Vin Fetch Details
    Route::get('vin_fetch', [AdminController::class, 'vin_fetch']);
    // car Brands Route
    Route::get('/admin/car_brands/add', [AdminController::class, 'car_brands_add']);
    Route::post('/admin/car_brands/add', [AdminController::class, 'car_brands_add_post']);
    Route::get('/admin/car_brands', [AdminController::class, 'car_brands']);
    Route::get('/admin/car_brands/edit/{id}', [AdminController::class, 'car_brands_edit']);
    Route::post('/admin/car_brands/edit', [AdminController::class, 'car_brands_edit_post']);
    Route::get('/admin/car_brands/view/{id}', [AdminController::class, 'car_brands_view']);
    Route::get('/admin/car_brands/{id}/{status}', [AdminController::class, 'brands_status']);
    //  Users
    Route::get('/admin/local_users', [AdminController::class, 'local_users']);
    Route::get('/admin/international_users', [AdminController::class, 'international_users']);
    //  Orders
    Route::get('/admin/orders', [AdminController::class, 'orders']);
    Route::get('/admin/international_users', [AdminController::class, 'international_users']);
    // Logout Route
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    // Coupon Route
    Route::get('admin/coupons', [CouponController::class, 'index']);
    Route::get('admin/coupons/add', [CouponController::class, 'create']);
    Route::post('admin/coupons/add', [CouponController::class, 'store']);
    Route::get('admin/coupons/edit/{id}', [CouponController::class, 'edit']);
    Route::post('admin/coupons/edit/{id}', [CouponController::class, 'update']);
    Route::get('admin/coupons/delete/{id}', [CouponController::class, 'destroy']);

    // Offers Route
    Route::get('admin/offers', [OfferController::class, 'index']);
    Route::get('admin/offers/add', [OfferController::class, 'create']);
    Route::post('admin/offers/add', [OfferController::class, 'store']);
    Route::get('admin/offers/edit/{id}', [OfferController::class, 'edit']);
    Route::post('admin/offers/edit/{id}', [OfferController::class, 'update']);
    Route::get('admin/offers/delete/{id}', [OfferController::class, 'destroy']);
    Route::get('/admin/offers/status/{id}/{status}', [OfferController::class, 'offers_status']);

    // Orders
    Route::get('Orders', [AdminController::class, 'order_list']);
    Route::get('order_view/{id}', [AdminController::class, 'order_view']);
    Route::get('admin/orders/status/{id}/{status}', [AdminController::class, 'order_status']);

    // Payments
    Route::get('payments/{id?}', [AdminController::class, 'payment_list']);

    // Borrowed Request
    Route::get('admin/borrowed_request', [BorrowedController::class, 'index']);
    Route::get('admin/borrowed_request/send_request/{id}', [BorrowedController::class, 'send_request']);
    Route::get('admin/borrowed_request/send_request_data', [BorrowedController::class, 'send_request_data']);

    // Cancelation Request

    Route::get('admin/cancelation_request', [CancelationController::class, 'index']);
    Route::get('admin/cancelation_request/{id}', [CancelationController::class, 'cancelation']);
    // Route::get('cancelation_request/{id}', [CancelationController::class, 'cancelation']);
    Route::get('admin/borrowed_request/send_request_data', [CancelationController::class, 'send_request_data']);
     // Setting

    Route::get('admin/Vat_setting', [SettingController::class, 'index']);
    Route::post('admin/vat/update', [SettingController::class, 'update']);
});

Route::get('/verify-email/{token}', [AdminController::class, 'verify_email_submit']);
// Route::get('/admin/payment', [StripePaymentController::class, 'stripe']);
// Route::post('/admin/stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');
