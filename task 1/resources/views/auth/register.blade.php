<x-app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-0 text-center pt-5 pb-3">
                        <h2 class="fw-bold text-dark">إنشاء حساب جديد 🚀</h2>
                        <p class="text-muted small">انضم إلينا واستمتع بتجربة تسوق مميزة</p>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold small text-muted">الاسم الكامل</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0 text-muted"><i class="fas fa-user"></i></span>
                                    <input id="name" class="form-control bg-light border-0 py-2" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="الاسم" />
                                </div>
                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger small" />
                            </div>

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold small text-muted">البريد الإلكتروني</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0 text-muted"><i class="fas fa-envelope"></i></span>
                                    <input id="email" class="form-control bg-light border-0 py-2" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@example.com" />
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger small" />
                            </div>

                            <div class="row">
                                <!-- Password -->
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label fw-bold small text-muted">كلمة المرور</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0 text-muted"><i class="fas fa-lock"></i></span>
                                        <input id="password" class="form-control bg-light border-0 py-2" type="password" name="password" required autocomplete="new-password" placeholder="********" />
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger small" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-md-6 mb-4">
                                    <label for="password_confirmation" class="form-label fw-bold small text-muted">تأكيد كلمة المرور</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0 text-muted"><i class="fas fa-check-circle"></i></span>
                                        <input id="password_confirmation" class="form-control bg-light border-0 py-2" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="********" />
                                    </div>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger small" />
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-2">
                                <button type="submit" class="btn btn-primary fw-bold py-2 shadow-sm" style="background-color: var(--primary-green); border: none;">
                                    تسجيل حساب جديد <i class="fas fa-user-plus ms-2"></i>
                                </button>
                            </div>

                            <div class="text-center mt-4">
                                <p class="small text-muted mb-0">لديك حساب بالفعل؟ <a href="{{ route('login') }}" class="fw-bold text-decoration-none" style="color: var(--primary-green);">تسجيل الدخول</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>