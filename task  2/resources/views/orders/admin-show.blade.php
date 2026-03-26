<x-app-layout>
    <div class="container py-5 text-end" dir="rtl">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark"><i class="fas fa-edit ms-2 text-primary"></i>تحديث حالة العمل #{{ $order->id }}</h2>
                <span class="badge bg-light text-muted border px-3 py-2 mt-2">مرسل من: د. {{ $order->user->name ?? 'غير معروف' }}</span>
            </div>
            <a href="{{ route('orders.admin-index') }}" class="btn btn-light border shadow-sm fw-bold px-4 rounded-pill">
                <i class="fas fa-arrow-right ms-2"></i> العودة للطلبات
            </a>
        </div>

        <div class="row g-4">
            <!-- عمود التحكم بالحالة (للفني) -->
            <div class="col-lg-4 order-lg-2">
                <div class="card border-0 shadow-sm rounded-4 mb-4 border-top border-5 border-primary">
                    <div class="card-body p-4 text-center">
                        <h5 class="fw-bold mb-4">تغيير حالة المرحلة</h5>
                        
                        <form action="{{ route('orders.update-status', $order->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            
                            <div class="d-grid gap-3">
                                <button name="status" value="processing" class="btn btn-outline-info py-3 rounded-4 fw-bold {{ $order->status == 'processing' ? 'active shadow' : '' }}">
                                    <i class="fas fa-cog  ms-2"></i> جاري العمل الآن
                                </button>
                                
                                <button name="status" value="completed" class="btn btn-outline-success py-3 rounded-4 fw-bold {{ $order->status == 'completed' ? 'active shadow' : '' }}">
                                    <i class="fas fa-check ms-2"></i> تم الإنجاز نهائياً
                                </button>
                                
                                <button name="status" value="cancelled" class="btn btn-outline-danger py-3 rounded-4 fw-bold {{ $order->status == 'cancelled' ? 'active shadow' : '' }}">
                                    <i class="fas fa-times ms-2"></i> إلغاء / مشكلة في الحالة
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- كارد مالي إداري -->
                <div class="card border-0 shadow-sm rounded-4 bg-dark text-white">
                    <div class="card-body p-4">
                        <h6 class="text-white-50 small mb-3">التكلفة المسجلة على الطبيب</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h5 mb-0">المجموع:</span>
                            <span class="h2 fw-bold text-success mb-0">{{ $order->total_price }} ₪</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- عمود تفاصيل الحالة الفنية -->
            <div class="col-lg-8 order-lg-1">
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <div class="row g-4 text-center">
                        <div class="col-md-4 border-start">
                            <small class="text-muted d-block mb-1">المريض</small>
                            <span class="fw-bold fs-5">{{ $order->patient_name }}</span>
                        </div>
                        <div class="col-md-4 border-start">
                            <small class="text-muted d-block mb-1">اللون المطلـوب</small>
                            <span class="display-6 fw-bold text-primary">{{ $order->shade ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted d-block mb-1">موعد التسليم</small>
                            <span class="fw-bold text-danger fs-5">{{ \Carbon\Carbon::parse($order->due_date)->format('Y-m-d') }}</span>
                        </div>
                    </div>
                </div>

                <!-- كارد مخطط الأسنان (للفني ليعرف أين يعمل) -->
                <div class="card border-0 shadow-sm rounded-4 mb-4 bg-light">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-4 border-bottom pb-2 text-dark">خارطة العمل (أرقام الأسنان)</h6>
                        <div class="d-flex flex-wrap gap-2">
                            @php
                                $teeth = is_array($order->teeth_numbers) ? $order->teeth_numbers : json_decode($order->teeth_numbers, true);
                            @endphp
                            @forelse($teeth ?? [] as $t)
                                <div class="bg-success text-white fw-bold rounded-3 p-3 shadow-sm" style="min-width: 60px; text-align: center;">
                                    <small class="d-block opacity-75 small" style="font-size: 0.7rem;">Tooth</small>
                                    {{ $t }}
                                </div>
                            @empty
                                <p class="text-muted">لم يتم تحديد أسنان.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- ملاحظات الطبيب -->
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-3"><i class="fas fa-sticky-note ms-2 text-warning"></i>تعليمات الطبيب المرسلة:</h6>
                        <div class="p-3 bg-warning bg-opacity-10 border border-warning border-opacity-25 rounded-3">
                            {{ $order->instructions ?? 'لا توجد ملاحظات.' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>