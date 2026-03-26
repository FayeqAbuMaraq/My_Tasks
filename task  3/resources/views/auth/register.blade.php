<x-guest-layout>
    <div class="min-h-screen bg-black flex items-center justify-center p-6 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-full h-full">
            <img src="https://images.unsplash.com/photo-1558981403-c5f91cbba527?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover opacity-10 grayscale rotate-12 scale-150" alt="Bike Frame">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black"></div>
        </div>

        <div class="relative z-10 w-full max-w-md">
            <div class="text-center mb-8">
                <a href="/" class="text-4xl font-black oswald text-white tracking-tighter">
                    X-<span class="text-orange-600">BIKE</span>
                </a>
                <h2 class="text-gray-400 mt-4 font-bold uppercase tracking-widest text-[10px]">انضم إلى نخبة الدراجين المحترفين</h2>
            </div>

            <div class="bg-white/5 backdrop-blur-2xl border border-white/10 p-8 md:p-10 rounded-[2.5rem] shadow-2xl">
                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 mb-2 mr-2">الاسم الكامل</label>
                        <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                            class="w-full bg-black/40 border border-white/10 rounded-2xl py-3.5 px-6 text-white focus:outline-none focus:border-orange-600 transition-all placeholder-gray-600" placeholder="أدخل اسمك">
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs text-red-500" />
                    </div>

                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 mb-2 mr-2">البريد الإلكتروني</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                            class="w-full bg-black/40 border border-white/10 rounded-2xl py-3.5 px-6 text-white focus:outline-none focus:border-orange-600 transition-all" placeholder="name@example.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-500" />
                    </div>

                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 mb-2 mr-2">كلمة المرور</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="w-full bg-black/40 border border-white/10 rounded-2xl py-3.5 px-6 text-white focus:outline-none focus:border-orange-600 transition-all">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-500" />
                    </div>

                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-orange-600 mb-2 mr-2">تأكيد كلمة المرور</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                            class="w-full bg-black/40 border border-white/10 rounded-2xl py-3.5 px-6 text-white focus:outline-none focus:border-orange-600 transition-all">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs text-red-500" />
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-orange-600 text-white font-black py-4 rounded-2xl uppercase tracking-widest text-[10px] hover:bg-white hover:text-orange-600 transition-all duration-500 shadow-lg shadow-orange-600/20 active:scale-95">
                            إنشاء حساب جديد
                        </button>
                    </div>

                    <div class="flex items-center justify-center gap-2 mt-6">
                        <span class="text-gray-500 text-[10px] font-bold uppercase tracking-tighter">لديك حساب بالفعل؟</span>
                        <a href="{{ route('login') }}" class="text-white text-[10px] font-black uppercase tracking-widest hover:text-orange-600 transition border-b border-white/20 hover:border-orange-600 pb-0.5">
                            سجل دخولك
                        </a>
                    </div>
                </form>
            </div>
            
            <p class="text-center text-gray-600 text-[9px] mt-8 uppercase tracking-[0.2em] font-bold">
                &copy; {{ date('Y') }} X-Bike Systems. Speed & Security Guaranteed.
            </p>
        </div>
    </div>
</x-guest-layout>