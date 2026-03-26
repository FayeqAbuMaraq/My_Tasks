<x-app-layout>
    <div class="min-h-screen bg-[#0a0a0a] pt-32 pb-20 text-white" dir="rtl">
        <div class="container mx-auto px-6 max-w-4xl">
            <h1 class="text-4xl font-black oswald mb-12 uppercase">سجل <span class="text-orange-600">طلباتي</span></h1>

            @if($orders->isEmpty())
                <div class="bg-white/5 border border-white/10 rounded-[2.5rem] p-20 text-center">
                    <svg class="w-20 h-20 text-gray-700 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <p class="text-gray-400 font-bold mb-8">لم تقم بأي رحلة تسوق بعد!</p>
                    <a href="{{ route('home') }}" class="inline-block bg-orange-600 px-10 py-4 rounded-xl font-black uppercase tracking-widest hover:bg-white hover:text-orange-600 transition-all">ابدأ التسوق الآن</a>
                </div>
            @else
                <div class="space-y-6">
                    @foreach($orders as $order)
                        <div class="bg-white/5 border border-white/10 rounded-[2rem] overflow-hidden hover:border-orange-600/30 transition-all duration-500 group">
                            <div class="bg-white/5 px-8 py-4 flex justify-between items-center border-b border-white/5">
                                <span class="font-black oswald text-orange-600 uppercase">Order #{{ $order->id }}</span>
                                <span class="px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest
                                    {{ $order->status == 'completed' ? 'bg-green-500/10 text-green-500' : 'bg-orange-500/10 text-orange-500' }}">
                                    {{ $order->status }}
                                </span>
                            </div>

                            <div class="p-8">
                                <div class="flex flex-wrap gap-4 mb-6">
                                    @foreach($order->items as $item)
                                        <div class="flex items-center gap-4 bg-black/40 p-3 rounded-2xl border border-white/5">
                                            <img src="{{ asset('storage/' . $item->product->image) }}" class="w-12 h-12 object-contain">
                                            <div>
                                                <p class="text-xs font-black">{{ $item->product->name }}</p>
                                                <p class="text-[10px] text-gray-500 font-bold">Qty: {{ $item->quantity }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="flex justify-between items-end pt-6 border-t border-white/5">
                                    <div>
                                        <p class="text-gray-500 text-[10px] uppercase font-black mb-1">تاريخ الطلب</p>
                                        <p class="text-xs font-bold">{{ $order->created_at->format('d M Y') }}</p>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-gray-500 text-[10px] uppercase font-black mb-1">الإجمالي</p>
                                        <p class="text-2xl font-black oswald text-white">${{ number_format($order->total_amount) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>