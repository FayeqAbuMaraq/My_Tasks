<x-app-layout>
    <div class="min-h-screen bg-white pt-28 pb-12">
        <div class="container mx-auto px-6 md:px-10">
            
            <nav class="flex mb-8 text-[10px] font-black uppercase tracking-widest text-gray-400">
                <a href="/" class="hover:text-orange-600">Home</a>
                <span class="mx-2">/</span>
                <a href="/shop" class="hover:text-orange-600">Shop</a>
                <span class="mx-2">/</span>
                <span class="text-black">{{ $product->name }}</span>
            </nav>

            <div class="grid lg:grid-cols-2 gap-16 items-start">
                
                <div class="relative group">
                    <div class="absolute -top-10 -left-10 w-64 h-64 bg-orange-600/5 rounded-full blur-3xl"></div>
                    <div class="relative bg-gray-50 rounded-[3rem] p-12 overflow-hidden border border-gray-100">
                        @if($product->is_featured)
                            <div class="absolute top-8 left-8 z-10">
                                <span class="bg-orange-600 text-white px-4 py-1 rounded-full text-[10px] font-black uppercase">Professional Choice</span>
                            </div>
                        @endif
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/800' }}" 
                            class="w-full h-auto object-contain transform group-hover:scale-110 transition duration-700" 
                            alt="{{ $product->name }}">
                    </div>
                </div>

                <div class="flex flex-col">
                    <h5 class="text-orange-600 font-bold mb-2 uppercase tracking-[0.3em] text-xs">
                        {{ $product->category->name ?? 'Premium Series' }}
                    </h5>
                    <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tighter uppercase oswald leading-none">
                        {{ $product->name }}
                    </h1>

                    <div class="flex items-center gap-6 mb-8">
                        <span class="text-4xl font-black text-black oswald">
                            ${{ number_format($product->sale_price ?: $product->price) }}
                        </span>
                        @if($product->sale_price)
                            <span class="text-2xl text-gray-300 line-through oswald">
                                ${{ number_format($product->price) }}
                            </span>
                        @endif
                    </div>

                    <p class="text-gray-500 text-lg leading-relaxed mb-10 font-medium">
                        {{ $product->description ?: 'لا يوجد وصف متاح لهذا المنتج حالياً.' }}
                    </p>

                    <div class="grid grid-cols-2 gap-4 mb-10">
                        <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100">
                            <span class="block text-[10px] uppercase font-black text-gray-400 tracking-widest mb-1">مادة الاطار</span>
                            <span class="font-bold">Carbon Fiber T800</span>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100">
                            <span class="block text-[10px] uppercase font-black text-gray-400 tracking-widest mb-1">الوزن</span>
                            <span class="font-bold">7.2 KG</span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                <button onclick="addToCart('{{ $product->name }}', {{ $product->price }}, event, {{ $product->id }})" 
                        class="w-full bg-black text-white py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-orange-600 hover:text-white transition duration-300">       
                    أضف للسلة
                </button>
                        <button class="px-8 py-6 border-2 border-black rounded-2xl hover:bg-black hover:text-white transition-all duration-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </button>
                    </div>
                </div>
            </div>

            @if($relatedProducts->count() > 0)
            <div class="mt-32">
                <h3 class="text-3xl font-black mb-12 oswald uppercase tracking-tighter">You May Also <span class="text-orange-600">Like</span></h3>
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($relatedProducts as $related)
                        <a href="{{ route('product.show', $related->slug) }}" class="group">
                            <div class="bg-gray-50 rounded-[2rem] p-8 mb-4 overflow-hidden border border-gray-100 group-hover:border-orange-600/30 transition">
                                <img src="{{ asset('storage/' . $related->image) }}" class="w-full h-32 object-contain group-hover:scale-110 transition duration-500" alt="">
                            </div>
                            <h4 class="font-black uppercase text-sm group-hover:text-orange-600 transition">{{ $related->name }}</h4>
                            <span class="text-orange-600 font-black oswald">${{ number_format($related->price) }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>