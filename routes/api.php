<?php

use App\Http\Controllers\AddressController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MomoPayment;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\WatchController;
use App\Models\User;
use App\Models\Voucher;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// store brand api
Route::post("/brand", [BrandController::class, 'store'])->middleware('auth:sanctum')->name('brand');
// store category api
Route::post("/category", [CategoryController::class, 'store'])->middleware('auth:sanctum')->name('cate');

Route::post("/register", [RegisteredUserController::class, 'store'])->name('register');

Route::post("/register/admin", [RegisteredUserController::class, 'storeAdmin']);

Route::post('/tokens/create', function (Request $request) {
    $token = User::find(2)->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});

Route::post('login', [AuthenticatedSessionController::class, 'store']);

// Tạo address cho user
Route::post('/address/store', [AddressController::class, 'store'])->middleware('auth:sanctum');

// Order
    // Tạo order
Route::post('order/create', [OrderController::class, 'store'])->middleware('auth:sanctum');
// Route::post('order/create', function () {dd(1);});
    // Get Order
Route::post('order/{user_id}/get', [OrderController::class, 'showForUser'])->middleware('auth:sanctum');
    // Delete order
Route::delete('order/{order}/delete', [OrderController::class, 'destroy'])->middleware('auth:sanctum');
    //peding sang shipping
Route::put('/order/{order}', [OrderController::class, 'update'])->middleware('auth:sanctum');

// Watch
    // Tạo sản phẩm đồng hồ
Route::post('/watch/store', [WatchController::class, 'store'])->middleware('auth:sanctum');
    //update
Route::post('/watch/{watch}/update', [WatchController::class, 'update'])->middleware('auth:sanctum');
    //delete
Route::delete('/watch/{watch}/delete', [WatchController::class, 'destroy'])->middleware('auth:sanctum');
    //all deleted
Route::post('/watch/deleted/all', [WatchController::class, 'destroyed'])->middleware('auth:sanctum');
    //restore deleted
Route::post('/watch/{watch}/restore', [WatchController::class, 'restore'])->middleware('auth:sanctum');
    // search
Route::post('/watch/search', [WatchController::class, 'typeSearch'])->middleware('auth:sanctum');

// Cart
    // Thêm vào giỏ hàng
Route::post('/cart/store', [CartsController::class, 'store'])->middleware('auth:sanctum');
    // Show giỏ hàng
Route::post('/cart/{user}/show', [CartsController::class, 'show'])->middleware('auth:sanctum');
    // Cập nhật giỏ hàng
Route::post('/cart/{carts}/{status}', [CartsController::class, 'update'])->middleware('auth:sanctum');
    // Xóa giỏ hàng
Route::delete('/cart/{carts}', [CartsController::class, 'destroy'])->middleware('auth:sanctum');

//test api 
Route::post('/payment/momo', [MomoPayment::class, 'send'])->middleware('auth:sanctum');

//voucher
    // Thêm voucher
Route::post('/voucher/store', [VoucherController::class, 'store'])->middleware('auth:sanctum');
    // check status voucher
Route::post('/voucher/status/{code}', [VoucherController::class, 'checkStatus'])->middleware('auth:sanctum');
    // Get voucher
Route::post('/voucher/get/{code}', [VoucherController::class, 'getVoucher'])->middleware('auth:sanctum');

// Tính ship
Route::post('/ship/cal', [ShipController::class, 'CalShipFee']);