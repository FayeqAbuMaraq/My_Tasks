<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    // إدارة الأقسام في لوحة التحكم (للأدمن)
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('dashboard.categories.index', compact('categories'));
    }
    // عرض نموذج إنشاء قسم جديد
    public function create()
    {
        return view('dashboard.categories.create');
    }

    // حفظ القسم الجديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // توليد اسم فريد
            $NewNameImg = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images', $NewNameImg, 'public');
            
            $data['image'] = $path;
        }

        Category::create($data);
        return redirect()->route('dashboard.categories.index')
            ->with('success', 'تم إضافة القسم بنجاح');
    }

    // عرض القسم والمنتجات التابعة له في المتجر
        public function show(Category $category)
    {
        $products = $category->products()->latest()->paginate(10);
        
        return view('categories.show', compact('category', 'products'));
    }

    // عرض نموذج تعديل القسم
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    // تحديث القسم
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug,' . $category->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }

            $image = $request->file('image');
            $NewNameImg = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images', $NewNameImg, 'public');
            
            $data['image'] = $path;
        }

        $category->update($data);

        return redirect()->route('dashboard.categories.index')
            ->with('success', 'تم تحديث القسم بنجاح');
    }

    // حذف القسم
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('dashboard.categories.index')
            ->with('success', 'تم حذف القسم بنجاح');
    }
}
