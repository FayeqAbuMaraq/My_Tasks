<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; 
use App\Models\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
                View::composer('layouts.app', function ($view) {
            // نتحقق من وجود الجدول لتجنب الأخطاء أثناء التثبيت
            if (\Illuminate\Support\Facades\Schema::hasTable('categories')) {
                $view->with('navbarCategories', Category::take(6)->get());
            }
        });
    }
}
