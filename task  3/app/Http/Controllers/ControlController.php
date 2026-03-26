<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Str;
class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $usersCount = User::count();
    $productsCount = Product::count();
    $ordersCount = Order::count();
    $categoriesCount = Category::count();

    // جلب البيانات للجداول
    $orders = Order::with('user')->latest()->take(5)->get();
    $products = Product::with('category')->latest()->take(5)->get();
    
    $categories = Category::withCount('products')->get();

    return view('admin.control', compact(
        'usersCount', 'productsCount', 'ordersCount', 'categoriesCount', 
        'orders', 'products', 'categories'
    ));
    }
}
