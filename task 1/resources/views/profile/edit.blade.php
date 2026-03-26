<x-app-layout>
    <div class="container py-5">
        <h2 class="fw-bold mb-5 border-end pe-3">إعدادات الحساب</h2>

        <div class="row g-4">
            
            <!-- 1. تحديث المعلومات الأساسية -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-header bg-white py-3 border-0">
                        <h5 class="fw-bold mb-0 text-success"><i class="fas fa-user-edit me-2"></i>المعلومات الشخصية</h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" action="{{ route('profile.update') }}">
                            @csrf
                            @method('patch')

                            <div class="mb-3">
                                <label class="form-label fw-bold small">الاسم</label>
                                <input type="text" name="name" class="form-control bg-light border-0" value="{{ old('name', $user->name) }}" required>
                                <x-input-error class="mt-2 text-danger small" :messages="$errors->get('name')" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small">البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-control bg-light border-0" value="{{ old('email', $user->email) }}" required>
                                <x-input-error class="mt-2 text-danger small" :messages="$errors->get('email')" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small">رقم الهاتف</label>
                                <input type="text" name="phone" class="form-control bg-light border-0" value="{{ old('phone', $user->phone) }}" placeholder="مثال: 059xxxxxxx">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small">العنوان الافتراضي</label>
                                <textarea name="address" class="form-control bg-light border-0" rows="2" placeholder="المدينة، الشارع...">{{ old('address', $user->address) }}</textarea>
                            </div>

                            <div class="d-flex align-items-center gap-3 mt-4">
                                <button type="submit" class="btn btn-primary fw-bold px-4" style="background-color: var(--primary-green); border: none;">حفظ التغييرات</button>
                                
                                @if (session('status') === 'profile-updated')
                                    <span class="text-success small fw-bold fade-out"><i class="fas fa-check-circle me-1"></i> تم الحفظ</span>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- 2. تغيير كلمة المرور -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-header bg-white py-3 border-0">
                        <h5 class="fw-bold mb-0 text-success"><i class="fas fa-lock me-2"></i>تغيير كلمة المرور</h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" action="{{ route('password.update') }}">
                            @csrf
                            @method('put')

                            <div class="mb-3">
                                <label class="form-label fw-bold small">كلمة المرور الحالية</label>
                                <input type="password" name="current_password" class="form-control bg-light border-0" autocomplete="current-password">
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-danger small" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small">كلمة المرور الجديدة</label>
                                <input type="password" name="password" class="form-control bg-light border-0" autocomplete="new-password">
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-danger small" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small">تأكيد كلمة المرور</label>
                                <input type="password" name="password_confirmation" class="form-control bg-light border-0" autocomplete="new-password">
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-danger small" />
                            </div>

                            <div class="d-flex align-items-center gap-3 mt-4">
                                <button type="submit" class="btn btn-dark fw-bold px-4">تحديث كلمة المرور</button>
                                
                                @if (session('status') === 'password-updated')
                                    <span class="text-success small fw-bold fade-out"><i class="fas fa-check-circle me-1"></i> تم التحديث</span>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- 3. حذف الحساب -->
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4 bg-danger bg-opacity-10 mt-4">
                    <div class="card-body p-4 d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <h5 class="fw-bold text-danger mb-1"><i class="fas fa-exclamation-triangle me-2"></i>حذف الحساب</h5>
                            <p class="text-muted small mb-0">بمجرد حذف حسابك، سيتم حذف جميع الموارد والبيانات نهائياً. يرجى التأكد قبل المتابعة.</p>
                        </div>
                        <button class="btn btn-danger fw-bold" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
                            حذف الحساب
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal تأكيد الحذف -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold text-danger">هل أنت متأكد من رغبتك في حذف الحساب؟</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-muted small">الرجاء إدخال كلمة المرور لتأكيد رغبتك في حذف حسابك نهائياً.</p>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required>
                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-danger small" />
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-danger fw-bold">نعم، احذف الحساب</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script لإخفاء رسائل النجاح تلقائياً -->
    <script>
        setTimeout(function() {
            $('.fade-out').fadeOut('slow');
        }, 3000);
    </script>
</x-app-layout>