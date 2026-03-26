@role('admin|technician')
<x-app-layout>
    <div class="container py-5">
        
        <!-- رأس الصفحة -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark">لوحة التحكم</h2>
                <p class="text-muted">نظرة عامة على أداء المختبر والمحتوى</p>
            </div>
            
            <div class="d-flex gap-2">
                @role('admin')
                <!-- زر إضافة مقال (محتوى) -->
                <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-primary fw-bold">
                    عرض المقالات
                </a>

                <!-- زر إضافة خدمة -->
                <button class="btn btn-success fw-bold" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                    <i class="fas fa-plus me-2"></i> إضافة خدمة جديدة
                </button>
                @endrole
            </div>
        </div>

        <!-- كروت الإحصائيات -->
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-muted fw-bold mb-0">إجمالي الطلبات</h6>
                            <i class="fas fa-clipboard-list fa-lg text-primary"></i>
                        </div>
                        <h2 class="fw-bold mb-0">{{ $stats['orders_count'] }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-muted fw-bold mb-0">قيد الانتظار</h6>
                            <i class="fas fa-clock fa-lg text-warning"></i>
                        </div>
                        <h2 class="fw-bold mb-0">{{ $stats['pending_orders'] }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-muted fw-bold mb-0">المقالات المنشورة</h6>
                            <i class="fas fa-newspaper fa-lg text-info"></i>
                        </div>
                        <h2 class="fw-bold mb-0">{{ $stats['posts_count'] ?? 0 }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-muted fw-bold mb-0">الخدمات النشطة</h6>
                            <i class="fas fa-tooth fa-lg text-success"></i>
                        </div>
                        <h2 class="fw-bold mb-0">{{ $stats['services_count'] }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- القسم الأيمن: الجداول -->
            <div class="col-lg-8">
                <!-- جدول الطلبات -->
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0 text-dark">أحدث الطلبات الواردة</h5>
                        <a href="{{ route('orders.admin-index') }}" class="btn btn-sm btn-link text-primary fw-bold text-decoration-none">عرض الكل</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="ps-4">رقم الطلب</th>
                                        <th>الطبيب</th>
                                        <th>الحالة</th>
                                        <th>التاريخ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recent_orders as $order)
                                        <tr>
                                            <td class="ps-4 fw-bold">#{{ $order->id }}</td>
                                            <td>{{ $order->user->name ?? 'غير معروف' }}</td>
                                            <td><span class="badge bg-primary bg-opacity-10 text-primary">{{ $order->status }}</span></td>
                                            <td class="text-muted small">{{ $order->created_at->format('Y-m-d') }}</td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="4" class="text-center py-4">لا توجد طلبات حديثة</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- جدول المهتمين -->
                @role('admin')
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0 text-dark">طلبات الانضمام (Leads)</h5>
                        {{-- تأكد من وجود route('leads.index') في web.php أو قم بإزالته مؤقتاً --}}
                        <a href="{{ route('leads.index') }}" class="btn btn-sm btn-link text-primary fw-bold text-decoration-none">عرض الكل</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="ps-4">الاسم</th>
                                        <th>العيادة</th>
                                        <th>الهاتف</th>
                                        <th>التاريخ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recent_leads ?? [] as $lead)
                                        <tr>
                                            <td class="ps-4 fw-bold">{{ $lead->first_name }} {{ $lead->last_name }}</td>
                                            <td>{{ $lead->clinic_name }}</td>
                                            <td>{{ $lead->phone }}</td>
                                            <td class="text-muted small">{{ $lead->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="4" class="text-center py-4">لا يوجد مهتمون حالياً</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endrole
            </div>

            <!-- القسم الأيسر: الخدمات -->
            @role('admin')
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0 text-dark">إدارة الخدمات</h5>
                        <a href="{{ route('services.manage') }}" class="btn btn-sm btn-link text-primary fw-bold text-decoration-none">عرض الكل</a>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @forelse($services as $service)
                                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                    <div class="fw-bold text-dark">{{ $service->name }}</div>
                                    <div class="text-success fw-bold small">{{ $service->price }} ₪</div>
                                </li>
                            @empty
                                <li class="list-group-item text-center py-4">لا توجد خدمات</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            @endrole
        </div>
    </div>

    @role('admin')
        @include('services.create')
    @endrole

</x-app-layout>
@endrole