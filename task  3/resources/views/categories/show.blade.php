<x-app-layout>
    <div class="min-h-screen bg-[#0a0a0a] pt-32 pb-20">
        <div class="container mx-auto px-6">
            
            <div class="mb-16 border-l-4 border-orange-600 pl-6">
                <h1 class="text-5xl font-black oswald uppercase tracking-tighter text-white">
                    قسم: <span class="text-orange-600">{{ $category->name }}</span>
                </h1>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($products as $product)
                    <div class="group bg-white/5 border border-white/10 rounded-[2.5rem] p-6 hover:border-orange-600/50 transition-all duration-500">
                        <div class="relative overflow-hidden rounded-3xl mb-6 aspect-square bg-black/50">
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 class="w-full h-full object-contain group-hover:scale-110 transition duration-700">
                        </div>
                        
                        <h3 class="text-xl font-black uppercase oswald text-white mb-2">{{ $product->name }}</h3>
                        <div class="flex justify-between items-center">
                            <span class="text-orange-600 font-black text-2xl oswald">${{ number_format($product->price) }}</span>
                            <a href="{{ route('product.show', $product->slug) }}" 
                               class="bg-white text-black px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-orange-600 hover:text-white transition">
                               عرض المنتج
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <p class="text-gray-500 font-bold uppercase tracking-[0.5em]">No machines found in this category yet.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-16">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>