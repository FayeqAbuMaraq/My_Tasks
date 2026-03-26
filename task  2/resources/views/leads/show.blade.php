<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark">تفاصيل طلب الانضمام</h2>
                <p class="text-muted">الاطلاع على بيانات الطبيب المرسلة من الموقع</p>
            </div>
            <a href="{{ route('leads.index') }}" class="btn btn-outline-primary fw-bold">
                <i class="fas fa-list me-2"></i> العودة للقائمة
            </a>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                    <div class="card-header bg-primary py-3">
                        <h5 class="card-title text-white mb-0"><i class="fas fa-info-circle me-2"></i> معلومات مقدم الطلب</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="text-muted small d-block mb-1">الاسم الأول</label>
                                <p class="fw-bold fs-5 text-dark">{{ $lead->first_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-muted small d-block mb-1">اسم العائلة</label>
                                <p class="fw-bold fs-5 text-dark">{{ $lead->last_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-muted small d-block mb-1">اسم العيادة / المركز</label>
                                <p class="fw-bold text-dark">{{ $lead->clinic_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-muted small d-block mb-1">رقم الهاتف</label>
                                <p class="fw-bold text-primary fs-5" dir="ltr">{{ $lead->phone }}</p>
                            </div>
                            @if($lead->email)
                            <div class="col-md-12">
                                <label class="text-muted small d-block mb-1">البريد الإلكتروني</label>
                                <p class="fw-bold text-dark">{{ $lead->email }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                @if($lead->message)
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-light py-3 border-0">
                        <h5 class="fw-bold mb-0">رسالة الطبيب / ملاحظات</h5>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-dark leading-relaxed">{{ $lead->message }}</p>
                    </div>
                </div>
                @endif
            </div>


            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 mb-4 text-center p-4">
                    <div class="mb-3">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle p-4 d-inline-block">
                            <i class="fas fa-user-md fa-3x"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1">{{ $lead->first_name }} {{ $lead->last_name }}</h5>
                    <p class="text-muted mb-4 small">تم التقديم {{ $lead->created_at->diffForHumans() }}</p>
                    
                    <div class="d-grid gap-2">
                        <a href="tel:{{ $lead->phone }}" class="btn btn-success fw-bold">
                            <i class="fas fa-phone-alt me-2"></i> اتصال مباشر
                        </a>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->phone) }}" target="_blank" class="btn btn-outline-success fw-bold">
                            <i class="fab fa-whatsapp me-2"></i> مراسلة عبر واتساب
                        </a>
                        <hr>
                        <form action="{{ route('leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا السجل نهائياً؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger text-decoration-none small">حذف هذا الطلب</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>