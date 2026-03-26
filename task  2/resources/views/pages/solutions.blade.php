<x-app-layout>
    <!-- Hero Section -->
    <div class="bg-dark text-white py-5 position-relative overflow-hidden">
        <div class="position-absolute top-0 start-0 w-100 h-100 opacity-25" 
             style="background: url('https://img.freepik.com/free-photo/dentist-examining-patient-teeth_1098-568.jpg') center/cover;">
        </div>
        <div class="container position-relative z-1 text-center py-5">
            <h1 class="display-4 fw-bold mb-3">حلول متكاملة لابتسامة مثالية</h1>
            <p class="lead text-white-50 mx-auto" style="max-width: 700px;">
                نحن لا نصنع الأسنان فقط، بل نقدم حلولاً علاجية شاملة تغطي كافة تخصصات طب الأسنان الحديث.
            </p>
        </div>
    </div>

    <!-- قسم الحلول (Tabs) -->
    <div class="container py-5">
        <div class="row">
            <!-- القائمة الجانبية للتبويبات -->
            <div class="col-md-3 mb-4">
                <div class="nav flex-column nav-pills me-3 shadow-sm rounded-4 overflow-hidden bg-white" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    
                    <button class="nav-link active text-start py-3 px-4 fw-bold border-bottom" id="v-pills-fixed-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fixed" type="button" role="tab">
                        <i class="fas fa-tooth me-2 text-primary"></i> التركيبات الثابتة
                    </button>
                    
                    <button class="nav-link text-start py-3 px-4 fw-bold border-bottom" id="v-pills-implants-tab" data-bs-toggle="pill" data-bs-target="#v-pills-implants" type="button" role="tab">
                        <i class="fas fa-screw me-2 text-success"></i> زراعة الأسنان
                    </button>
                    
                    <button class="nav-link text-start py-3 px-4 fw-bold border-bottom" id="v-pills-ortho-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ortho" type="button" role="tab">
                        <i class="fas fa-teeth-open me-2 text-warning"></i> التقويم الشفاف
                    </button>
                    
                    <button class="nav-link text-start py-3 px-4 fw-bold" id="v-pills-digital-tab" data-bs-toggle="pill" data-bs-target="#v-pills-digital" type="button" role="tab">
                        <i class="fas fa-laptop-medical me-2 text-info"></i> الحلول الرقمية
                    </button>

                </div>
            </div>

            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    
                    <div class="tab-pane fade show active" id="v-pills-fixed" role="tabpanel">
                        <div class="card border-0 shadow-sm rounded-4 p-4">
                            <h3 class="fw-bold mb-3 text-primary">التركيبات الثابتة (Crowns & Bridges)</h3>
                            <p class="text-muted mb-4">نستخدم أرقى المواد العالمية لضمان المتانة والشفافية العالية التي تحاكي الأسنان الطبيعية.</p>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <div class="icon-square bg-primary bg-opacity-10 text-primary p-3 rounded-3 me-3">
                                            <i class="fas fa-gem fa-lg"></i>
                                        </div>
                                        <div>
                                            <h5 class="fw-bold">زيركون متعدد الطبقات</h5>
                                            <p class="small text-muted">زيركونيا عالية الشفافية (Multilayer) تجمع بين القوة والجمال بدون الحاجة للتغطية بالبورسلين.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <div class="icon-square bg-primary bg-opacity-10 text-primary p-3 rounded-3 me-3">
                                            <i class="fas fa-magic fa-lg"></i>
                                        </div>
                                        <div>
                                            <h5 class="fw-bold">إيماكس (E.max)</h5>
                                            <p class="small text-muted">الخيار الأول للعدسات (Veneers) والأسنان الأمامية بفضل خصائصه البصرية الفائقة.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 text-end">
                                <a href="{{ route('services.index') }}" class="btn btn-primary rounded-pill px-4">تصفح المنتجات</a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-implants" role="tabpanel">
                        <div class="card border-0 shadow-sm rounded-4 p-4">
                            <h3 class="fw-bold mb-3 text-success">حلول زراعة الأسنان</h3>
                            <p class="text-muted mb-4">حلول تعويضية دقيقة تعتمد على التخطيط الرقمي لضمان نجاح الزرعة واستقرارها.</p>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-3 d-flex align-items-center">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            <span>دعامات مخصصة (Custom Abutments)</span>
                                        </li>
                                        <li class="mb-3 d-flex align-items-center">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            <span>بارات الزراعة (Implant Bars)</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="bg-light p-3 rounded-3 border-start border-4 border-success">
                                        <small class="fw-bold text-dark d-block mb-1">هل تعلم؟</small>
                                        <p class="small text-muted mb-0">نستخدم التيتانيوم من الدرجة الخامسة لضمان التوافق الحيوي التام مع اللثة.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-ortho" role="tabpanel">
                        <div class="card border-0 shadow-sm rounded-4 p-4">
                            <h3 class="fw-bold mb-3 text-warning">التقويم الشفاف (Aligners)</h3>
                            <p class="text-muted mb-4">بديل التقويم المعدني. نقوم بتصميم خطة علاجية ثلاثية الأبعاد ونطبع المصفوفات بدقة عالية.</p>
                            <div class="alert alert-warning bg-warning bg-opacity-10 border-0 rounded-3">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>خدمة جديدة:</strong> يمكنك الآن إرسال ملفات الـ STL مباشرة وسنقوم بالتخطيط والطباعة.
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-digital" role="tabpanel">
                        <div class="card border-0 shadow-sm rounded-4 p-4">
                            <h3 class="fw-bold mb-3 text-info">سير العمل الرقمي (Digital Workflow)</h3>
                            <p class="text-muted mb-4">وداعاً للقياسات التقليدية والمعجون. نحن جاهزون لاستقبال ملفات الماسح الضوئي (Intraoral Scanner) الخاص بك.</p>
                            
                            <div class="row text-center g-3">
                                <div class="col-4">
                                    <div class="p-3 border rounded-3 bg-light">
                                        <span class="d-block fw-bold text-dark mb-1">1. صور</span>
                                        <small class="text-muted">Scan</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="p-3 border rounded-3 bg-light">
                                        <span class="d-block fw-bold text-dark mb-1">2. صمم</span>
                                        <small class="text-muted">Design</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="p-3 border rounded-3 bg-light">
                                        <span class="d-block fw-bold text-dark mb-1">3. اطبع</span>
                                        <small class="text-muted">Print/Mill</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>
        .nav-pills .nav-link {
            color: #555;
            border-radius: 0;
            transition: all 0.3s;
        }
        .nav-pills .nav-link:hover {
            background-color: #f8f9fa;
            color: #000;
        }
        .nav-pills .nav-link.active {
            background-color: #198754; 
            color: white !important;
        }
        .nav-pills .nav-link i {
            width: 25px;
            text-align: center;
        }
    </style>
</x-app-layout>