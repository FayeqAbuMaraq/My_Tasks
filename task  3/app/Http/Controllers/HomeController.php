<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $featuredProducts = Product::where('is_featured', true)->take(4)->get();
        $flashSaleProducts = Product::whereNotNull('sale_price')->where('sale_price', '!=', 0)->take(4)->get(); 
        $latestProducts = Product::latest()->take(4)->get();
        return view('index', compact('featuredProducts', 'flashSaleProducts', 'latestProducts', 'categories'));
    }




    public function show($slug)
    {
        // 1. البحث عن المنتج بالـ Slug
        $product = Product::where('slug', $slug)->firstOrFail();

        // 2. جلب منتجات مشابهة (من نفس القسم، باستثناء المنتج الحالي)
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }


// دالة عرض صفحة القسم مع المنتجات
    public function category($slug)
    {
        // جلب القسم عن طريق الـ slug
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $category->products()->latest()->paginate(12);

        return view('categories.show', compact('category', 'products'));
    }


}