<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-dark border-end border-5 border-success pe-3">إضافة مستخدم</h3>
            <a href="{{ route('dashboard.users.index') }}" class="btn btn-light border fw-bold text-secondary shadow-sm"><i class="fas fa-arrow-right me-1"></i> رجوع</a>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('dashboard.users.store') }}" method="POST" >
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">الاسم</label>
                            <input type="text" name="name" class="form-control bg-light border-0" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control bg-light border-0" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">كلمة المرور</label>
                            <input type="password" name="password" class="form-control bg-light border-0" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">الدور (Role)</label>
                            <select name="role" class="form-select bg-light border-0" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">الهاتف (اختياري)</label>
                            <input type="text" name="phone" class="form-control bg-light border-0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">العنوان (اختياري)</label>
                            <input type="text" name="address" class="form-control bg-light border-0">
                        </div>
                        <div class="col-12 text-end mt-4">
                            <button type="submit" class="btn btn-lg text-white fw-bold shadow-sm px-5" style="background-color: var(--primary-green);">حفظ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>