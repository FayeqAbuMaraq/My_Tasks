<x-app-layout>
    <div class="container py-5">
        
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark">تفاصيل الطلب #{{ $order->id }}</h2>
                <span class="badge bg-secondary">{{ $order->created_at->format('Y-m-d h:i A') }}</span>
            </div>
            <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary rounded-pill">
                <i class="fas fa-arrow-right me-2"></i> العودة للقائمة
            </a>
        </div>

        <div class="row g-4">
            <!-- تفاصيل الطلب الرئيسية -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="fw-bold mb-0 text-success">معلومات الحالة</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p class="text-muted small mb-1">اسم المريض</p>
                                <p class="fw-bold">{{ $order->patient_name }} ({{ $order->patient_gender == 'male' ? 'ذكر' : 'أنثى' }})</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted small mb-1">العمر</p>
                                <p class="fw-bold">{{ $order->age ?? '-' }} سنة</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p class="text-muted small mb-1">نوع الخدمة</p>
                                <p class="fw-bold text-primary">{{ $order->service->name ?? 'غير محدد' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted small mb-1">لون السن (Shade)</p>
                                <p class="fw-bold">{{ $order->shade ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="text-muted small mb-1">أرقام الأسنان المطلوبة</p>
                                <div class="d-flex gap-2 flex-wrap">
                                    @foreach($order->teeth_numbers ?? [] as $tooth)
                                        <span class="badge bg-dark rounded-circle p-2" style="width: 35px; height: 35px; display:flex; align-items:center; justify-content:center;">
                                            {{ $tooth }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        @if($order->instructions)
                            <hr>
                            <p class="text-muted small mb-1">تعليمات الطبيب</p>
                            <div class="bg-light p-3 rounded-3 border">
                                {{ $order->instructions }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="fw-bold mb-0">الملاحظات والمرفقات</h5>
                    </div>
                    <div class="card-body text-center py-5 text-muted">
                        <i class="fas fa-comments fa-3x mb-3 opacity-25"></i>
                        <p>لا توجد رسائل حالياً.</p>
                    </div>
                </div>
            </div>

            <!-- الشريط الجانبي (الحالة والسعر) -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <h6 class="text-muted fw-bold mb-3">حالة الطلب</h6>
                        @php
                            $statusLabel = [
                                'pending' => 'قيد الانتظار',
                                'received' => 'تم الاستلام',
                                'in_progress' => 'جاري العمل',
                                'completed' => 'مكتمل',
                                'delivered' => 'تم التسليم',
                                'cancelled' => 'ملغي'
                            ];
                            $statusClass = [
                                'pending' => 'bg-warning text-dark',
                                'received' => 'bg-info text-white',
                                'in_progress' => 'bg-primary text-white',
                                'completed' => 'bg-success text-white',
                                'delivered' => 'bg-dark text-white',
                                'cancelled' => 'bg-danger text-white'
                            ];
                        @endphp
                        <div class="p-3 rounded-3 text-center mb-3 {{ $statusClass[$order->status] ?? 'bg-secondary' }}">
                            <h4 class="mb-0 fw-bold">{{ $statusLabel[$order->status] ?? $order->status }}</h4>
                        </div>
                        
                        <div class="d-flex justify-content-between border-bottom pb-2 mb-2">
                            <span>تاريخ الطلب:</span>
                            <span class="fw-bold">{{ $order->created_at->format('Y-m-d') }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>تاريخ التسليم المتوقع:</span>
                            <span class="fw-bold text-danger">{{ $order->due_date->format('Y-m-d') }}</span>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h6 class="text-muted fw-bold mb-3">الملخص المالي</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h5 mb-0">الإجمالي التقديري:</span>
                            <span class="h4 fw-bold text-success mb-0">{{ $order->total_price }} ₪</span>
                        </div>
                        <small class="text-muted d-block mt-2" >سيتم تحصيل المبلغ بواسطة المندوب عند التسليم</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>