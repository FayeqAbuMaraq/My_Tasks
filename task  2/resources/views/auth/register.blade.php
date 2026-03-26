<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <h4 class="text-center mb-4 fw-bold" style="color: var(--primary-color);">إنشاء حساب جديد</h4>
        <p class="text-center text-muted mb-4 small">انضم لشبكة أطباء لازورد الرقمية</p>

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">الاسم الكامل / اسم العيادة</label>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                class="form-control @error('name') is-invalid @enderror">
            <x-input-error :messages="$errors->get('name')" class="invalid-feedback" />
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-bold">البريد الإلكتروني</label>
            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                class="form-control @error('email') is-invalid @enderror">
            <x-input-error :messages="$errors->get('email')" class="invalid-feedback" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label fw-bold">كلمة المرور</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                class="form-control @error('password') is-invalid @enderror">
            <x-input-error :messages="$errors->get('password')" class="invalid-feedback" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label fw-bold">تأكيد كلمة المرور</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                class="form-control @error('password_confirmation') is-invalid @enderror">
            <x-input-error :messages="$errors->get('password_confirmation')" class="invalid-feedback" />
        </div>

        <div class="d-grid gap-2 mt-4">
            <button type="submit" class="btn btn-lazord btn-lg fw-bold">
                تسجيل الحساب
            </button>
        </div>

        <div class="mt-3 text-center">
            <span class="text-muted small">لديك حساب بالفعل؟</span>
            <a class="text-decoration-none fw-bold small ms-1" style="color: var(--primary-color);" href="{{ route('login') }}">
                تسجيل الدخول
            </a>
        </div>
    </form>
</x-guest-layout>