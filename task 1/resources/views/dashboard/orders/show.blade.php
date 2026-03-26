<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-dark border-end border-5 border-success pe-3">تفاصيل الطلب #{{ $order->id }}</h3>
            <a href="{{ route('dashboard.orders.index') }}" class="btn btn-light border fw-bold text-secondary shadow-sm"><i class="fas fa-arrow-right me-1"></i> رجوع للقائمة</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4">
            <!-- تفاصيل العميل -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4 text-success"><i class="fas fa-user-circle me-2"></i>بيانات العميل</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3">
                                <span class="d-block text-muted small">الاسم</span>
                                <span class="fw-bold fs-5">{{ $order->customer_name ?? $order->user->name ?? 'زائر' }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="d-block text-muted small">البريد الإلكتروني</span>
                                <span class="fw-bold">{{ $order->customer_email ?? $order->user->email ?? '-' }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="d-block text-muted small">رقم الهاتف</span>
                                <span class="fw-bold">{{ $order->customer_phone ?? '-' }}</span>
                            </li>
                            <li>
                                <span class="d-block text-muted small">العنوان</span>
                                <span class="fw-bold">{{ $order->address ?? '-' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- حالة الطلب -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4 text-success"><i class="fas fa-tasks me-2"></i>حالة الطلب</h5>
                        
                        <div class="mb-4">
                            <span class="d-block text-muted small mb-1">الحالة الحالية</span>
                            @if($order->status == 'pending') <span class="badge bg-warning text-dark fs-6 px-3 py-2">قيد الانتظار</span>
                            @elseif($order->status == 'completed') <span class="badge bg-success fs-6 px-3 py-2">مكتمل</span>
                            @elseif($order->status == 'cancelled') <span class="badge bg-danger fs-6 px-3 py-2">ملغي</span>
                            @else <span class="badge bg-info text-dark fs-6 px-3 py-2">جاري التنفيذ</span>
                            @endif
                        </div>

                        <form action="{{ route('dashboard.orders.update', $order->id) }}" method="POST">
                            @csrf @method('PUT')
                            <label class="form-label fw-bold small">تحديث الحالة</label>
                            <div class="input-group">
                                <select name="status" class="form-select bg-light border-0">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>جاري التنفيذ</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>مكتمل</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>ملغي</option>
                                </select>
                                <button type="submit" class="btn btn-primary fw-bold" style="background-color: var(--primary-green); border:none;">تحديث</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ملخص الفاتورة -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 bg-light">
                    <div class="card-body p-4 d-flex flex-column justify-content-center text-center">
                        <h5 class="fw-bold text-muted mb-2">إجمالي الفاتورة</h5>
                        <h1 class="fw-bold text-success display-4 mb-0">${{ number_format($order->total_amount, 2) }}</h1>
                        <p class="text-muted small mt-2">تاريخ الطلب: {{ $order->created_at->format('Y-m-d H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- المنتجات -->
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white py-3">
                        <h5 class="fw-bold mb-0 text-dark"><i class="fas fa-box-open me-2"></i>المنتجات المطلوبة</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="bg-light text-secondary">
                                <tr>
                                    <th class="ps-4 py-3">المنتج</th>
                                    <th class="py-3">سعر الوحدة</th>
                                    <th class="py-3 text-center">الكمية</th>
                                    <th class="py-3 text-end pe-4">الإجمالي</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/' . $item->product->image) }}" class="rounded-3 me-3 border" width="50" height="50" style="object-fit: cover;">
                                            <div>
                                                <h6 class="fw-bold mb-0 text-dark">{{ $item->product->name ?? 'منتج محذوف' }}</h6>
                                                @if($item->product)
                                                    <small class="text-muted"><a href="{{ route('product.show', $item->product->slug) }}" target="_blank" class="text-decoration-none text-muted">عرض المنتج <i class="fas fa-external-link-alt ms-1"></i></a></small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td class="text-center"><span class="badge bg-light text-dark border px-3 py-2 fs-6">{{ $item->quantity }}</span></td>
                                    <td class="text-end pe-4 fw-bold text-success fs-5">${{ number_format($item->price * $item->quantity, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-light">
                                <tr>
                                    <td colspan="3" class="text-end py-3 fw-bold fs-5">المجموع الكلي:</td>
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