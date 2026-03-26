<x-app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-0 text-center pt-5 pb-3">
                        <h2 class="fw-bold text-dark">مرحباً بعودتك! 👋</h2>
                        <p class="text-muted small">الرجاء تسجيل الدخول للمتابعة</p>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4 text-success fw-bold text-center" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-4">
                                <label for="email" class="form-label fw-bold small text-muted">البريد الإلكتروني</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0 text-muted"><i class="fas fa-envelope"></i></span>
                                    <input id="email" class="form-control bg-light border-0 py-2" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@example.com" />
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger small" />
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password" class="form-label fw-bold small text-muted">كلمة المرور</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0 text-muted"><i class="fas fa-lock"></i></span>
                                    <input id="password" class="form-control bg-light border-0 py-2" type="password" name="password" required autocomplete="current-password" placeholder="********" />
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger small" />
                            </div>

                            <!-- Remember Me -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input id="remember_me" type="checkbox" class="form-check-input border-secondary" name="remember">
                                    <label for="remember_me" class="form-check-label small text-muted">تذكرني</label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="text-decoration-none small fw-bold" href="{{ route('password.request') }}" style="color: var(--primary-green);">
                                        نسيت كلمة المرور؟
                                    </a>
                                @endif
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary fw-bold py-2 shadow-sm" style="background-color: var(--primary-green); border: none;">
                                    تسجيل الدخول <i class="fas fa-sign-in-alt ms-2"></i>
                                </button>
                            </div>

                            <div class="text-center mt-4">
                                <p class="small text-muted mb-0">ليس لديك حساب؟ <a href="{{ route('register') }}" class="fw-bold text-decoration-none" style="color: var(--primary-green);">أنشئ حساباً جديداً</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>