<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PaymentController;
/*
|--------------------------------------------------------------------------
| المسارات العامة (Public Routes)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact-us', [LeadController::class, 'store'])->name('leads.store');

// عرض الخدمات
Route::get('/our-services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/our-services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// صفحات الموقع التعريفي (Navbar Pages)
Route::view('/why-lazord', 'pages.why-lazord')->name('pages.why');
Route::view('/solutions', 'pages.solutions')->name('pages.solutions');
Route::view('/pricing', 'pages.pricing')->name('pages.pricing');

// مدونة الموقع
Route::get('/learning', [PostController::class, 'index'])->name('pages.learning');
Route::get('/article/{slug}', [PostController::class, 'show'])->name('blog.show');

/*
|--------------------------------------------------------------------------
| المسارات المحمية (Authenticated Routes)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // 1. لوحة التحكم (متاحة للجميع، والكنترولر يحدد المحتوى حسب الدور)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
    |===============================================
    | قسم الإدارة 
    |===============================================
    */
    Route::middleware(['role:admin'])->group(function () {
        
        // إدارة الخدمات
        Route::get('/services/manage', [ServiceController::class, 'manage'])->name('services.manage');
        Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
        Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
        Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

        // إدارة طلبات الانضمام
        Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
        Route::get('/leads/{lead}', [LeadController::class, 'show'])->name('leads.show');
        Route::delete('/leads/{lead}', [LeadController::class, 'destroy'])->name('leads.destroy');


        // إدارة المقالات 
        Route::get('/admin/posts', [PostController::class, 'adminIndex'])->name('admin.posts.index');
        Route::get('/admin/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
        Route::post('/admin/posts', [PostController::class, 'store'])->name('admin.posts.store');
        Route::delete('/admin/posts/{id}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
    });

    /*
    |===============================================
    | قسم المختبر (Admin + Technician)
    |===============================================
    | نستخدم 'role:admin|technician' للسماح للاثنين
    */
    Route::middleware(['role:admin|technician'])->group(function () {
        
        Route::get('/admin/orders', [OrderController::class, 'adminIndex'])->name('orders.admin-index');
        Route::get('/admin/orders/{order}', [OrderController::class, 'adminShow'])->name('orders.admin-show');
        Route::patch('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.update-status');
    });

    /*
    |===============================================
    | قسم الطبيب (Doctor)
    |===============================================
    */
    Route::resource('orders', OrderController::class);

    /*
    |===============================================
    | الملف الشخصي
    |===============================================
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';