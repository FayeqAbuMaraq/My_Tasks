<x-app-layout>
    <div class="min-h-screen bg-[#0a0a0a] pt-32 pb-20 text-white" dir="rtl">
        <div class="container mx-auto px-6 max-w-3xl">
            
            <div class="text-center mb-12">
                <div class="relative inline-block">
                    <div class="absolute -inset-1 bg-orange-600 rounded-full blur opacity-25"></div>
                    <div class="relative bg-white/5 p-6 rounded-full border border-white/10">
                        <svg class="w-16 h-16 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
                <h1 class="text-3xl font-black oswald mt-6 uppercase">إعدادات <span class="text-orange-600">الحساب</span></h1>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" class="space-y-8">
                @csrf @method('PATCH')

                <div class="bg-white/5 p-8 rounded-[2.5rem] border border-white/10 relative overflow-hidden">
                    <h3 class="text-orange-600 font-black text-xs tracking-widest uppercase mb-8">البيانات الشخصية</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-500 text-[10px] uppercase font-black mb-2 tracking-widest">الاسم الكامل</label>
                            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" 
                                   class="w-full bg-black border border-white/10 rounded-xl py-4 px-6 focus:border-orange-600 transition outline-none font-bold">
                        </div>
                        <div>
                            <label class="block text-gray-500 text-[10px] uppercase font-black mb-2 tracking-widest">البريد الإلكتروني</label>
                            <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" 
                                   class="w-full bg-black border border-white/10 rounded-xl py-4 px-6 focus:border-orange-600 transition outline-none font-bold text-left" dir="ltr">
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 p-8 rounded-[2.5rem] border border-white/10">
                    <h3 class="text-orange-600 font-black text-xs tracking-widest uppercase mb-8">تغيير كلمة المرور (اختياري)</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-gray-500 text-[10px] uppercase font-black mb-2 tracking-widest">كلمة المرور الجديدة</label>
                            <input type="password" name="password" 
                                   class="w-full bg-black border border-white/10 rounded-xl py-4 px-6 focus:border-orange-600 transition outline-none placeholder-gray-800" placeholder="••••••••">
                        </div>
                        <div>
                            <label class="block text-gray-500 text-[10px] uppercase font-black mb-2 tracking-widest">تأكيد كلمة المرور</label>
                            <input type="password" name="password_confirmation" 
                                   class="w-full bg-black border border-white/10 rounded-xl py-4 px-6 focus:border-orange-600 transition outline-none placeholder-gray-800" placeholder="••••••••">
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full bg-orange-600 text-white py-5 rounded-2xl font-black uppercase tracking-[0.2em] hover:bg-white hover:text-orange-600 transition-all duration-500 shadow-xl shadow-orange-600/20">
                    حفظ التغييرات الجديدة
                </button>
            </form>
        </div>
    </div>
</x-app-layout>