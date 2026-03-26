<x-app-layout>
    <div class="min-h-screen bg-[#0a0a0a] pt-28 pb-12 text-white">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center mb-12">
                <h1 class="text-4xl font-black oswald uppercase tracking-tighter">Fleet <span class="text-orange-600">Management</span></h1>
                <a href="{{ route('admin.products.create') }}" class="bg-orange-600 text-white px-8 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-white hover:text-orange-600 transition">
                    Add New Bike
                </a>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-[2.5rem] overflow-hidden backdrop-blur-xl">
                <table class="w-full text-right">
                    <thead>
                        <tr class="border-b border-white/10 text-orange-600 text-[10px] font-black uppercase tracking-[0.2em]">
                            <th class="px-8 py-6">الدراجة</th>
                            <th class="px-8 py-6">القسم</th>
                            <th class="px-8 py-6">السعر</th>
                            <th class="px-8 py-6">الحالة</th>
                            <th class="px-8 py-6">إجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($products as $product)
                        <tr class="hover:bg-white/[0.02] transition">
                            <td class="px-8 py-6 flex items-center gap-4">
                                <img src="{{ asset('storage/' . $product->image) }}" class="w-12 h-12 rounded-lg object-cover">
                                <span class="font-bold uppercase tracking-tighter">{{ $product->name }}</span>
                            </td>
                            <td class="px-8 py-6 text-gray-400 text-sm">{{ $product->category->name }}</td>
                            <td class="px-8 py-6 font-black oswald">${{ number_format($product->price) }}</td>
                            <td class="px-8 py-6">
                                @if($product->is_featured)
                                    <span class="bg-orange-600/10 text-orange-600 text-[8px] font-black px-2 py-1 rounded-full uppercase">Featured</span>
                                @else
                                    <span class="text-gray-600 text-[8px] font-black uppercase">Standard</span>
                                @endif
                            </td>
<td class="px-8 py-6">
    <div class="flex items-center justify-start gap-3">
        <a href="{{ route('admin.products.edit', $product->id) }}" 
           class="group flex items-center justify-center w-10 h-10 bg-white/5 border border-white/10 rounded-xl hover:bg-orange-600 hover:border-orange-600 hover:scale-110 transition-all duration-300 shadow-lg shadow-orange-600/0 hover:shadow-orange-600/20"
           title="تعديل بيانات الدراجة">
            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
        </a>

        <form action="{{ route('admin.products.destroy', $product->id) }}" 
              method="POST" 
              class="inline-block"
              onsubmit="return confirm(' تحذير: هل أنت متأكد من حذف هذه الدراجة نهائياً ؟');">
            @csrf 
            @method('DELETE')
            <button type="submit" 
                    class="group flex items-center justify-center w-10 h-10 bg-white/5 border border-white/10 rounded-xl hover:bg-red-600 hover:border-red-600 hover:scale-110 transition-all duration-300 shadow-lg shadow-red-600/0 hover:shadow-red-600/20"
                    title="حذف نهائي">
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
            
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>