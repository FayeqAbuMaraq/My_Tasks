<x-app-layout>
    <div class="container py-5">
        <h3 class="fw-bold text-dark border-end border-5 border-success pe-3 mb-4">إدارة الطلبات</h3>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th class="ps-4 py-3">#</th>
                            <th class="py-3">العميل</th>
                            <th class="py-3">الإجمالي</th>
                            <th class="py-3">الحالة</th>
                            <th class="py-3">التاريخ</th>
                            <th class="py-3 text-center">إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr>
                            <th class="ps-4 text-muted">{{ $order->id }}</th>
                            <td class="fw-bold">{{ $order->customer_name ?? $order->user->name ?? 'زائر' }}</td>
                            <td class="fw-bold text-success">${{ number_format($order->total_amount, 2) }}</td>
                            <td>
                                @if($order->status == 'pending') <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill">قيد الانتظار</span>
                                @elseif($order->status == 'completed') <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">مكتمل</span>
                                @elseif($order->status == 'cancelled') <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill">ملغي</span>
                                @else <span class="badge bg-info bg-opacity-10 text-info px-3 py-2 rounded-pill">جاري التنفيذ</span>
                                @endif
                            </td>
                            <td class="text-muted small">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('dashboard.orders.show', $order->id) }}" class="btn btn-sm btn-light text-primary" title="التفاصيل"><i class="fas fa-eye"></i></a>
                                    
                                    <form action="{{ route('dashboard.orders.destroy', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light text-danger" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fas fa-shopping-bag fa-3x mb-3 text-secondary opacity-50"></i>
                                <p>لا توجد طلبات حتى الآن.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($orders->hasPages())
                <div class="card-footer bg-white border-0 py-3">{{ $orders->links() }}</div>
            @endif
        </div>
    </div>
</x-app-layout>