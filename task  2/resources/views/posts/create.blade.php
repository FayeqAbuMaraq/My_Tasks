<x-app-layout>
    <div class="container py-5" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <!-- رأس الصفحة -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-dark">كتابة مقال جديد</h2>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary rounded-pill px-4">
                        <i class="fas fa-arrow-right ms-2"></i> إلغاء ورجوع
                    </a>
                </div>

                <!-- كارد النموذج -->
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-5">
                        
                        <!-- عرض الأخطاء إن وجدت -->
                        @if ($errors->any())
                            <div class="alert alert-danger rounded-3 mb-4">
                                <ul class="mb-0 small">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- عنوان المقال -->
                            <div class="mb-4">
                                <label class="form-label fw-bold text-muted">عنوان المقال <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control form-control-lg bg-light border-0 rounded-3" placeholder="مثال: أحدث تقنيات زراعة الأسنان..." value="{{ old('title') }}" required>
                            </div>

                            <!-- الصورة البارزة -->
                            <div class="mb-4">
                                <label class="form-label fw-bold text-muted">صورة المقال</label>
                                <div class="input-group">
                                    <input type="file" name="image" class="form-control bg-light border-0 rounded-3" id="imageInput" accept="image/*">
                                </div>
                                <div class="form-text text-muted">يفضل أن تكون الصورة بجودة عالية (Landscape).</div>
                            </div>

                            <!-- محتوى المقال -->
                            <div class="mb-4">
                                <label class="form-label fw-bold text-muted">محتوى المقال <span class="text-danger">*</span></label>
                                <textarea name="content" class="form-control bg-light border-0 rounded-3" rows="12" placeholder="اكتب نص المقال هنا..." required>{{ old('content') }}</textarea>
                            </div>

                            <!-- حالة النشر -->
                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="is_published" id="publishCheck" checked>
                                    <label class="form-check-label fw-bold" for="publishCheck">نشر المقال فوراً على الموقع</label>
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- زر الحفظ -->
                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold">
                                <i class="fas fa-save ms-2"></i> نشر المقال
                            </button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>