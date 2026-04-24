<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;




Route::post('/register', [UserAuthController::class, 'register'])->name('register');
Route::post('/login', [UserAuthController::class, 'login'])->name('login');
Route::post('/logout',[UserAuthController::class,'logout'])->name('logout');
Route::get('/',[HomeController::class,'index'])->name('front.home.index');
Route::get('/cart', [CartController::class, 'index'])->name('front.cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('update.cart');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('front.products.show');
Route::get('/product/stock/{id}', [ProductController::class, 'stock'])->name('product.stock');
Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');
Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout');
Route::post('/checkout/apply-discount', [CheckoutController::class, 'applyDiscount'])
    ->name('checkout.applyDiscount');
Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])
    ->name('checkout.placeOrder');
    Route::get('/order/success/{id}', [OrderController::class, 'success'])
    ->name('order.success');
Route::get('/my-orders', [OrderController::class, 'myOrders'])
    ->middleware('auth')
    ->name('orders.index');



require __DIR__.'/admin.php';








































