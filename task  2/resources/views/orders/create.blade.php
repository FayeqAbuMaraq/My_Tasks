<x-app-layout>
    <div class="container py-5 text-end" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <!-- العنوان وزر العودة -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold text-dark mb-1">إرسال حالة جديدة للمختبر</h2>
                        <p class="text-muted mb-0">يرجى ملء تفاصيل المريض والعمل الفني المطلوب بدقة.</p>
                    </div>
                    <a href="{{ route('orders.index') }}" class="btn btn-light border rounded-pill px-4 fw-bold">
                        <i class="fas fa-arrow-right ms-2"></i> رجوع للطلبات
                    </a>
                </div>

                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf

                    <div class="row g-4">
                        <!-- القسم الأيمن: البيانات الأساسية -->
                        <div class="col-lg-7">
                            <!-- كارد بيانات المريض -->
                            <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
                                <div class="card-header bg-success text-white py-3 border-0">
                                    <h6 class="mb-0 fw-bold"><i class="fas fa-user-tag ms-2"></i> 1. معلومات المريض</h6>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold small text-muted">اسم المريض الكامل</label>
                                            <input type="text" name="patient_name" class="form-control form-control-lg bg-light border-0 rounded-3 shadow-sm" placeholder="أدخل اسم المريض..." required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold small text-muted">جنس المريض</label>
                                            <select name="patient_gender" class="form-select form-control-lg bg-light border-0 rounded-3 shadow-sm" required>
                                                <option value="male">ذكر</option>
                                                <option value="female">أنثى</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold small text-muted">العمر (اختياري)</label>
                                            <input type="number" name="age" class="form-control form-control-lg bg-light border-0 rounded-3 shadow-sm" placeholder="مثال: 30">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- كارد الخدمة واللون -->
                            <div class="card border-0 shadow-sm rounded-4 mb-4">
                                <div class="card-header bg-dark text-white py-3 border-0">
                                    <h6 class="mb-0 fw-bold"><i class="fas fa-tooth ms-2"></i> 2. نوع العمل واللون</h6>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-7">
                                            <label class="form-label fw-bold small text-muted">نوع التركيبة / الخدمة</label>
                                            <select name="service_id" class="form-select form-control-lg bg-light border-0 rounded-3 shadow-sm" required>
                                                <option value="">اختر الخدمة...</option>
                                                @foreach($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name }} ({{ $service->price }} ₪)</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label fw-bold small text-muted">اللون (Shade)</label>
                                            <input type="text" name="shade" class="form-control form-control-lg bg-light border-0 rounded-3 shadow-sm text-center fw-bold" placeholder="A1, B2, C3...">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold small text-muted">تاريخ التسليم المطلوب</label>
                                            <input type="date" name="due_date" class="form-control form-control-lg bg-light border-0 rounded-3 shadow-sm" required min="{{ date('Y-m-d') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- القسم الأيسر: مخطط الأسنان والملاحظات -->
                        <div class="col-lg-5">
                            <!-- كارد مخطط الأسنان -->
                            <div class="card border-0 shadow-sm rounded-4 mb-4 border-top border-5 border-success">
                                <div class="card-body p-4">
                                    <h6 class="fw-bold mb-3 text-dark"><i class="fas fa-th-large ms-2"></i> 3. تحديد الأسنان</h6>
                                    <p class="small text-muted mb-4">اختر أرقام الأسنان التي سيتم العمل عليها:</p>
                                    
                                    <div class="dental-chart-grid">
                                        <div class="d-flex flex-wrap gap-2 justify-content-center mb-3 border-bottom pb-2">
                                            @foreach(range(18, 11, -1) as $tooth)
                                                <input type="checkbox" name="teeth_numbers[]" value="{{ $tooth }}" id="t{{ $tooth }}" class="btn-check">
                                                <label class="btn btn-outline-success btn-sm rounded-3 tooth-label shadow-sm" for="t{{ $tooth }}">{{ $tooth }}</label>
                                            @endforeach
                                        </div>
                                        <div class="d-flex flex-wrap gap-2 justify-content-center mb-4">
                                            @foreach(range(21, 28) as $tooth)
                                                <input type="checkbox" name="teeth_numbers[]" value="{{ $tooth }}" id="t{{ $tooth }}" class="btn-check">
                                                <label class="btn btn-outline-success btn-sm rounded-3 tooth-label shadow-sm" for="t{{ $tooth }}">{{ $tooth }}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="alert alert-light border-0 small text-center p-2 mb-0 mt-3">
                                        يمكنك اختيار أكثر من سن لنفس الطلب.
                                    </div>
                                </div>
                            </div>

                            <!-- كارد الملاحظات -->
                            <div class="card border-0 shadow-sm rounded-4 mb-4">
                                <div class="card-body p-4">
                                    <h6 class="fw-bold mb-3 text-warning"><i class="fas fa-sticky-note ms-2"></i> 4. ملاحظات إضافية</h6>
                                    <textarea name="instructions" class="form-control bg-light border-0 rounded-3 shadow-sm" rows="4" placeholder="اكتب تعليماتك الخاصة للفني هنا..."></textarea>
                                </div>
                            </div>

                            <!-- زر الإرسال -->
                            <button type="submit" class="btn btn-success btn-lg w-100 rounded-pill fw-bold py-3 shadow-lg">
                                <i class="fas fa-paper-plane ms-2"></i> إرسال الطلب للمختبر
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <style>
        .tooth-label {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            transition: all 0.2s;
        }
        .btn-check:checked + .tooth-label {
            background-color: #198754 !important;
            color: white !important;
            transform: scale(1.1);
        }
        .form-control:focus, .form-select:focus {
            background-color: #fff !important;
            border: 1px solid #198754 !important;
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.1) !important;
        }
    </style>
</x-app-layout>