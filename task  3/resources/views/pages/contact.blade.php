<x-app-layout>
    <div class="min-h-screen bg-[#0a0a0a] pt-32 pb-20 text-white text-right" dir="rtl">
        <div class="container mx-auto px-6">
            
            <div class="mb-16 border-r-4 border-orange-600 pr-6">
                <h1 class="text-5xl font-black oswald uppercase tracking-tighter">اتصل <span class="text-orange-600">بنا</span></h1>
                <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mt-2">نحن هنا للإجابة على استفساراتك حول أسطولنا</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                
                <div class="space-y-12">
                    <div class="flex items-start gap-6">
                        <div class="bg-white/5 p-4 rounded-2xl border border-white/10 text-orange-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-black oswald mb-2">الموقع</h3>
                            <p class="text-gray-400 text-sm">المنطقة الصناعية، مركز تجارب السباق، غزة، فلسطين</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-6">
                        <div class="bg-white/5 p-4 rounded-2xl border border-white/10 text-orange-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-black oswald mb-2">البريد الإلكتروني</h3>
                            <p class="text-gray-400 text-sm">support@x-bike.ps</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-6">
                        <div class="bg-white/5 p-4 rounded-2xl border border-white/10 text-orange-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-black oswald mb-2">الهاتف</h3>
                            <p class="text-gray-400 text-sm" dir="ltr">+970 599 000 000</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 border border-white/10 p-10 rounded-[3rem] backdrop-blur-xl">
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 mb-2 mr-2">الاسم بالكامل</label>
                            <input type="text" name="name" required class="w-full bg-black/50 border border-white/10 rounded-2xl py-4 px-6 focus:border-orange-600 transition outline-none text-white">
                        </div>

                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 mb-2 mr-2">البريد الإلكتروني</label>
                            <input type="email" name="email" required class="w-full bg-black/50 border border-white/10 rounded-2xl py-4 px-6 focus:border-orange-600 transition outline-none text-white text-left" dir="ltr">
                        </div>

                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 mb-2 mr-2">رسالتك</label>
                            <textarea name="message" rows="5" required class="w-full bg-black/50 border border-white/10 rounded-2xl py-4 px-6 focus:border-orange-600 transition outline-none text-white"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-orange-600 text-white py-5 rounded-2xl font-black uppercase tracking-[0.3em] text-xs hover:bg-white hover:text-orange-600 transition-all duration-500 shadow-2xl shadow-orange-600/20">
                            إرسال الرسالة
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>