<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MyOrderController;
use App\Http\Controllers\CheckoutController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [ControlController::class, 'index'])->name('admin.dashboard');
});
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/shop', [ProductController::class, 'shop'])->name('shop.index');
// مسارات واجهة المستخدم (Front-end)
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

// مجموعة لوحة التحكم (Admin) التي عملنا عليها سابقاً
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::resource('products', ProductController::class)->names('admin.products');
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::get('/dashboard', [ControlController::class, 'index'])->name('admin.dashboard');
});
// مسارات لوحة التحكم (Admin)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // سجل الطلبات بالكامل
    Route::get('/orders', [OrderController::class, 'adminIndex'])->name('orders.index');
    
    // عرض تفاصيل طلب معين
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    
    // تحديث حالة الطلب (قيد الانتظار، مكتمل، إلخ)
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

});
Route::middleware(['auth'])->group(function () {
    Route::get('/my-orders', [OrderController::class, 'userOrders'])->name('my-orders');
});
Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/add-to-cart/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/remove-from-cart', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
require __DIR__.'/auth.php';
