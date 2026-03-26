<x-app-layout>
    <div class="container mx-auto px-6 py-20 mt-10">
        <h1 class="text-3xl font-black mb-8 oswald uppercase">إتمام الطلب</h1>

        @if ($errors->any())
            <div class="mb-8 bg-red-50 border-r-4 border-red-500 p-4 rounded-lg">
                <ul class="text-red-700 font-bold list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-8 bg-red-50 border-r-4 border-red-500 p-4 rounded-lg text-red-700 font-bold">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            
            <div class="md:col-span-2 bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-xl font-bold mb-6 border-b pb-4">بيانات التوصيل</h3>
                
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">الاسم بالكامل</label>
                            <input type="text" name="name" value="{{ old('name') }}" required class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">رقم الهاتف</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" required class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition">
                        </div>
                    </div>
                    
                    <div class="mb-8">
                        <label class="block text-sm font-bold text-gray-700 mb-2">عنوان التوصيل التفصيلي</label>
                        <textarea name="address" rows="3" required class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition">{{ old('address') }}</textarea>
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-bold text-gray-700 mb-3">طريقة الدفع</label>
                        <div class="flex items-center p-4 border-2 border-orange-500 rounded-xl bg-orange-50 transition cursor-default">
                            <input type="radio" checked readonly class="w-5 h-5 text-orange-600 bg-orange-100 border-orange-300 focus:ring-orange-500">
                            <div class="mr-4">
                                <span class="block text-gray-900 font-black text-lg">الدفع عند الاستلام</span>
                                <span class="block text-gray-600 text-sm mt-1">الدفع نقداً لمندوب التوصيل عند استلام دراجتك.</span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-orange-600 text-white font-bold text-lg py-4 rounded-xl hover:bg-orange-700 transition shadow-lg shadow-orange-500/30">
                        تأكيد الطلب
                    </button>
                </form>
            </div>

            <div class="bg-gray-50 p-8 rounded-2xl shadow-sm border border-gray-200 h-fit">
                <h3 class="text-xl font-bold mb-6 border-b pb-4">ملخص الطلب</h3>
                
                <div class="space-y-4 mb-6 max-h-60 overflow-y-auto pr-2">
                    @foreach($cart as $item)
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="font-bold text-sm text-gray-800">{{ $item['name'] }}</h4>
                            <p class="text-gray-500 text-xs">الكمية: {{ $item['quantity'] }}</p>
                        </div>
                        <p class="text-orange-600 font-black">${{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                    </div>
                    @endforeach
                </div>

                <div class="border-t border-gray-200 pt-4 mt-6">
                    <div class="flex justify-between items-center text-xl">
                        <span class="font-bold text-gray-800">الإجمالي:</span>
                        <span class="font-black text-orange-600">${{ number_format($total, 2) }}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>