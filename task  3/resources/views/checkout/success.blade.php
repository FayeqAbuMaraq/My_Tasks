<x-app-layout>
    <div class="container mx-auto px-6 py-20 mt-10 min-h-[60vh] flex flex-col items-center justify-center text-center animate-fadeIn">
        
        <div class="w-24 h-24 bg-green-100 text-green-500 rounded-full flex items-center justify-center mb-6 shadow-lg shadow-green-500/20">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h1 class="text-4xl font-black mb-4 oswald uppercase text-gray-900">تم استلام طلبك بنجاح!</h1>
        
        <p class="text-gray-600 text-lg max-w-xl mx-auto mb-8 leading-relaxed">
            شكراً لثقتك وتسوقك من <strong>X-BIKE</strong>. فريقنا يقوم الآن بتجهيز دراجتك، وسنتواصل معك قريباً لتأكيد موعد التوصيل.
            <br><br>
            <span class="inline-block bg-orange-50 text-orange-700 border border-orange-200 px-4 py-2 rounded-lg font-bold text-sm">
                تذكير: سيتم الدفع نقداً لمندوب التوصيل عند الاستلام.
            </span>
        </p>

        <a href="{{ route('shop.index') }}" class="inline-block bg-black text-white font-bold text-lg px-10 py-4 rounded-xl hover:bg-orange-600 transition-colors duration-300 shadow-xl">
            العودة إلى المتجر
        </a>

    </div>
</x-app-layout>