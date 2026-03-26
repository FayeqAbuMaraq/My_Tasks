<x-app-layout>
    <div class="min-h-screen bg-[#0a0a0a] pt-28 pb-12 text-white">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-3 gap-12">
                
                <div class="lg:col-span-1">
                    <div class="bg-white/5 border border-white/10 p-8 rounded-[2.5rem] sticky top-28">
                        <h2 class="text-2xl font-black oswald uppercase mb-6 text-orange-600">New Category</h2>
                        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-2">Category Name</label>
                                <input type="text" name="name" required class="w-full bg-black/50 border border-white/10 rounded-2xl py-4 px-6 focus:border-orange-600 transition outline-none text-sm">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-2">Image (Optional)</label>
                                <input type="file" name="image" class="text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:bg-orange-600 file:text-white hover:file:bg-orange-700">
                            </div>
                            <button type="submit" class="w-full bg-orange-600 text-white py-4 rounded-xl font-black uppercase text-[10px] tracking-widest hover:bg-white hover:text-orange-600 transition duration-500">
                                Create Category
                            </button>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="bg-white/5 border border-white/10 rounded-[2.5rem] overflow-hidden backdrop-blur-xl">
                        <table class="w-full text-right">
                            <thead>
                                <tr class="border-b border-white/10 text-orange-600 text-[10px] font-black uppercase tracking-[0.2em]">
                                    <th class="px-8 py-6 text-right">القسم</th>
                                    <th class="px-8 py-6 text-center">عدد المنتجات</th>
                                    <th class="px-8 py-6 ">إجراءات</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                @foreach($categories as $category)
                                <tr class="hover:bg-white/[0.02] transition">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-4">
                                            @if($category->image)
                                                <img src="{{ asset('storage/' . $category->image) }}" class="w-10 h-10 rounded-full object-cover border border-white/10">
                                            @endif
                                            <span class="font-bold uppercase tracking-tighter">{{ $category->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-center">
                                        <span class="bg-white/10 px-3 py-1 rounded-lg text-xs font-black">{{ $category->products_count }}</span>
                                    </td>
<td class="px-8 py-6">
    <div class="flex items-center justify-start gap-3">
        <a href="{{ route('admin.categories.edit', $category->id) }}" 
           class="group flex items-center justify-center w-10 h-10 bg-white/5 border border-white/10 rounded-xl hover:bg-orange-600 hover:border-orange-600 hover:scale-110 transition-all duration-300 shadow-lg shadow-orange-600/0 hover:shadow-orange-600/20"
           title="تعديل">
            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
        </a>

        <form action="{{ route('admin.categories.destroy', $category) }}" 
              method="POST" 
              class="inline-block"
              onsubmit="return confirm('تحذير: هل أنت متأكد من الحذف؟ سيتم مسح كافة المنتجات المرتبطة بهذا القسم!')">
            @csrf 
            @method('DELETE')
            <button type="submit" 
                    class="group flex items-center justify-center w-10 h-10 bg-white/5 border border-white/10 rounded-xl hover:bg-red-600 hover:border-red-600 hover:scale-110 transition-all duration-300 shadow-lg shadow-red-600/0 hover:shadow-red-600/20"
                    title="حذف">
                <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
            </button>
        </form>
    </div>
</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>