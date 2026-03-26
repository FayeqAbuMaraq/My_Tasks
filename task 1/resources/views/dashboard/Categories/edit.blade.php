<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-dark border-end border-5 border-success pe-3">تعديل القسم: {{ $category->name }}</h3>
            <a href="{{ route('dashboard.categories.index') }}" class="btn btn-light border fw-bold text-secondary shadow-sm"><i class="fas fa-arrow-right me-1"></i> رجوع</a>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST"  enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">اسم القسم</label>
                            <input type="text" name="name" class="form-control bg-light border-0" value="{{ old('name', $category->name) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">الرابط (Slug)</label>
                            <input type="text" name="slug" class="form-control bg-light border-0" value="{{ old('slug', $category->slug) }}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold small"> الصورة </label>
                                <input type="file" class="form-control" id="image" name="image" value="">
                        </div>
                        <div class="col-12 text-end mt-4">
                            <button type="submit" class="btn btn-lg text-white fw-bold shadow-sm px-5" style="background-color: var(--primary-green);">تحديث</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>