<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Str;

class ProductController extends Controller
{
public function index() {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create() {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // تخزين المنتج الجديد
    public function store(Request $request)
{
    // 1. التحقق من البيانات
    $validated = $request->validate([
        'name' => 'required|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'sale_price' => 'nullable|numeric|min:0',
        'description' => 'nullable|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    // 2. معالجة رفع الصورة
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('products', 'public');
        $validated['image'] = $path;
    }

    // 3. إنشاء الـ Slug تلقائياً لروابط SEO
    $validated['slug'] = Str::slug($request->name) . '-' . time();
    
    // 4. معالجة خيار "منتج مميز"
    $validated['is_featured'] = $request->has('is_featured');

    // 5. حفظ في قاعدة البيانات
    \App\Models\Product::create($validated);

    return redirect()->route('admin.dashboard')->with('success', 'تمت إضافة الدراجة بنجاح إلى الأسطول!');
}
public function shop(Request $request)
{
    $query = Product::query();

    // فلترة حسب البحث
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // فلترة حسب القسم
    if ($request->filled('category')) {
        $query->where('category_id', $request->category);
    }

    $products = $query->latest()->paginate(12);
    $categories = Category::all(); // لعرضها في قائمة الفلاتر

    return view('shop.index', compact('products', 'categories'));
}
public function show($slug)
{
    $product = Product::where('slug', $slug)->firstOrFail();
    $relatedProducts = Product::where('category_id', $product->category_id)
                                ->where('id', '!=', $product->id)
                                ->take(4) 
                                ->get();

    return view('products.show', compact('product', 'relatedProducts'));
}
public function edit(Product $product)
{
    $categories = Category::all();
    return view('admin.products.edit', compact('product', 'categories'));
}

public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'sale_price' => 'nullable|numeric|min:0', 
        //'quantity' => 'required|integer|min:0',
        'image' => 'nullable|image|max:2048', 
    ]);

    $data = $request->except('image');

    if($request->hasFile('image')){
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    $data['slug'] = Str::slug($request->name) . '-' . $product->id;
    $data['is_featured'] = $request->has('is_featured');
    
    // التأكد من معالجة السعر إذا كان فارغاً
    $data['sale_price'] = $request->sale_price ?: null;

    $product->update($data);

    return redirect()->route('admin.products.index')->with('success', 'تم التحديث بنجاح');
}
public function destroy(Product $product)
{
    if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }
    $product->delete();
    return redirect()->route('admin.products.index')->with('success', 'تم حذف المنتج وصورته');
}

}
