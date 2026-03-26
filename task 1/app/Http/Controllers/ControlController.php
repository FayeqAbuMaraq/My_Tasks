<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // الإحصائيات
        $usersCount = User::count();
        $productsCount = Product::count();
        $ordersCount = Order::count(); 
        $categoriesCount = Category::count();

        // جلب آخر 5 لكل قسم للعرض السريع
        $users = User::latest()->take(5)->get();
        $products = Product::with('category')->latest()->take(5)->get();
        $categories = Category::latest()->take(5)->get();
        $orders = Order::with('user')->latest()->take(5)->get();

        return view('control', compact(
            'users', 'products', 'categories', 'orders',
            'usersCount', 'productsCount', 'ordersCount', 'categoriesCount'
        ));
    }
}
