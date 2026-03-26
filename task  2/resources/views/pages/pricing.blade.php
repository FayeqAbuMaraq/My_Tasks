<x-app-layout>
    <div class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-success display-5">خطط أسعار مرنة لعيادتك</h2>
                <p class="text-muted lead">اختر الخطة التي تناسب حجم عملك، أو ادفع لكل طلب على حدة.</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm h-100" style="border-top: 4px solid #6c757d !important;">
                        <div class="card-body p-4 text-center">
                            <h4 class="fw-bold text-muted">الدفع عند الطلب</h4>
                            <h1 class="my-4 display-6 fw-bold">0 <span class="fs-5 text-muted">شيكل / شهرياً</span></h1>
                            <ul class="list-unstyled text-start mb-4">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> حساب مجاني للعيادة</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> دفع لكل حالة (Per Case)</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> دعم فني خلال أوقات العمل</li>
                            </ul>
                            <a href="{{ route('register') }}" class="btn btn-outline-secondary w-100 rounded-pill fw-bold">ابدأ الآن</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-lg h-100 transform-scale" style="border-top: 4px solid #198754 !important;">
                        <div class="position-absolute top-0 start-50 translate-middle">
                            <span class="badge bg-success rounded-pill px-3 py-2">الأكثر طلباً</span>
                        </div>
                        <div class="card-body p-4 text-center">
                            <h4 class="fw-bold text-success">شراكة ذهبية</h4>
                            <h1 class="my-4 display-6 fw-bold">خصم <span class="text-success">10%</span></h1>
                            <p class="text-muted small">للعيادات ذات الحجم الكبير (+50 حالة شهرياً)</p>
                            <ul class="list-unstyled text-start mb-4">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> أولوية في التصنيع</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> استلام وتسليم مجاني يومياً</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> مدير حساب خاص</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> فاتورة مجمعة شهرية</li>
                            </ul>
                            <a href="{{ route('register') }}" class="btn btn-success w-100 rounded-pill fw-bold">تواصل معنا للشراكة</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>