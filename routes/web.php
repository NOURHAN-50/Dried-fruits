<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



    Route::prefix('admin')->name('admin.')->middleware(['auth', 'is_admin'])->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class );
        Route::resource('orders', OrderController::class);
        Route::resource('discounts', DiscountController::class);
Route::post('orders/{order}/update-status', [OrderController::class, 'updateStatus'])
    ->name('orders.update-status');
Route::get('orders/filter', [App\Http\Controllers\Admin\OrderController::class, 'filter'])->name('admin.orders.filter');
Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});


require __DIR__.'/auth.php';
