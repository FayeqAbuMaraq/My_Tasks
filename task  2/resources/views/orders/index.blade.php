<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark">طلباتي</h2>
                <p class="text-muted">قائمة بجميع الحالات التي قمت بإرسالها للمختبر</p>
            </div>
            <a href="{{ route('orders.create') }}" class="btn btn-success fw-bold px-4 py-2 rounded-pill shadow-sm">
                <i class="fas fa-plus me-2"></i> طلب جديد
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th class="p-3">رقم الطلب</th>
                                <th>اسم المريض</th>
                                <th>الخدمة</th>
                                <th>عدد الأسنان</th>
                                <th>تاريخ التسليم</th>
                                <th>الحالة</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td class="p-3 fw-bold">#{{ $order->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <span>{{ $order->patient_name }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $order->service->name ?? 'غير محدد' }}</td>
                                    <td>
                                        <span class="badge bg-secondary rounded-pill">
                                            {{ count($order->teeth_numbers ?? []) }}
                                        </span>
                                    </td>
                                    <td>{{ $order->due_date->format('Y-m-d') }}</td>
                                    <td>
                                        @php
                                            $statusColors = [
                                                'pending' => 'warning',
                                                'received' => 'info',
                                                'in_progress' => 'primary',
                                                'completed' => 'success',
                                                'delivered' => 'dark',
                                                'cancelled' => 'danger'
                                            ];
                                            $statusText = [
                                                'pending' => 'قيد الانتظار',
                                                'received' => 'تم الاستلام',
                                                'in_progress' => 'جاري العمل',
                                                'completed' => 'مكتمل',
                                                'delivered' => 'تم التسليم',
                                                'cancelled' => 'ملغي'
                                            ];
                                        @endphp
                                        <span class="badge bg-{{ $statusColors[$order->status] ?? 'secondary' }}">
                                            {{ $statusText[$order->status] ?? $order->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                            التفاصيل
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="fas fa-box-open fa-3x mb-3 opacity-50"></i>
                                            <p>لا توجد طلبات حتى الآن. ابدأ بإنشاء أول طلب!</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="p-3">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</x-app-layout>