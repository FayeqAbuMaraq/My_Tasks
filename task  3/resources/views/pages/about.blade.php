<x-app-layout>
    <div class="min-h-screen bg-[#0a0a0a] pt-32 pb-20 text-white text-right" dir="rtl">
        <div class="container mx-auto px-6 mb-24">
            <div class="max-w-4xl">
                <h1 class="text-7xl font-black oswald uppercase tracking-tighter leading-none mb-6">
                    نصنع <span class="text-orange-600">السرعة</span>،<br> ونعيش السباق.
                </h1>
                <p class="text-gray-400 text-lg leading-relaxed max-w-2xl border-r-4 border-orange-600 pr-6">
                    رحلة **X-BIKE** انطلقت من شغفنا العميق بالدراجات الاحترافية. نحن لا نقدم مجرد معدات، بل نوفر آلات صُممت لكسر الأرقام القياسية وتجاوز التوقعات في كل طريق.
                </p>
            </div>
        </div>

        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12 mb-32">
            <div class="bg-white/5 p-10 rounded-[3rem] border border-white/10 text-center">
                <h3 class="text-5xl font-black oswald text-orange-600 mb-2">10+</h3>
                <p class="text-xs font-black uppercase tracking-widest text-gray-500">سنوات من الخبرة</p>
            </div>
            <div class="bg-white/5 p-10 rounded-[3rem] border border-white/10 text-center">
                <h3 class="text-5xl font-black oswald text-orange-600 mb-2">500+</h3>
                <p class="text-xs font-black uppercase tracking-widest text-gray-500">دراجة تم تسليمها</p>
            </div>
            <div class="bg-white/5 p-10 rounded-[3rem] border border-white/10 text-center">
                <h3 class="text-5xl font-black oswald text-orange-600 mb-2">24/7</h3>
                <p class="text-xs font-black uppercase tracking-widest text-gray-500">دعم فني للمتسابقين</p>
            </div>
        </div>

        <div class="container mx-auto px-6 flex flex-col md:flex-row-reverse gap-20 items-center text-right">
            <div class="w-full md:w-1/2">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-orange-600 rounded-[3rem] blur opacity-10 group-hover:opacity-30 transition duration-1000"></div>
                <img src="https://images.unsplash.com/photo-1485965120184-e220f721d03e?q=80&w=2070&auto=format&fit=crop" 
                    class="relative rounded-[3rem] grayscale hover:grayscale-0 transition duration-700 shadow-2xl" 
                    alt="تجربة السباق">
                </div>
            </div>
            <div class="w-full md:w-1/2 space-y-6">
                <h2 class="text-4xl font-black oswald uppercase tracking-tighter">لماذا نختار <span class="text-orange-600">ألياف الكربون؟</span></h2>
                <p class="text-gray-400 leading-relaxed text-sm">
                    نحن نركز على تقنيات مثل **Carbon Fiber T800** لضمان خفة الوزن الفائقة والمتانة العالية التي يتطلبها المحترفون. هدفنا هو تزويد عملائنا بأفضل ما وصلت إليه تكنولوجيا الدراجات عالمياً.
                </p>
                <ul class="space-y-4">
                    <li class="flex items-center gap-3 text-xs font-black uppercase tracking-widest">
                        <span class="w-2 h-2 bg-orange-600 rounded-full"></span> جودة تصنيع بمعايير احترافية
                    </li>
                    <li class="flex items-center gap-3 text-xs font-black uppercase tracking-widest">
                        <span class="w-2 h-2 bg-orange-600 rounded-full"></span> دعم فني مخصص لكل متسابق
                    </li>
                    <li class="flex items-center gap-3 text-xs font-black uppercase tracking-widest">
                        <span class="w-2 h-2 bg-orange-600 rounded-full"></span> فحص شامل لكل دراجة قبل التسليم
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>