<x-guest-layout>
    <div class="min-h-screen bg-black flex items-center justify-center p-6 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full">
            <img src="https://images.unsplash.com/photo-1485965120184-e220f721d03e?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover opacity-20 grayscale" alt="Background">
            <div class="absolute inset-0 bg-gradient-to-b from-black via-transparent to-black"></div>
        </div>

        <div class="relative z-10 w-full max-w-md">
            <div class="text-center mb-10">
                <a href="/" class="text-4xl font-black oswald text-white tracking-tighter">
                    X-<span class="text-orange-600">BIKE</span>
                </a>
                <h2 class="text-gray-400 mt-4 font-bold uppercase tracking-widest text-xs">مرحباً بك مجدداً أيها الدراج</h2>
            </div>

            <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-10 rounded-[2.5rem] shadow-2xl">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-[10px] font-black uppercase tracking-widest text-orange-600 mb-2 mr-2">البريد الإلكتروني</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                            class="w-full bg-black/40 border border-white/10 rounded-2xl py-3.5 px-6 text-white focus:outline-none focus:border-orange-600 transition-all" placeholder="name@example.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-500" />
                    </div>

                    <div>
                        <label for="password" class="block text-[10px] font-black uppercase tracking-widest text-orange-600 mb-2 mr-2">كلمة المرور</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="w-full bg-black/40 border border-white/10 rounded-2xl py-3.5 px-6 text-white focus:outline-none focus:border-orange-600 transition-all">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-500" />
                    </div>

                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" class="rounded bg-black border-white/10 text-orange-600 focus:ring-orange-600 shadow-sm" name="remember">
                            <span class="mr-2 text-xs text-gray-400 font-bold">تذكرني</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-xs text-gray-500 hover:text-orange-600 transition font-bold" href="{{ route('password.request') }}">
                                نسيت كلمة المرور؟
                            </a>
                        @endif
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-orange-600 text-white font-black py-5 rounded-2xl uppercase tracking-widest text-xs hover:bg-white hover:text-orange-600 transition-all duration-500 shadow-lg shadow-orange-600/20 active:scale-95">
                            تسجيل الدخول
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-gray-500 text-xs font-bold">لا تملك حساباً؟ 
                        <a href="{{ route('register') }}" class="text-white hover:text-orange-600 transition">سجل الآن مجاناً</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>