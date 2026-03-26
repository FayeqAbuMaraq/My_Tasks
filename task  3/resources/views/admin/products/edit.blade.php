<x-app-layout>
    <div class="min-h-screen bg-[#0a0a0a] pt-28 pb-12 text-white">
        <div class="container mx-auto px-6 max-w-4xl">
            
            <div class="mb-10 flex justify-between items-end">
                <div>
                    <h1 class="text-4xl font-black oswald uppercase tracking-tighter">Edit <span class="text-orange-600">Machine</span></h1>
                    <p class="text-gray-500 text-[10px] font-bold mt-2 uppercase tracking-[0.3em]">تحديث بيانات: {{ $product->name }}</p>
                </div>
                <a href="{{ route('admin.products.index') }}" class="text-gray-400 hover:text-white text-[10px] font-black uppercase tracking-widest">Back to Fleet</a>
            </div>

            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT') <div class="bg-white/5 border border-white/10 p-8 rounded-[2.5rem] backdrop-blur-xl">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 mb-2 ml-2">اسم الدراجة</label>
                            <input type="text" name="name" value="{{ $product->name }}" required class="w-full bg-black/50 border border-white/10 rounded-2xl py-4 px-6 focus:border-orange-600 transition outline-none">
                        </div>

                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 mb-2 ml-2">القسم</label>
                            <select name="category_id" class="w-full bg-black/50 border border-white/10 rounded-2xl py-4 px-6 focus:border-orange-600 transition outline-none">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 mb-2 ml-2">السعر الأصلي ($)</label>
                            <input type="number" name="price" value="{{ $product->price }}" required class="w-full bg-black/50 border border-white/10 rounded-2xl py-4 px-6 focus:border-orange-600 transition outline-none">
                        </div>

                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 mb-2 ml-2">سعر الخصم</label>
                            <input type="number" name="sale_price" value="{{ $product->sale_price }}" class="w-full bg-black/50 border border-white/10 rounded-2xl py-4 px-6 focus:border-orange-600 transition outline-none">
                        </div>
                    </div>

                    <div class="mt-8">
                        <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 mb-2 ml-2">الوصف</label>
                        <textarea name="description" rows="5" class="w-full bg-black/50 border border-white/10 rounded-2xl py-4 px-6 focus:border-orange-600 transition outline-none">{{ $product->description }}</textarea>
                    </div>
                </div>

                <div class="bg-white/5 border border-white/10 p-8 rounded-[2.5rem]">
                    <div class="flex flex-col md:flex-row gap-8 items-center">
                        <div class="w-40 h-40 bg-black/50 rounded-3xl p-4 border border-white/10 flex items-center justify-center">
                            <img src="{{ asset('storage/'.$product->image) }}" class="max-w-full max-h-full object-contain" alt="Current Image">
                        </div>
                        <div class="flex-grow">
                            <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 mb-4 ml-2">تحديث الصورة (اختياري)</label>
                            <input type="file" name="image" class="w-full text-xs text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:bg-orange-600 file:text-white hover:file:bg-white hover:file:text-orange-600 transition-all cursor-pointer">
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full bg-orange-600 text-white py-6 rounded-2xl font-black uppercase tracking-[0.3em] text-xs hover:bg-white hover:text-orange-600 transition-all duration-500 shadow-2xl shadow-orange-600/20">
                    Update Fleet Member
                </button>

            </form>
        </div>
    </div>
</x-app-layout>