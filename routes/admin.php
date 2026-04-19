<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ShippingZoneController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    Route::redirect('/', 'admin/dashboard', 301);
    Route::get('/login',[AdminAuthController::class,'showLogin'])->name('admin.login');
    Route::post('/login',[AdminAuthController::class,'login']);
});
        // POST submit
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function(){
        Route::post('/logout', [AdminAuthController::class,'logout'])->name('logout');
        Route::get('sliders', [SliderController::class,'index'])->name('sliders.index');
        Route::post('sliders', [SliderController::class,'store'])->name('sliders.store');
        Route::post('banners', [BannerController::class,'store'])->name('banners.store');
        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('ShippingZone', App\Http\Controllers\Admin\ShippingZoneController::class);
        Route::resource('products', App\Http\Controllers\Admin\ProductController::class );
        Route::resource('discounts', App\Http\Controllers\Admin\DiscountController::class);
        Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
        Route::post('orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.update-status');
        Route::get('orders/filter', [OrderController::class, 'filter'])->name('orders.filter');
        Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');


        Route::patch('reviews/{review}/approve', [ReviewController::class, 'approve'])
        ->name('reviews.approve');
        Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
        Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
});




