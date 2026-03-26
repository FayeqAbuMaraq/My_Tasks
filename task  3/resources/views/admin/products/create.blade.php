<x-app-layout>
    <div class="min-h-screen bg-[#0a0a0a] pt-28 pb-12 text-white">
        <div class="container mx-auto px-6 max-w-4xl">
            
            <div class="mb-10">
                <h1 class="text-4xl font-black oswald uppercase tracking-tighter">Add New <span class="text-orange-600">Machine</span></h1>
                <p class="text-gray-500 text-xs font-bold mt-2 uppercase tracking-[0.3em]">إضافة دراجة جديدة إلى الأسطول</p>
            </div>

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <div class="bg-white/5 border border-white/10 p-8 rounded-[2.5rem] backdrop-blur-xl">
                    <div class="grid md:grid-cols-2 gap-8">
                        
                        <div class="space-y-2">
                            <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 ml-2">اسم الدراجة</label>
                            <input type="text" name="name" required class="w-full bg-black/50 border border-white/10 rounded-2xl py-4 px-6 focus:border-orange-600 transition outline-none" placeholder="Vantage S-Works...">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 ml-2">القسم</label>
                            <select name="category_id" required class="w-full bg-black/50 border border-white/10 rounded-2xl py-4 px-6 focus:border-orange-600 transition outline-none appearance-none">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 ml-2">السعر الأصلي ($)</label>
                            <input type="number" name="price" required class="w-full bg-black/50 border border-white/10 rounded-2xl py-4 px-6 focus:border-orange-600 transition outline-none" placeholder="0.00">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 ml-2">سعر العرض (اختياري)</label>
                            <input type="number" name="sale_price" class="w-full bg-black/50 border border-white/10 rounded-2xl py-4 px-6 focus:border-orange-600 transition outline-none" placeholder="0.00">
                        </div>
                    </div>

                    <div class="mt-8 space-y-2">
                        <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 ml-2">وصف المنتج</label>
                        <textarea name="description" rows="4" class="w-full bg-black/50 border border-white/10 rounded-2xl py-4 px-6 focus:border-orange-600 transition outline-none" placeholder="اكتب تفاصيل الدراجة والمواصفات..."></textarea>
                    </div>

                    <div class="mt-8 flex gap-8">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="is_featured" value="1" class="w-5 h-5 rounded border-white/10 bg-black/50 text-orange-600 focus:ring-orange-600">
                            <span class="text-[10px] font-black uppercase tracking-widest text-gray-400 group-hover:text-white transition">منتج مميز (Featured)</span>
                        </label>
                    </div>
                </div>

                <div class="bg-white/5 border border-white/10 p-8 rounded-[2.5rem]">
                    <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 mb-4 ml-2">صورة المنتج</label>
                    <div class="relative border-2 border-dashed border-white/10 rounded-3xl p-12 text-center hover:border-orange-600/50 transition cursor-pointer">
                        <input type="file" name="image" required class="absolute inset-0 opacity-0 cursor-pointer">
                        <svg class="w-12 h-12 text-gray-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        <p class="text-sm text-gray-500 font-bold italic">اسحب الصورة هنا أو اضغط للرفع</p>
                    </div>
                </div>

                <button type="submit" class="w-full bg-orange-600 text-white py-6 rounded-2xl font-black uppercase tracking-[0.3em] text-xs hover:bg-white hover:text-orange-600 transition-all duration-500 shadow-2xl shadow-orange-600/20">
                    Create Product & Publish
                </button>

            </form>
        </div>
    </div>
</x-app-layout>