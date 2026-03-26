<x-app-layout>
    <div class="min-h-screen bg-[#0a0a0a] pt-32 pb-20 text-white">
        <div class="container mx-auto px-6">
            
            <div class="flex flex-col md:flex-row justify-between items-center mb-16 gap-6">
                <div>
                    <h1 class="text-6xl font-black oswald uppercase tracking-tighter">THE <span class="text-orange-600">FLEET</span></h1>
                    <p class="text-gray-500 font-bold uppercase tracking-[0.3em] text-[10px] mt-2">استعرض أسطول الدراجات الاحترافية</p>
                </div>
                
                <form action="{{ route('shop.index') }}" method="GET" class="relative w-full md:w-96">
                    <input type="text" name="search" placeholder="ابحث عن دراجة..." value="{{ request('search') }}" dir="ltr"
                           class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 focus:border-orange-600 transition outline-none text-sm">
                    <button type="submit" class="absolute right-4 top-4 text-orange-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </form>
            </div>

            <div class="flex flex-col lg:flex-row gap-12">
                <div class="w-full lg:w-64 space-y-8">
                    <div>
                        <h3 class="text-xs font-black uppercase tracking-widest text-orange-600 mb-6">الاقسام</h3>
                        <div class="space-y-3">
                            <a href="{{ route('shop.index') }}" class="block text-sm {{ !request('category') ? 'text-white font-bold' : 'text-gray-500 hover:text-white' }} transition">جميع الاقسام</a>
                            @foreach($categories as $cat)
                                <a href="{{ route('shop.index', ['category' => $cat->id]) }}" 
                                   class="block text-sm {{ request('category') == $cat->id ? 'text-orange-600 font-bold' : 'text-gray-500 hover:text-white' }} transition">
                                   {{ $cat->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="flex-grow">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @forelse($products as $product)
                            <div class="group bg-white/5 border border-white/10 rounded-[2.5rem] p-6 hover:border-orange-600/50 transition-all duration-500">
                                <div class="relative overflow-hidden rounded-3xl mb-6 aspect-square bg-black/50 p-4">
                                    <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-contain group-hover:scale-110 transition duration-700">
                                    @if($product->sale_price)
                                        <span class="absolute top-4 left-4 bg-orange-600 text-white text-[8px] font-black px-3 py-1 rounded-full uppercase tracking-widest">عرض</span>
                                    @endif
                                </div>
                                <h3 class="text-xl font-black uppercase oswald mb-2">{{ $product->name }}</h3>
                                <div class="flex justify-between items-end">
                                    <div>
                                        @if($product->sale_price)
                                            <p class="text-gray-500 line-through text-xs font-bold">${{ number_format($product->price) }}</p>
                                            <p class="text-orange-600 text-2xl font-black oswald">${{ number_format($product->sale_price) }}</p>
                                        @else
                                            <p class="text-white text-2xl font-black oswald">${{ number_format($product->price) }}</p>
                                        @endif
                                    </div>
                                    <a href="{{ route('product.show', $product->slug) }}" class="bg-white text-black px-5 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-orange-600 hover:text-white transition">عرض المنتج</a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-20">
                                <p class="text-gray-500 uppercase tracking-widest">لم يتم العثور على دراجات تطابق بحثك.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-12">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>