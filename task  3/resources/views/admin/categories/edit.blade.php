<x-app-layout>
    <div class="min-h-screen bg-[#0a0a0a] pt-32 pb-20 text-white" dir="rtl">
        <div class="container mx-auto px-6 max-w-3xl">
            
            <div class="flex items-center justify-between mb-12">
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.categories.index') }}" 
                       class="group flex items-center justify-center w-12 h-12 bg-white/5 border border-white/10 rounded-2xl hover:bg-orange-600 transition-all duration-300">
                        <svg class="w-6 h-6 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <div>
                        <p class="text-orange-600 text-xs font-black uppercase tracking-widest mb-1">لوحة التحكم</p>
                        <h1 class="text-3xl font-black oswald uppercase">تعديل <span class="text-orange-600">القسم</span></h1>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" 
                  class="bg-white/5 p-8 md:p-12 rounded-[3rem] border border-white/10 shadow-2xl relative overflow-hidden">
                @csrf
                @method('PUT')

                <div class="absolute -top-24 -left-24 w-64 h-64 bg-orange-600/10 blur-[100px] rounded-full"></div>

                <div class="relative space-y-8">
                    
                    <div>
                        <label for="name" class="block text-xs font-black uppercase mb-3 text-gray-400 tracking-widest">اسم القسم</label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               value="{{ old('name', $category->name) }}" 
                               class="w-full bg-black border @error('name') border-red-500 @else border-white/10 @enderror rounded-2xl py-5 px-8 focus:border-orange-600 transition-all outline-none text-lg font-bold shadow-inner"
                               placeholder="مثلاً: دراجات جبلية - Mountain Bikes">
                        @error('name')
                            <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

<div class="space-y-4">
    <label class="block text-xs font-black uppercase mb-3 text-gray-400 tracking-widest">صورة القسم</label>
    
    <div class="flex items-center gap-6 p-6 bg-black rounded-2xl border border-white/10 shadow-inner">
        <div class="relative group">
            <div class="absolute -inset-1 bg-orange-600 rounded-xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
            <img src="{{ asset('storage/' . $category->image) }}" 
                 class="relative w-24 h-24 object-cover rounded-xl border border-white/10" 
                 alt="Current Image">
        </div>

        <div class="flex-grow">
            <input type="file" 
                   name="image" 
                   id="image" 
                   class="block w-full text-sm text-gray-400
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-full file:border-0
                          file:text-xs file:font-black file:uppercase
                          file:bg-orange-600 file:text-white
                          hover:file:bg-white hover:file:text-orange-600
                          transition-all cursor-pointer">
            <p class="text-[10px] text-gray-500 mt-2">يفضل استخدام صيغة PNG أو JPG بدقة عالية.</p>
        </div>
    </div>
    @error('image')
        <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p>
    @enderror
</div>

                    <div class="pt-6 border-t border-white/5 flex flex-col md:flex-row gap-4">
                        <button type="submit" 
                                class="flex-grow bg-orange-600 text-white py-5 rounded-2xl font-black uppercase tracking-widest hover:bg-white hover:text-orange-600 transition-all duration-500 shadow-xl shadow-orange-600/20">
                            تحديث البيانات الآن
                        </button>
                        
                        <a href="{{ route('admin.categories.index') }}" 
                           class="px-10 py-5 bg-white/5 border border-white/10 rounded-2xl font-black uppercase tracking-widest text-center hover:bg-red-600/20 hover:text-red-500 hover:border-red-500/50 transition-all duration-500">
                            إلغاء
                        </a>
                    </div>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-gray-600 text-[10px] font-black uppercase tracking-[0.2em]">
                    X-BIKE Admin Management System v2.0
                </p>
            </div>

        </div>
    </div>
</x-app-layout>