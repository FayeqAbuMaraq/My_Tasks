<x-app-layout>
    <div class="min-h-screen bg-[#0a0a0a] pt-28 pb-12">
        <div class="container mx-auto px-6 md:px-10">
            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6">
                <div>
                    <h1 class="text-white text-4xl font-black oswald uppercase tracking-tighter">Command <span class="text-orange-600">Center</span></h1>
                    <p class="text-gray-500 text-sm font-bold mt-2 uppercase tracking-widest">إدارة نظام X-BIKE بالكامل</p>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('home') }}" class="bg-white/5 border border-white/10 text-white px-6 py-3 rounded-xl text-xs font-black uppercase hover:bg-white/10 transition">معاينة المتجر</a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <div class="bg-white/5 border border-white/10 p-8 rounded-[2rem] hover:border-orange-600/50 transition-all group">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-orange-600/10 rounded-2xl text-orange-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                    </div>
                    <h3 class="text-gray-500 text-xs font-black uppercase tracking-widest">المستخدمين</h3>
                    <p class="text-white text-4xl font-black oswald mt-2">{{ $usersCount }}</p>
                </div>

                <div class="bg-white/5 border border-white/10 p-8 rounded-[2rem] hover:border-orange-600/50 transition-all group">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-blue-600/10 rounded-2xl text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                    </div>
                    <h3 class="text-gray-500 text-xs font-black uppercase tracking-widest">المنتجات</h3>
                    <p class="text-white text-4xl font-black oswald mt-2">{{ $productsCount }}</p>
                </div>

                <div class="bg-white/5 border border-white/10 p-8 rounded-[2rem] hover:border-orange-600/50 transition-all group">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-green-600/10 rounded-2xl text-green-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </div>
                    </div>
                    <h3 class="text-gray-500 text-xs font-black uppercase tracking-widest">الطلبات</h3>
                    <p class="text-white text-4xl font-black oswald mt-2">{{ $ordersCount }}</p>
                </div>

                <div class="bg-white/5 border border-white/10 p-8 rounded-[2rem] hover:border-orange-600/50 transition-all group">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-purple-600/10 rounded-2xl text-purple-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                        </div>
                    </div>
                    <h3 class="text-gray-500 text-xs font-black uppercase tracking-widest">الأقسام</h3>
                    <p class="text-white text-4xl font-black oswald mt-2">{{ $categoriesCount }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                
                <div class="bg-white/5 border border-white/10 rounded-[2.5rem] overflow-hidden">
                    <div class="p-8 border-b border-white/10 flex justify-between items-center">
                        <h3 class="text-white font-black uppercase text-sm tracking-widest">آخر الطلبات</h3>
                        <a href="{{ route('admin.orders.index') }}" class="text-orange-600 text-[10px] font-black uppercase hover:text-white transition">مشاهدة الكل</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-right">
                            <thead class="bg-white/[0.02] text-gray-500 text-[10px] uppercase font-black">
                                <tr>
                                    <th class="px-8 py-4">العميل</th>
                                    <th class="px-8 py-4">المبلغ</th>
                                    <th class="px-8 py-4">الحالة</th>
                                </tr>
                            </thead>
                            <tbody class="text-white text-sm divide-y divide-white/5">
                                @foreach($orders as $order)
                                <tr class="hover:bg-white/[0.02] transition">
                                    <td class="px-8 py-4 font-bold">{{ $order->user->name ?? 'زائر' }}</td>
                                    <td class="px-8 py-4 font-black text-orange-500">${{ number_format($order->total_amount) }}</td>
                                    <td class="px-8 py-4">
                                        <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase bg-orange-600/20 text-orange-500 border border-orange-600/30">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white/5 border border-white/10 rounded-[2.5rem] overflow-hidden">
                    <div class="p-8 border-b border-white/10 flex justify-between items-center">
                        <h3 class="text-white font-black uppercase text-sm tracking-widest">المنتجات المضافة حديثاً</h3>
                        <a href="{{ route('admin.products.index') }}" class="text-orange-600 text-[10px] font-black uppercase hover:text-white transition">إدارة المخزن</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-right">
                            <thead class="bg-white/[0.02] text-gray-500 text-[10px] uppercase font-black">
                                <tr>
                                    <th class="px-8 py-4">المنتج</th>
                                    <th class="px-8 py-4">السعر</th>
                                    <th class="px-8 py-4">القسم</th>
                                </tr>
                            </thead>
                            <tbody class="text-white text-sm divide-y divide-white/5">
                                @foreach($products as $product)
                                <tr class="hover:bg-white/[0.02] transition">
                                    <td class="px-8 py-4 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center p-1">
                                            <img src="{{ asset('storage/'.$product->image) }}" class="max-w-full max-h-full object-contain" alt="">
                                        </div>
                                        <span class="font-bold">{{ $product->name }}</span>
                                    </td>
                                    <td class="px-8 py-4 font-black text-blue-500">${{ number_format($product->price) }}</td>
                                    <td class="px-8 py-4 text-gray-400 text-xs">{{ $product->category->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            
            <div class="mt-8 bg-white/5 border border-white/10 rounded-[2.5rem] overflow-hidden">
                <div class="p-8 border-b border-white/10 flex justify-between items-center">
                    <div>
                        <h3 class="text-white font-black uppercase text-sm tracking-widest">إدارة الأقسام</h3>
                        <p class="text-gray-500 text-[9px] font-bold uppercase mt-1">عرض وتصنيف فئات الدراجات</p>
                    </div>
                                            <a href="{{ route('admin.categories.index') }}" class="text-orange-600 text-[10px] font-black uppercase hover:text-white transition">إدارة الأقسام</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-right">
                        <thead class="bg-white/[0.02] text-gray-500 text-[10px] uppercase font-black">
                            <tr>
                                <th class="px-8 py-4">اسم القسم</th>
                                <th class="px-8 py-4">الرابط المعرف (Slug)</th>
                                <th class="px-8 py-4 text-center">عدد المنتجات</th>
                                <th class="px-8 py-4 text-left">الحالة</th>
                            </tr>
                        </thead>
                        <tbody class="text-white text-sm divide-y divide-white/5">
                            @foreach($categories as $category)
                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="px-8 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-orange-600/10 flex items-center justify-center border border-orange-600/20">
                                            @if($category->image)
                                                <img src="{{ asset('storage/'.$category->image) }}" class="w-full h-full rounded-full object-cover" alt="">
                                            @else
                                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                                            @endif
                                        </div>
                                        <span class="font-bold tracking-tight uppercase">{{ $category->name }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-4 font-mono text-xs text-gray-500">/{{ $category->slug }}</td>
                                <td class="px-8 py-4 text-center">
                                    <span class="bg-white/5 px-3 py-1 rounded-lg text-xs font-black text-orange-500">
                                        {{ $category->products_count ?? $category->products->count() }}
                                    </span>
                                </td>
                                <td class="px-8 py-4 text-left">
                                    <span class="inline-flex items-center gap-1.5 text-[9px] font-black uppercase text-green-500">
                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                                        Active
                                    </span>
                                        </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>