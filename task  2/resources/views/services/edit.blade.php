<div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-primary text-white py-3">
                <h5 class="modal-title fw-bold"><i class="fas fa-edit me-2"></i> تعديل الخدمة: {{ $service->name }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <div class="mb-3 text-center">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" class="rounded-3 shadow-sm mb-2" style="width: 100px; height: 100px; object-fit: cover;">
                            <p class="text-muted small">الصورة الحالية</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">اسم الخدمة</label>
                        <input type="text" name="name" class="form-control rounded-3" value="{{ $service->name }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">السعر (₪)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-start-0 text-success fw-bold">₪</span>
                            <input type="number" name="price" class="form-control rounded-3" value="{{ $service->price }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">وصف الخدمة</label>
                        <textarea name="description" class="form-control rounded-3" rows="3">{{ $service->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">تحديث الصورة</label>
                        <input type="file" name="image" class="form-control rounded-3" accept="image/*">
                    </div>

                    <div class="form-check form-switch mt-3">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active{{ $service->id }}" {{ $service->is_active ? 'checked' : '' }} value="1">
                        <label class="form-check-label fw-bold text-dark" for="is_active{{ $service->id }}">الخدمة نشطة</label>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">حفظ التغييرات</button>
                </div>
            </form>
        </div>
    </div>
</div>