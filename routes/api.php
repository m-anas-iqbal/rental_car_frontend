<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripePaymentController;
use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
});
Route::post('/car/checkout_process', [HomeController::class, 'car_check_out']);
Route::post('apply_coupon', [HomeController::class, 'apply_coupon']);
Route::post('order_payments', [HomeController::class, 'order_payments']);
Route::get('stripe', [StripePaymentController::class, 'stripe']);
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');
Route::post('/cars/list', [HomeController::class, 'car_list']);
Route::post('/car/detail/{id}', [HomeController::class, 'car_get']);
Route::post('/brands/list', [HomeController::class, 'brand_list']);
Route::post('/user/register', [HomeController::class, 'register']);
Route::post('/user/login', [HomeController::class, 'loginUser']);
Route::get('/car/filter', [HomeController::class, 'filter_car']);
Route::post('/car/addons', [HomeController::class, 'addon_car']);
Route::post('/offers', [HomeController::class, 'offers_list']);
Route::post('get_days', [HomeController::class, 'get_days']);
Route::post('/orders', [HomeController::class, 'order_list']);
Route::post('/find_car', [HomeController::class, 'find_car']);
// Borrowed Route
Route::post('/borrowed_request', [HomeController::class, 'car_check_out_borrowed']);
Route::post('/borrowed_detail', [HomeController::class, 'get_borrow_detail']);
// Payment Route
// Forget ROute
Route::post('/forget-password', [HomeController::class, 'forgetpassword']);
Route::post('/reset_password', [HomeController::class, 'reset_password']);
Route::post('/check_token', [HomeController::class, 'check_token']);
// Review Route
Route::post('/add_review', [HomeController::class, 'add_review']);
Route::post('/get_reviews', [HomeController::class, 'get_reviews']);

// CancellationRequest

Route::post('cancel_request', [HomeController::class, 'add_cancelation_request']);

// Setting
Route::post('vat_amount', [HomeController::class, 'vat_amount']);
// Profile
Route::post('get_profile_data', [HomeController::class, 'get_profile_data']);
Route::post('update_profile_data', [HomeController::class, 'update_profile_data']);
