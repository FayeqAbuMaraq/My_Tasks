<x-app-layout>
    <div class="min-h-screen bg-[#0a0a0a] pt-32 pb-20 text-white" dir="rtl">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6">
                <div>
                    <h1 class="text-4xl font-black oswald uppercase mb-2">طلب <span class="text-orange-600">#{{ $order->id }}</span></h1>
                    <p class="text-gray-500 font-bold">بتاريخ: {{ $order->created_at->format('d M Y - h:i A') }}</p>
                </div>
                
<form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="flex flex-wrap md:flex-nowrap gap-4 items-center bg-white/5 p-2 rounded-2xl border border-white/10">
    @csrf 
    @method('PATCH')
    
    <div class="relative flex-grow min-w-[160px]">
        <select name="status" 
            class="appearance-none w-full bg-black border border-white/10 rounded-xl px-6 py-3 outline-none focus:border-orange-600 font-black text-xs uppercase tracking-widest transition-all cursor-pointer
            {{ $order->status == 'completed' ? 'text-green-500' : '' }}
            {{ $order->status == 'pending' ? 'text-orange-500' : '' }}
            {{ $order->status == 'processing' ? 'text-blue-500' : '' }}
            {{ $order->status == 'cancelled' ? 'text-red-500' : '' }}">
            
            <option value="pending" class="bg-[#0a0a0a] text-orange-500" {{ $order->status == 'pending' ? 'selected' : '' }}>● قيد الانتظار</option>
            <option value="processing" class="bg-[#0a0a0a] text-blue-500" {{ $order->status == 'processing' ? 'selected' : '' }}>● جاري المعالجة</option>
            <option value="completed" class="bg-[#0a0a0a] text-green-500" {{ $order->status == 'completed' ? 'selected' : '' }}>● مكتمل</option>
            <option value="cancelled" class="bg-[#0a0a0a] text-red-500" {{ $order->status == 'cancelled' ? 'selected' : '' }}>● ملغي</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center px-4 text-orange-600">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
        </div>
    </div>

    <button type="submit" class="group relative overflow-hidden bg-orange-600 text-white px-8 py-3 rounded-xl font-black transition-all uppercase text-[10px] tracking-[0.2em] hover:bg-white hover:text-orange-600 active:scale-95">
        <span class="relative z-10">تحديث الحالة</span>
    </button>
</form>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white/5 p-8 rounded-[2.5rem] border border-white/10">
                        <h3 class="text-orange-600 font-black uppercase text-xs tracking-[0.2em] mb-6">بيانات العميل</h3>
                        <div class="space-y-4">
                            <div><p class="text-gray-500 text-[10px] uppercase font-black">الاسم</p><p class="font-bold">{{ $order->customer_name }}</p></div>
                            <div><p class="text-gray-500 text-[10px] uppercase font-black">الهاتف</p><p class="font-bold" dir="ltr">{{ $order->customer_phone }}</p></div>
                            <div><p class="text-gray-500 text-[10px] uppercase font-black">العنوان</p><p class="font-bold text-sm leading-relaxed">{{ $order->address }}</p></div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="bg-white/5 rounded-[2.5rem] border border-white/10 p-8">
                        <h3 class="text-orange-600 font-black uppercase text-xs tracking-[0.2em] mb-8">العناصر المطلوبة</h3>
                        <div class="space-y-6">
                            @foreach($order->items as $item)
                            <div class="flex justify-between items-center border-b border-white/5 pb-6 last:border-0">
                                <div class="flex items-center gap-4">
                                    <div class="w-16 h-16 bg-black rounded-xl border border-white/10 flex items-center justify-center p-2">
                                        <img src="{{ asset('storage/' . $item->product->image) }}" class="max-w-full max-h-full object-contain">
                                    </div>
                                    <div>
                                        <h4 class="font-black text-sm">{{ $item->product->name }}</h4>
                                        <p class="text-xs text-gray-500 font-bold">الكمية: {{ $item->quantity }}</p>
                                    </div>
                                </div>
                                <p class="oswald font-black text-lg text-orange-600">${{ number_format($item->price * $item->quantity) }}</p>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-10 pt-6 border-t border-white/10 flex justify-between items-center">
                            <span class="font-black uppercase text-xs tracking-widest text-gray-400">الإجمالي الكلي</span>
                            <span class="oswald font-black text-3xl text-white border-b-2 border-orange-600 pb-1">${{ number_format($order->total_amount) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>