<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
USE App\Models\Product;
use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
{
public function index() {
    $categories = Category::withCount('products')->get();
    return view('admin.categories.index', compact('categories'));
}

public function store(Request $request) {
    $request->validate(['name' => 'required|unique:categories|max:255']);
    
    Category::create([
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'image' => $request->hasFile('image') ? $request->file('image')->store('categories', 'public') : null
    ]);

    return back()->with('success', 'تم إضافة القسم!');
}

public function edit(Category $category)
{
    return view('admin.categories.edit', compact('category'));
}
public function show($slug)
{
    // جلب القسم بناءً على الروابط الصديقة (Slug)
    $category = Category::where('slug', $slug)->firstOrFail();

    // جلب كافة المنتجات التابعة لهذا القسم مع الترقيم
    $products = Product::where('category_id', $category->id)->latest()->paginate(12);

    return view('categories.show', compact('category', 'products'));
}
public function update(Request $request, Category $category)
{
    // 1. التحقق من البيانات (الاسم والصورة)
    $request->validate([
        'name'  => 'required|string|max:255|unique:categories,name,' . $category->id,
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // اختياري عند التعديل
    ]);

    // 2. تجهيز البيانات الأساسية
    $data = [
        'name' => $request->name,
        'slug' => Str::slug($request->name),
    ];

    // 3. معالجة الصورة في حال تم رفع ملف جديد
    if ($request->hasFile('image')) {
        // حذف الصورة القديمة من السيرفر لتوفير المساحة
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        // حفظ الصورة الجديدة
        $path = $request->file('image')->store('categories', 'public');
        $data['image'] = $path;
    }

    // 4. تنفيذ التحديث
    $category->update($data);

    return redirect()->route('admin.categories.index')
                     ->with('success', 'تم تحديث القسم والصورة بنجاح! 🔥');
}
public function destroy(Category $category) {
    $category->delete();
    return back()->with('success', 'تم حذف القسم!');
}

}
