<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold border-end border-5 border-success pe-3">تفاصيل الطلب #{{ $order->id }}</h3>
            <a href="{{ route('my-orders.index') }}" class="btn btn-light border shadow-sm fw-bold"><i class="fas fa-arrow-right me-1"></i> رجوع</a>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-success mb-3">ملخص الطلب</h5>
                        
                        <div class="mb-3">
                            <small class="text-muted d-block">تاريخ الطلب</small>
                            <span class="fw-bold">{{ $order->created_at->format('d M Y, h:i A') }}</span>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted d-block">الحالة الحالية</small>
                            @if($order->status == 'pending') <span class="badge bg-warning text-dark fs-6 mt-1">قيد المعالجة</span>
                            @elseif($order->status == 'completed') <span class="badge bg-success fs-6 mt-1">تم التوصيل</span>
                            @elseif($order->status == 'cancelled') <span class="badge bg-danger fs-6 mt-1">ملغي</span>
                            @else <span class="badge bg-info text-dark fs-6 mt-1">جاري التجهيز</span>
                            @endif
                        </div>

                        <hr>

                        <h5 class="fw-bold text-success mb-3 mt-4">عنوان التوصيل</h5>
                        <p class="mb-1 fw-bold">{{ $order->customer_name }}</p>
                        <p class="mb-1 text-muted">{{ $order->customer_phone }}</p>
                        <p class="mb-0 text-muted">{{ $order->address }}</p>
                    </div>
                </div>
            </div>

            <!-- المنتجات -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white py-3">
                        <h5 class="fw-bold mb-0">المنتجات</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3">المنتج</th>
                                    <th class="py-3 text-center">السعر</th>
                                    <th class="py-3 text-center">الكمية</th>
                                    <th class="py-3 text-end pe-4">الإجمالي</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $item->product->image}}" class="rounded border me-3" width="60" height="60" style="object-fit: cover;">
                                            <div>
                                                <h6 class="fw-bold mb-0">{{ $item->product->name ?? 'منتج محذوف' }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">${{ number_format($item->price, 2) }}</td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-end pe-4 fw-bold">${{ number_format($item->price * $item->quantity, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-light">
                                <tr>
                                    <td colspan="3" class="text-end py-3 fw-bold fs-5">الإجمالي النهائي:</td>
                                    <td class="text-end pe-4 py-3 fw-bold fs-4 text-success">${{ number_format($order->total_amount, 2) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>