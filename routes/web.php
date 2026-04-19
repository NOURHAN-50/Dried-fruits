<?php
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\ShippingZoneController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout',[UserAuthController::class,'logout']);
Route::get('/home',[HomeController::class,'index'])->name('front.home.index');
Route::get('/cart', [CartController::class, 'index'])->name('front.cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('update.cart');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/shop', [ App\Http\Controllers\ProductController::class, 'shop'])->name('shop');
Route::get('/products/{product}', [ App\Http\Controllers\ProductController::class, 'show'])->name('front.products.show');
Route::get('/product/stock/{id}', [ProductController::class, 'stock'])->name('product.stock');
Route::get('/categories/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');
Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout');
Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])
    ->name('checkout.placeOrder');























Route::prefix('admin')->group(function () {
    Route::get('/login',[AdminAuthController::class,'showLogin'])->name('admin.login');
    Route::post('/login',[AdminAuthController::class,'login']);
});
        // POST submit
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function(){
        Route::post('/logout', [AdminAuthController::class,'logout'])->name('logout');
        Route::get('sliders', [SliderController::class,'index'])->name('sliders.index');
        Route::post('sliders', [SliderController::class,'store'])->name('sliders.store');
        Route::post('banners', [BannerController::class,'store'])->name('banners.store');
        Route::resource('categories', CategoryController::class);
        Route::resource('ShippingZone', ShippingZoneController::class);
        Route::resource('products', ProductController::class );
        Route::resource('discounts', DiscountController::class);
        Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
        Route::post('orders/{order}/update-status', [OrderController::class, 'updateStatus'])
        ->name('orders.update-status');
        Route::get('/admin/orders/{id}', [OrderController::class, 'show']);
        Route::get('orders/filter', [OrderController::class, 'filter'])->name('admin.orders.filter');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');
        // Route للموافقة على تقييم
        Route::patch('reviews/{review}/approve', [ReviewController::class, 'approve'])
        ->name('reviews.approve');
        Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
        Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
});













































