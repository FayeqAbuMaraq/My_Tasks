<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Category;


class HomeController extends Controller
{
    public function index()
    {
        // 1.  المنتجات المقترحة 
        $featuredProducts = Product::where('is_featured', true)->take(4)->get();

        // 2. جلب منتجات العروض 
        $flashSaleProducts = Product::whereNotNull('sale_price')->where('sale_price', '!=', 0)->take(4)->get();

        // 3. جلب أحدث المنتجات  الأكثر مبيعا  
        $latestProducts = Product::latest()->take(4)->get();

        // 4. جلب التقييمات
        $testimonials = Testimonial::latest()->take(4)->get();

        return view('index', compact('featuredProducts', 'flashSaleProducts', 'latestProducts', 'testimonials'));
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


    // دالة حفظ التقييم
    public function storeReview(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|max:500',
        ]);

        Testimonial::create([
            'name' => auth()->user()->name, // اسم المستخدم المسجل
            'content' => $request->content,
            'rating' => $request->rating,
            'avatar_color' => 'primary', // لون افتراضي
        ]);

        return redirect()->back()->with('success', 'تم إرسال تقييمك بنجاح!');
    }
}