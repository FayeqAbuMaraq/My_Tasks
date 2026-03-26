<x-app-layout>
    <div class="container py-5">
        <h3 class="fw-bold mb-4 border-end border-5 border-success pe-3">سجل طلباتي</h3>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3">رقم الطلب</th>
                            <th class="py-3">التاريخ</th>
                            <th class="py-3">الإجمالي</th>
                            <th class="py-3">الحالة</th>
                            <th class="py-3 text-center">التفاصيل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td class="ps-4 fw-bold">#{{ $order->id }}</td>
                            <td class="text-muted small">{{ $order->created_at->format('Y-m-d') }}</td>
                            <td class="fw-bold text-success">${{ number_format($order->total_amount, 2) }}</td>
                            <td>
                                @if($order->status == 'pending') <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">قيد الانتظار</span>
                                @elseif($order->status == 'completed') <span class="badge bg-success px-3 py-2 rounded-pill">مكتمل</span>
                                @elseif($order->status == 'cancelled') <span class="badge bg-danger px-3 py-2 rounded-pill">ملغي</span>
                                @else <span class="badge bg-info text-dark px-3 py-2 rounded-pill">جاري التنفيذ</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('my-orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                    عرض <i class="fas fa-arrow-left ms-1"></i>
                                </a>
                                @if($order->status == 'pending')
                                    <form action="{{ route('my-orders.cancel', $order->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من رغبتك في إلغاء هذا الطلب؟');">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-end px-3">
                                            إلغاء
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="fas fa-shopping-bag fa-3x mb-3 opacity-25"></i>
                                <p>لم تقم بأي طلبات حتى الآن.</p>
                                <a href="{{ route('home') }}" class="btn btn-outline-success mt-2">تصفح المنتجات</a>
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