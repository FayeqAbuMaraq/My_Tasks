<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ControlController; 
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MyOrderController;
use App\Http\Controllers\CheckoutController;

//الصفحة الرئيسية 
Route::get('/', [HomeController::class, 'index'])->name('home');
// صفحة تفاصيل المنتج
Route::get('/product/{slug}', [HomeController::class, 'show'])->name('product.show');

// لعرض القسم والمنتجات التابعة له 
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');

// مسارات لوحة التحكم (للأدمن فقط)
Route::middleware(['auth', 'role:admin'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
    Route::get('/', [ControlController::class, 'index'])->name('index'); 
    // إدارة المستخدمين
    Route::resource('users', UserController::class);
    // إدارة الأقسام
    Route::resource('categories', CategoryController::class)->except(['show']);
    // إدارة المنتجات
    Route::resource('products', ProductController::class);
    // إدارة الطلبات
    Route::resource('orders', OrderController::class);
});


// مسارات السلة
Route::get('cart', [CartController::class, 'index'])->name('cart.index');       
Route::post('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::patch('update-cart', [CartController::class, 'update'])->name('cart.update');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('cart.remove');


// إتمام الطلب (Checkout)
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');


// مسارات المستخدمين المسجلين
Route::middleware('auth')->group(function () {
// عرض وإدارة طلبات المستخدم
Route::get('/my-orders', [MyOrderController::class, 'index'])->name('my-orders.index');
Route::get('/my-orders/{id}', [MyOrderController::class, 'show'])->name('my-orders.show');
Route::post('/my-orders/{id}/cancel', [MyOrderController::class, 'cancel'])->name('my-orders.cancel');
// تقييم  
Route::post('/review', [HomeController::class, 'storeReview'])->name('review.store');
// ملفات التعريف الشخصية للمستخدم
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
