<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DefaultAddressController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Manager;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\MomoPayment;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\VoucherController;

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
// HOME route
Route::get('/', [HomeController::class, 'show']);

// này là của framework route
Route::get('/dashboard', function () {
    return view('profile');
})->middleware(['auth', 'verified'])->name('dashboard');

// test for fun route
Route::get("/test", function () {
    return view('test');
});

// Address
Route::middleware('auth')->group(function () {
    // Lấy danh sách tỉnh
    Route::post("/api/get/provinces", [AddressController::class, 'get_provinces']);
    // lấy danh sách huyện
    Route::post("/api/get/districts", [AddressController::class, 'get_districts']);
    //lấy danh sách xã
    Route::post("/api/get/wards", [AddressController::class, 'get_wards']);
    // Cập nhật địa chỉ
    Route::patch('/address/{id}', [AddressController::class, 'update']);
    // thêm address 
    Route::post("/address", [AddressController::class, 'store'])->middleware('auth')->name('store.address');
    // Thay đổi default address
    Route::patch('/address/update', [DefaultAddressController::class, 'store']);
});

//profile user routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// manager routes
Route::middleware(['auth'])->group(function () {
    Route::post('/manager/staff/getall', [ManagerController::class, 'allStaff']);
    Route::post('/manager/staff/search', [ManagerController::class, 'searchStaff']);
    Route::post('/manager/staff/create', [ManagerController::class, 'createStaff']);
    Route::post('/manager/revenue', [ManagerController::class, 'getRevenue']);
    Route::get('/manager', [ManagerController::class, 'index']);
    Route::get('/chart', [ManagerController::class, 'chart']);
});

// Watch routes
Route::middleware('auth')->group(function () {
    // Lấy danh sách sản phẩm
    // Route::get('/watch', [WatchController::class, 'index'])->middleware('auth');

    // Hiển thị trang thêm sản phẩm
    Route::get('/watch/create', [WatchController::class, 'create'])->middleware('manager');
    // Thêm sản phẩm
    Route::post("/watch/create", [WatchController::class, 'store'])->middleware('manager')->name('watch.store');
    // Hiển thị trang sửa sản phẩm
    Route::get('/watch/{id}/edit', [WatchController::class, 'edit'])->middleware('manager');
    // Sửa sản phẩm
    Route::put("/watch/{watch}/edit", [WatchController::class, 'update'])->middleware('manager')->name('watch.store');
    // Hiển thị các sản phẩm đã xóa mềm
    Route::get("/watch/destroyed", [WatchController::class, 'destroyed'])->middleware('manager');
    // Khôi phục sản phẩm đã xóa mềm
    Route::put("/watch/{id}/restore", [WatchController::class, 'restore'])->middleware('manager');
    // Xóa mềm sản phẩm
    Route::delete("/watch/{watch}", [WatchController::class, 'destroy'])->middleware('manager');
    // Lấy toàn bộ sản phẩm
    Route::get('/watch/all', [ManagerController::class, 'getAllWatch'])->middleware('manager');
    // Hiển thị đơn sản phẩm
    Route::get("/watch/{slug}", [WatchController::class, 'show'])->name('watch.show');
    
});
    // Collection
    Route::get("/collection", [WatchController::class, 'collectionIndex']);
    // Gợi ý search
    Route::post("/watch/search", [WatchController::class, 'typeSearch']);
    // Search
    Route::get("/watch/search", [WatchController::class, 'search']);   
// Voucher Routes
Route::middleware('auth')->group(function () {
    // Mở trang tạo voucher
    Route::get('/voucher/create', [VoucherController::class, 'create'])->middleware('manager');
    // Tạo voucher
    Route::post('/voucher/create', [VoucherController::class, 'store'])->middleware('manager');
    // check status
    Route::post('/voucher/{code}/status', [VoucherController::class, 'checkStatus']);
    // Get voucher
    Route::get('/voucher/{code}/get', [VoucherController::class, 'getVoucher']);
    // Xóa voucher
    Route::delete('/voucher/{code}', [VoucherController::class, 'deleteVoucher'])->middleware('manager');
});

// Order
Route::middleware('auth')->group(function () {
    // Lấy danh sách các order
    Route::get('/order/getall', [OrderController::class, 'getAll'])->middleware('staff');
    // Lấy danh sách order
    Route::get('/order/get', [OrderController::class, 'get'])->middleware('staff');
    // Trang tạo order
    Route::get('/order/buy', [OrderController::class, 'create']);
    // Tạo đơn hàng
    Route::post('/order/buy', [OrderController::class, 'store']);
    // Lấy danh sách order đang chờ xác nhận
    Route::post('/order/pending', [OrderController::class, 'getPending'])->middleware('staff');
    // Chuyển từ Pending sang Shipping
    Route::patch('/order/{order}', [OrderController::class, 'update'])->middleware('staff');
    // Khách hàng xem các order của mình
    Route::get('/order/{user_id}', [OrderController::class, 'showForUser']);
    // Xóa order
    Route::delete('/order/{order}', [OrderController::class, 'destroy'])->middleware('manager');
    // Chuyển đến trang thanh toán momo
    Route::post('/payment/momo', [MomoPayment::class, 'send']);
});


// Order
    //test thôi này phải xóa
    // Route::get('/order', [OrderController::class, 'showForUser'])->middleware('auth');

// Brand routes
    // tạo brand
    Route::post("/brand", [BrandController::class, 'store'])->name('brand');
    // get all brand
    Route::GET('/brand/getall', [BrandController::class, 'index']);
// Category routes
    // tạo brand
    Route::post("/category", [CategoryController::class, 'store'])->name('brand');
    // get all brand
    Route::GET('/category/getall', [CategoryController::class, 'index']);

Route::post('/momo/callback', [OrderController::class, 'callbackMoMo'])->middleware('guest');
// cart routes
Route::middleware(['auth'])->group(function () {
    // lấy danh sách giỏ hàng
    Route::get('/cart', [CartsController::class, 'index'])->name('cart.index');
    // Lưu vào giỏ hàng
    Route::post('/cart', [CartsController::class, 'store']);
    // Tăng giảm số lượng giỏ hàng
    Route::put('/cart', [CartsController::class, 'update']);
    // Xóa sản phẩm trong giỏ hàng
    Route::delete('/cart', [CartsController::class, 'destroy']);
});

Route::middleware('staff')->group(function () {
    Route::get('/staff', [StaffController::class, 'index']);
});

//Shipment route
Route::middleware('auth')->group(function () {
    // Tính giá ship
    Route::post('/ship/cal', [ShipController::class, 'CalShipFee']);
});

// Test add img to watch
Route::get('/test/img', function () {
    return view('test_img');
})->middleware('auth');
Route::post('/test/img', [WatchController::class, 'store'])->middleware('auth');

//chatbox
Route::get('/chatbox', function () {
    return view('chatbox/chatbox');
});

//testquery
Route::get('/test/query', [WatchController::class, 'search'])->middleware('auth');

//test
Route::get('/test/order', [OrderController::class, 'getAll']);

require __DIR__.'/auth.php';
