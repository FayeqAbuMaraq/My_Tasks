<x-app-layout>
    <div class="container py-5">
        <h2 class="fw-bold mb-5 text-center">إتمام الطلب 📦</h2>

        <div class="row g-5">
            <div class="col-lg-7">
                <h4 class="mb-3 fw-bold text-success">بيانات التوصيل</h4>
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-bold small">الاسم الكامل</label>
                                <input type="text" name="customer_name" class="form-control bg-light border-0" value="{{ Auth::check() ? Auth::user()->name : old('customer_name') }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small">البريد الإلكتروني</label>
                                <input type="email" name="customer_email" class="form-control bg-light border-0" value="{{ Auth::check() ? Auth::user()->email : old('customer_email') }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small">رقم الهاتف (واتساب للتواصل)</label>
                                <input type="text" name="customer_phone" class="form-control bg-light border-0" value="{{ Auth::check() ? Auth::user()->phone : old('customer_phone') }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small">العنوان بالتفصيل</label>
                                <textarea name="address" class="form-control bg-light border-0" rows="3" placeholder="المدينة، الشارع، رقم المبنى..." required>{{ Auth::check() ? Auth::user()->address : old('address') }}</textarea>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="alert alert-info border-0 rounded-3 d-flex align-items-center" role="alert">
                            <i class="fas fa-money-bill-wave fs-4 me-3"></i>
                            <div>
                                <strong>طريقة الدفع:</strong> الدفع نقداً عند الاستلام (COD).
                                <div class="small">ستدفع للمندوب عند وصول الطلب إليك.</div>
                            </div>
                        </div>

                        <button class="btn btn-primary w-100 btn-lg fw-bold mt-3" type="submit" style="background-color: var(--primary-green); border: none;">
                            تأكيد الطلب <i class="fas fa-check-circle ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- ملخص السلة -->
            <div class="col-lg-5">
                <h4 class="mb-3 fw-bold text-muted">ملخص سلتك</h4>
                <div class="card border-0 shadow-sm rounded-4">
                    <ul class="list-group list-group-flush rounded-4">
                        @foreach($cart as $item)
                        <li class="list-group-item d-flex justify-content-between lh-sm py-3">
                            <div class="d-flex align-items-center">
                                <div class="position-relative me-3">
                                    <img src="{{ asset('storage/' . $item['image']) }}" class="rounded border" width="50" height="50" style="object-fit: cover;">
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">{{ $item['quantity'] }}</span>
                                </div>
                                <div>
                                    <h6 class="my-0 fw-bold">{{ $item['name'] }}</h6>
                                    <small class="text-muted">سعر الوحدة: ${{ number_format($item['price'], 2) }}</small>
                                </div>
                            </div>
                            <span class="text-muted fw-bold">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                        </li>
                        @endforeach
                        
                        <li class="list-group-item d-flex justify-content-between bg-light py-3">
                            <div class="text-success">
                                <h6 class="my-0 fw-bold">الإجمالي الكلي</h6>
                            </div>
                            <span class="text-success fw-bold fs-5">${{ number_format($total, 2) }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>