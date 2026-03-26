<x-app-layout>
    <div class="min-h-screen bg-[#0a0a0a] pt-32 pb-20 text-white" dir="rtl">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-black oswald mb-12 uppercase">سجل <span class="text-orange-600">الطلبات</span></h1>

            <div class="bg-white/5 rounded-[2.5rem] border border-white/10 overflow-hidden shadow-2xl">
                <table class="w-full text-right">
                    <thead>
                        <tr class="bg-white/5 text-gray-400 uppercase text-xs font-black tracking-widest">
                            <th class="px-8 py-6">رقم الطلب</th>
                            <th class="px-8 py-6">العميل</th>
                            <th class="px-8 py-6">الإجمالي</th>
                            <th class="px-8 py-6">الحالة</th>
                            <th class="px-8 py-6">التاريخ</th>
                            <th class="px-8 py-6 text-left">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($orders as $order)
                        <tr class="hover:bg-white/[0.02] transition-all group">
                            <td class="px-8 py-6 font-bold oswald text-orange-600 text-lg">#{{ $order->id }}</td>
                            <td class="px-8 py-6">
                                <div class="text-sm font-black">{{ $order->customer_name }}</div>
                                <div class="text-xs text-gray-500 font-bold" dir="ltr">{{ $order->customer_phone }}</div>
                            </td>
                            <td class="px-8 py-6 font-black text-xl oswald">${{ number_format($order->total_amount) }}</td>
                            <td class="px-8 py-6">
                                <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest
                                    {{ $order->status == 'completed' ? 'bg-green-500/10 text-green-500 border border-green-500/20' : 
                                       ($order->status == 'cancelled' ? 'bg-red-500/10 text-red-500 border border-red-500/20' : 'bg-orange-500/10 text-orange-500 border border-orange-500/20') }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-xs text-gray-500 font-bold">{{ $order->created_at->format('Y/m/d') }}</td>
                            <td class="px-8 py-6 text-left">
                                <a href="{{ route('admin.orders.show', $order->id) }}" 
                                   class="inline-flex items-center justify-center w-10 h-10 bg-white/5 border border-white/10 rounded-xl hover:bg-orange-600 hover:text-white transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>