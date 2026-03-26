<x-app-layout>
    <section id="home" class="relative h-screen bg-black flex items-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1532298229144-0ee0c57515c5?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover grayscale brightness-[0.3]" alt="Dark Bike Background">
            <div class="absolute inset-0 dark-overlay"></div>
        </div>
        
        <div class="container mx-auto px-6 md:px-10 relative z-10">
            <div class="max-w-4xl">
                <h5 class="text-orange-500 font-bold tracking-[0.4em] mb-4 uppercase text-xs md:text-sm animate-pulse">Performance Redefined</h5>
                <h1 class="text-white text-5xl md:text-8xl lg:text-9xl font-black leading-[0.85] mb-8 uppercase oswald">
                    RIDE THE <br> <span class="text-transparent" style="-webkit-text-stroke: 1px rgba(255,255,255,0.8);">FUTURE</span>
                </h1>
                <p class="text-gray-400 text-base md:text-xl max-w-xl mb-10 leading-relaxed border-r-4 border-orange-600 pr-6">
                    دراجات مصممة هندسياً لتتحدى الجاذبية. ألياف كربونية فائقة الخفة، تقنيات متطورة، وأداء لا يضاهى على كل طريق.
                </p>
                <div class="flex flex-wrap gap-6">
                    <a href="#store" class="btn-premium bg-orange-600 text-white px-10 py-5 font-black uppercase tracking-wider text-xs shadow-lg shadow-orange-600/20">استكشف المجموعة</a>
                    <a href="#" class="group flex items-center gap-4 text-white font-bold text-sm tracking-widest uppercase">
                        <span class="w-14 h-14 rounded-full border border-white/20 flex items-center justify-center group-hover:bg-white group-hover:text-black transition duration-500">
                            <svg class="w-4 h-4 fill-current ml-1" viewBox="0 0 24 24"><path d="M3 22v-20l18 10-18 10z"></path></svg>
                        </span>
                        فيديو الأداء
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center text-white/30">
            <span class="text-[10px] uppercase tracking-widest mb-2 font-bold">Scroll</span>
            <div class="w-[1px] h-12 bg-gradient-to-b from-orange-600 to-transparent"></div>
        </div>
    </section>

<section class="bg-white py-12 border-b border-gray-100">
    <div class="container mx-auto px-6 md:px-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center md:text-right">
            <div class="flex flex-col md:flex-row items-center gap-4 border-l border-gray-100 last:border-0">
                <span class="oswald text-4xl font-black text-gray-200">01</span>
                <div>
                    <h6 class="font-black text-sm uppercase">خفيفة الوزن</h6>
                    <p class="text-xs text-gray-500">ألياف الكربون T1000</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row items-center gap-4 border-l border-gray-100 last:border-0">
                <span class="oswald text-4xl font-black text-gray-200">02</span>
                <div>
                    <h6 class="font-black text-sm uppercase">نظام ذكي</h6>
                    <p class="text-xs text-gray-500">تحكم إلكتروني لاسلكي</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row items-center gap-4 border-l border-gray-100 last:border-0">
                <span class="oswald text-4xl font-black text-gray-200">03</span>
                <div>
                    <h6 class="font-black text-sm uppercase">ضمان ممتد</h6>
                    <p class="text-xs text-gray-500">10 سنوات على الهيكل</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row items-center gap-4">
                <span class="oswald text-4xl font-black text-gray-200">04</span>
                <div>
                    <h6 class="font-black text-sm uppercase">توصيل دولي</h6>
                    <p class="text-xs text-gray-500">لكافة أنحاء العالم</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- الاقسام --}}
<section class="py-24 bg-gray-50 relative overflow-hidden">
    <div class="bg-text top-10 right-10 oswald opacity-[0.03]">BIKES</div>
    
    <div class="container mx-auto px-6 md:px-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-12">
            @foreach($categories as $category)
                        <a href="{{ route('category.show', $category->slug) }}" class="group cursor-pointer reveal-on-scroll">                    <div class="relative aspect-square mb-6 overflow-hidden rounded-full bg-white shadow-xl hover:shadow-orange-600/10 transition duration-500 p-4 border border-transparent group-hover:border-orange-600">
                        @if($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" 
                                class="w-full h-full object-cover rounded-full group-hover:scale-110 transition duration-700" 
                                alt="{{ $category->name }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1532298229144-0ee0c57515c5?q=80&w=400&h=400&auto=format&fit=crop" 
                                class="w-full h-full object-cover rounded-full group-hover:scale-110 transition duration-700" 
                                alt="Default Category">
                        @endif
                    </div>
                    <h4 class="text-center font-black text-lg group-hover:text-orange-600 transition uppercase tracking-tighter">
                        {{ $category->name }}
                    </h4>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- المتجر --}}
<section id="store" class="py-24 bg-white relative">
    <div class="bg-text top-10 right-10 oswald opacity-[0.03]">SHOP</div>
    <div class="container mx-auto px-6 md:px-10">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div>
                <h5 class="text-orange-600 font-bold mb-2 uppercase tracking-[0.2em] text-xs">New Collection {{ date('Y') }}</h5>
                <h2 class="text-4xl md:text-6xl font-black tracking-tight">وصل حديثاً للمحترفين</h2>
            </div>
            <div class="flex gap-4">
                <button class="px-6 py-2 border-b-2 border-black font-black text-xs uppercase">الكل</button>
                @foreach($categories->take(2) as $cat)
                    <button class="px-6 py-2 text-gray-400 font-black text-xs uppercase hover:text-black transition">{{ $cat->name }}</button>
                @endforeach
            </div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12">
            @foreach($latestProducts as $product)
                <div class="group flex flex-col h-full reveal-on-scroll">
                    <div class="relative overflow-hidden rounded-[2.5rem] bg-gray-50 mb-6 p-12 transition-all duration-500 group-hover:shadow-xl group-hover:-translate-y-1">
                        @if($product->is_featured)
                            <div class="absolute top-8 right-8 z-10">
                                <span class="bg-black text-white px-4 py-1 rounded-full text-[10px] font-black uppercase">مميز</span>
                            </div>
                        @endif
                        
                        <a href="{{ route('product.show', $product->slug) }}">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/600x400?text=No+Image' }}" 
                                class="w-full h-56 object-contain group-hover:scale-110 transition duration-700" 
                                alt="{{ $product->name }}">
                        </a>
                    </div>
                    
                    <div class="px-2 flex flex-col flex-grow">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-2xl font-black group-hover:text-orange-600 transition">
                            <a href="{{ route('product.show', $product->slug) }}">
                            <div class="flex flex-col items-end">
                                <span class="text-xl font-black text-orange-600">${{ number_format($product->price) }}</span>
                                @if($product->sale_price)
                                    <span class="text-sm text-gray-400 line-through">${{ number_format($product->sale_price) }}</span>
                                @endif
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm mb-6 flex-grow line-clamp-2">
                            {{ $product->short_description }}
                        </p>
                        
                <button onclick="addToCart('{{ $product->name }}', {{ $product->price }}, event, {{ $product->id }})" 
                        class="w-full bg-black text-white py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-orange-600 hover:text-white transition duration-300">       
                    أضف للسلة
                </button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center mt-12">
            <a href="{{ route('shop.index') }}" class="group relative inline-flex items-center justify-center px-10 py-4 font-black text-xs uppercase tracking-widest text-black border-2 border-black rounded-full overflow-hidden transition-all duration-500 hover:text-white">
                <span class="absolute inset-0 w-0 bg-black transition-all duration-500 ease-out group-hover:w-full"></span>
                <span class="relative flex items-center gap-2">
                    عرض جميع المنتجات
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </span>
            </a>
        </div>
    </div>
</section>
{{-- العروض --}}
<section id="offers" class="py-24 bg-black relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full opacity-10">
        <div class="absolute top-[-10%] left-[-5%] w-[40%] h-[40%] bg-orange-600 rounded-full blur-[120px]"></div>
    </div>

    <div class="container mx-auto px-6 md:px-10 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-center mb-16 gap-8">
            <div class="text-center md:text-right">
                <div class="inline-flex items-center gap-2 bg-orange-600/10 border border-orange-600/20 px-4 py-2 rounded-full mb-4">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-500 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-600"></span>
                    </span>
                    <span class="text-orange-500 text-[10px] font-black uppercase tracking-widest">عرض محدود لفترة وجيزة</span>
                </div>
                <h2 class="text-white text-4xl md:text-6xl font-black oswald uppercase tracking-tighter">Flash <span class="text-orange-600">Sale</span></h2>
            </div>

            <div class="flex gap-4 oswald">
                <div class="flex flex-col items-center">
                    <div class="bg-white/5 border border-white/10 w-16 h-16 rounded-2xl flex items-center justify-center text-white text-2xl font-black mb-2">02</div>
                    <span class="text-gray-500 text-[10px] uppercase font-bold tracking-widest">Days</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-white/5 border border-white/10 w-16 h-16 rounded-2xl flex items-center justify-center text-white text-2xl font-black mb-2">14</div>
                    <span class="text-gray-500 text-[10px] uppercase font-bold tracking-widest">Hrs</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-white/5 border border-white/10 w-16 h-16 rounded-2xl flex items-center justify-center text-white text-2xl font-black mb-2">35</div>
                    <span class="text-gray-500 text-[10px] uppercase font-bold tracking-widest">Min</span>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($flashSaleProducts as $product)
                <div class="group relative bg-white/[0.03] border border-white/10 rounded-[2.5rem] p-6 hover:bg-white/[0.07] transition-all duration-500">
                    @php
                        $discount = round((($product->price - $product->sale_price) / $product->price) * 100);
                    @endphp
                    <div class="absolute top-6 left-6 z-20">
                        <span class="bg-orange-600 text-white px-3 py-1 rounded-lg text-[10px] font-black">
                            -{{ $discount }}%
                        </span>
                    </div>

                    <div class="relative overflow-hidden rounded-3xl bg-black/20 mb-6 p-8">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/400' }}" 
                             class="w-full h-40 object-contain group-hover:scale-110 transition duration-700" 
                             alt="{{ $product->name }}">
                    </div>

                    <div class="text-center">
                        <h3 class="text-white text-lg font-black mb-2 group-hover:text-orange-600 transition truncate">{{ $product->name }}</h3>
                        <div class="flex justify-center items-center gap-3 mb-6">
                            <span class="text-orange-600 text-xl font-black">${{ number_format($product->sale_price) }}</span>
                            <span class="text-gray-500 text-sm line-through font-bold">${{ number_format($product->price) }}</span>
                        </div>
                    <button onclick="addToCart('{{ $product->name }}', {{ $product->price }}, event, {{ $product->id }})" 
                            class="w-full bg-black text-white py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-orange-600 hover:text-white transition duration-300">
                        أضف للسلة
                    </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="relative h-[600px] flex items-center justify-center overflow-hidden">
    <img src="https://images.unsplash.com/photo-1559348349-86f1f65817fe?auto=format&fit=crop&w=1920&q=80" class="absolute inset-0 w-full h-full object-cover grayscale brightness-50" alt="Banner">
    <div class="relative z-10 text-center text-white px-10">
        <h2 class="text-5xl md:text-8xl font-black mb-8 oswald italic">FASTER THAN WIND</h2>
        <button class="w-24 h-24 rounded-full border-2 border-white flex items-center justify-center mx-auto hover:bg-white hover:text-black transition">
            <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24"><path d="M3 22v-20l18 10-18 10z"></path></svg>
        </button>
    </div>
</section>

<section id="features" class="py-24 bg-gray-100 overflow-hidden">
    <div class="container mx-auto px-6 md:px-10">
        <div class="grid lg:grid-cols-2 gap-20 items-center">
            <div class="relative">
                <div class="absolute -top-10 -right-10 w-64 h-64 bg-orange-600/10 rounded-full blur-3xl"></div>
                <img src="https://images.unsplash.com/photo-1485965120184-e220f721d03e?q=80&w=1000&auto=format&fit=crop" class="relative z-10 rounded-[3rem] shadow-2xl grayscale hover:grayscale-0 transition duration-1000" alt="Tech Detail">
                <div class="absolute bottom-10 -left-10 z-20 bg-black text-white p-8 rounded-3xl max-w-xs shadow-2xl">
                    <h4 class="oswald font-black text-2xl mb-2 text-orange-600 tracking-tighter uppercase">Ultra Carbon</h4>
                    <p class="text-xs text-gray-400 leading-relaxed">استخدام تكنولوجيا الفضاء في نسج الألياف الكربونية لضمان صلابة قصوى بوزن الريشة.</p>
                </div>
            </div>
            <div>
                <h5 class="text-orange-600 font-bold mb-4 uppercase tracking-[0.3em] text-xs">Innovation First</h5>
                <h2 class="text-5xl font-black mb-8 leading-tight">تكنولوجيا تسبق <br> عصرها</h2>
                <div class="space-y-8">
                    <div class="flex gap-6 items-start">
                        <div class="bg-white w-14 h-14 rounded-2xl flex-shrink-0 flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-black text-xl mb-1">نظام التعليق الذكي</h4>
                            <p class="text-gray-500 text-sm">حساسات ذكية تقرأ طبيعة الطريق 100 مرة في الثانية لتعديل مستوى الراحة تلقائياً.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 items-start">
                        <div class="bg-white w-14 h-14 rounded-2xl flex-shrink-0 flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-black text-xl mb-1">أمان بلا حدود</h4>
                            <p class="text-gray-500 text-sm">مكابح هيدروليكية من السيراميك تضمن توقفاً آمناً في كافة الظروف المناخية.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</x-app-layout>