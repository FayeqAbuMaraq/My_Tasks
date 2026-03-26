<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
// عرض قائمة المنتجات
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('dashboard.products.index', compact('products'));
    }

// عرض نموذج إنشاء منتج جديد
    public function create()
    {
        $categories = Category::all(); 
        return view('dashboard.products.create', compact('categories'));
    }

// تخزين المنتج الجديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'short_description' => 'nullable|string|max:500',
        ]);
        
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $NewNameImg = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images', $NewNameImg, 'public');
            
            $data['image'] = $path;
        }

        Product::create($data);
        return redirect()->route('dashboard.products.index')
            ->with('success', 'تم إضافة المنتج بنجاح');
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('dashboard.products.edit', compact('product', 'categories'));
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug,' . $product->id,
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);


        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $image = $request->file('image');
            $NewNameImg = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images', $NewNameImg, 'public');
            
            $data['image'] = $path;
        }

        $product->update($data);


        return redirect()->route('dashboard.products.index')
            ->with('success', 'تم تحديث المنتج بنجاح');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('dashboard.products.index')
            ->with('success', 'تم حذف المنتج بنجاح');
    }
}
