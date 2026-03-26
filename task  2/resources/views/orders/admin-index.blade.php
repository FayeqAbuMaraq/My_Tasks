<x-app-layout>
    <div class="container py-5 text-end" dir="rtl">
        
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div >
                <h2 class="fw-bold text-dark mb-1"><i class="fas fa-microscope ms-2 text-success"></i>إدارة طلبات المختبر</h2>
                <p class="text-muted mb-0">عرض ومتابعة كافة الحالات الواردة من جميع العيادات.</p>
            </div>
            {{-- <div class="d-flex gap-2">
                <button class="btn btn-outline-dark rounded-pill px-4 fw-bold">
                    <i class="fas fa-download ms-2"></i>تصدير التقرير
                </button>
            </div> --}}
        </div>

        <div class="card border-0 shadow-sm rounded-4 mb-4 bg-white border-start border-5 border-success">
            <div class="card-body p-4">
                <form class="row g-3">
                    <div class="col-md-3">
                        <label class="small fw-bold text-muted mb-1">البحث</label>
                        <input type="text" class="form-control bg-light border-0 rounded-3" placeholder="اسم المريض أو العيادة...">
                    </div>
                    <div class="col-md-3">
                        <label class="small fw-bold text-muted mb-1">حالة الطلب</label>
                        <select class="form-select bg-light border-0 rounded-3">
                            <option value="">كل الحالات</option>
                            <option value="pending">قيد الانتظار</option>
                            <option value="processing">جاري العمل</option>
                            <option value="completed">مكتمل</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="small fw-bold text-muted mb-1">العيادة (الطبيب)</label>
                        <select class="form-select bg-light border-0 rounded-3">
                            <option value="">جميع الأطباء</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100 rounded-3 fw-bold">تطبيق الفلتر</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="p-3 text-center">رقم الطلب</th>
                            <th>العيادة / الطبيب</th>
                            <th>المريض</th>
                            <th>الخدمة الفنية</th>
                            <th class="text-center">التسليم</th>
                            <th class="text-center">الحالة</th>
                            <th class="text-center">الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td class="text-center fw-bold text-primary">#{{ $order->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light p-2 rounded-circle ms-2">
                                        <i class="fas fa-clinic-medical text-muted"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold d-block">{{ $order->user->name ?? 'طبيب عام' }}</span>
                                        <small class="text-muted">ID: {{ $order->user_id }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="fw-bold">{{ $order->patient_name }}</td>
                            <td>
                                <span class="badge bg-light text-dark border">{{ $order->service->name ?? 'غير محدد' }}</span>
                            </td>
                            <td class="text-center">
                                <span class="text-danger fw-bold small">{{ \Carbon\Carbon::parse($order->due_date)->format('Y-m-d') }}</span>
                            </td>
                            <td class="text-center">
                                <span class="badge {{ $statusColors[$order->status] ?? 'bg-secondary' }} px-3 py-2 rounded-pill">
                                    {{ $statusText[$order->status] ?? $order->status }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('orders.admin-show', $order->id) }}" class="btn btn-sm btn-dark rounded-pill px-3 fw-bold">
                                    إدارة الحالة
                                </a>
                        @hasrole('admin')
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الخدمة؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-2">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form> 
                        @endhasrole
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">لا توجد طلبات واردة حالياً.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>