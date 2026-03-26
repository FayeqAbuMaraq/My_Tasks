<x-app-layout>
    <div class="container py-5">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-dark border-end border-5 border-success pe-3">إضافة منتج جديد</h3>
            <a href="{{ route('dashboard.products.index') }}" class="btn btn-light border fw-bold text-secondary shadow-sm">
                <i class="fas fa-arrow-right me-1"></i> رجوع للقائمة
            </a>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                
                @if ($errors->any())
                    <div class="alert alert-danger mb-4 rounded-3">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-4">
                        
                        <!-- المعلومات الأساسية -->
                        <div class="col-md-8">
                            <h5 class="fw-bold text-success mb-3"><i class="fas fa-info-circle me-2"></i>البيانات الأساسية</h5>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold small">اسم المنتج</label>
                                <input type="text" name="name" class="form-control form-control-lg bg-light border-0" value="{{ old('name') }}" placeholder="مثال: Samsung S24 Ultra" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small">الرابط (Slug)</label>
                                <input type="text" name="slug" class="form-control bg-light border-0" value="{{ old('slug') }}" placeholder="مثال: samsung-s24-ultra" required>
                                <small class="text-muted">يستخدم في رابط الصفحة، يجب أن يكون بالإنجليزية وبدون مسافات.</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small">وصف قصير</label>
                                <input type="text" name="short_description" class="form-control bg-light border-0" value="{{ old('short_description') }}" placeholder="وصف يظهر في الكروت المختصرة">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small">الوصف الكامل</label>
                                <textarea name="description" class="form-control bg-light border-0" rows="5" placeholder="تفاصيل المنتج بالكامل...">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <!-- التفاصيل الجانبية -->
                        <div class="col-md-4">
                            <h5 class="fw-bold text-success mb-3"><i class="fas fa-cog me-2"></i>الإعدادات</h5>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold small">القسم</label>
                                <select name="category_id" class="form-select form-select-lg bg-light border-0" required>
                                    <option value="" disabled selected>-- اختر القسم --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <label class="form-label fw-bold small">السعر ($)</label>
                                    <input type="number" name="price" step="0.01" class="form-control bg-light border-0" value="{{ old('price') }}" required>
                                </div>
                                <div class="col-6">
                                    <label class="form-label fw-bold small">الكمية</label>
                                    <input type="number" name="quantity" class="form-control bg-light border-0" value="{{ old('quantity', 10) }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small">سعر الخصم (اختياري)</label>
                                <input type="number" name="sale_price" step="0.01" class="form-control bg-light border-0" value="{{ old('sale_price') }}" placeholder="اتركه فارغاً إذا لا يوجد خصم">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small"> الصورة</label>
                                <input type="file" class="form-control" id="image" name="image" value="">
                            </div>

                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="isFeatured" {{ old('is_featured') ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold small" for="isFeatured">منتج مميز (يظهر في الرئيسية)</label>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-lg text-white fw-bold shadow-sm" style="background-color: var(--primary-green);">حفظ المنتج</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>