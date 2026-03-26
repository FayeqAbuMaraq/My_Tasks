<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <h4 class="text-center mb-4 fw-bold" style="color: var(--primary-color);">تسجيل الدخول</h4>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-bold">البريد الإلكتروني</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                class="form-control form-control-lg @error('email') is-invalid @enderror">
            <x-input-error :messages="$errors->get('email')" class="invalid-feedback" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label fw-bold">كلمة المرور</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="form-control form-control-lg @error('password') is-invalid @enderror">
            <x-input-error :messages="$errors->get('password')" class="invalid-feedback" />
        </div>

        <!-- Remember Me -->
        <div class="form-check mb-3">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label text-muted">
                تذكرني
            </label>
        </div>

        <!-- Actions -->
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-lazord btn-lg fw-bold">
                دخول
            </button>
        </div>

        <div class="mt-4 text-center d-flex justify-content-between font-sm">
            @if (Route::has('password.request'))
                <a class="text-decoration-none text-muted small" href="{{ route('password.request') }}">
                    نسيت كلمة المرور؟
                </a>
            @endif
            
            <a class="text-decoration-none fw-bold small" style="color: var(--primary-color);" href="{{ route('register') }}">
                تسجيل حساب جديد
            </a>
        </div>
    </form>
</x-guest-layout>