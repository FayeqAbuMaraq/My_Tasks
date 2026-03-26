<x-app-layout>
    <div class="min-h-screen bg-[#0a0a0a] pt-32 pb-20 text-white text-right" dir="rtl">
        <div class="container mx-auto px-6 max-w-3xl">
            
            <div class="text-center mb-16">
                <h1 class="text-5xl font-black oswald uppercase tracking-tighter mb-4">الأسئلة <span class="text-orange-600">الشائعة</span></h1>
                <p class="text-gray-500 font-bold uppercase tracking-widest text-xs">كل ما تحتاج معرفته عن أسطول X-BIKE</p>
            </div>

            <div class="space-y-4">
                
                <div x-data="{ open: false }" class="bg-white/5 border border-white/10 rounded-3xl overflow-hidden transition-all duration-300">
                    <button @click="open = !open" class="w-full flex justify-between items-center p-6 text-right focus:outline-none">
                        <span class="font-bold text-lg">ما الذي يميز دراجات ألياف الكربون T800؟</span>
                        <svg class="w-5 h-5 text-orange-600 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" x-collapse class="p-6 pt-0 text-gray-400 text-sm leading-relaxed border-t border-white/5">
                        ألياف الكربون T800 توفر توازناً مثالياً بين خفة الوزن الفائقة والمتانة العالية، مما يمنح المتسابق سرعة أكبر وجهداً أقل في المرتفعات.
                    </div>
                </div>

                <div x-data="{ open: false }" class="bg-white/5 border border-white/10 rounded-3xl overflow-hidden transition-all duration-300">
                    <button @click="open = !open" class="w-full flex justify-between items-center p-6 text-right focus:outline-none">
                        <span class="font-bold text-lg">هل تتوفر قطع غيار أصلية للدراجات؟</span>
                        <svg class="w-5 h-5 text-orange-600 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" x-collapse class="p-6 pt-0 text-gray-400 text-sm leading-relaxed border-t border-white/5">
                        نعم، نحن نوفر كافة قطع الغيار الأصلية من كبرى الشركات العالمية لضمان بقاء دراجتك بأفضل أداء ممكن دائماً.
                    </div>
                </div>

                <div x-data="{ open: false }" class="bg-white/5 border border-white/10 rounded-3xl overflow-hidden transition-all duration-300">
                    <button @click="open = !open" class="w-full flex justify-between items-center p-6 text-right focus:outline-none">
                        <span class="font-bold text-lg">كيف يتم تسليم الدراجة بعد الشراء؟</span>
                        <svg class="w-5 h-5 text-orange-600 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" x-collapse class="p-6 pt-0 text-gray-400 text-sm leading-relaxed border-t border-white/5">
                        يتم شحن الدراجة في صناديق محمية ومؤمنة بالكامل، وتصلك شبه جاهزة مع دليل بسيط لإتمام التركيب في دقائق.
                    </div>
                </div>

            </div>

            <div class="mt-16 text-center bg-orange-600/10 border border-orange-600/20 p-8 rounded-[2.5rem]">
                <p class="text-sm text-gray-300 mb-4">لم تجد إجابة لسؤالك؟</p>
                <a href="#" class="inline-block bg-orange-600 text-white px-8 py-3 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-white hover:text-orange-600 transition-all">تواصل معنا الآن</a>
            </div>

        </div>
    </div>
</x-app-layout>