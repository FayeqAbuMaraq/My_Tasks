<x-app-layout>
    <div class="container py-5">
        <h2 class="fw-bold mb-4 text-center">سلة المشتريات 🛒</h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(count($cart) > 0)
            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="ps-4 py-3" style="width: 40%">المنتج</th>
                                        <th class="py-3" style="width: 20%">السعر</th>
                                        <th class="py-3" style="width: 20%">الكمية</th>
                                        <th class="py-3 text-center" style="width: 20%">الإجمالي</th>
                                        <th class="py-3"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $id => $details)
                                        <tr data-id="{{ $id }}">
                                            <td class="ps-4">
                                                <div class="d-flex align-items-center">
                                                    <img  src="{{ asset('storage/' . $details['image']) }}" class="rounded border me-3" style="width: 70px; height: 70px; object-fit: cover;">
                                                    <div>
                                                        <h6 class="fw-bold mb-0 text-dark">{{ $details['name'] }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="fw-bold text-muted">${{ number_format($details['price'], 2) }}</td>
                                            <td>
                                                <input type="number" value="{{ $details['quantity'] }}" class="form-control text-center quantity cart_update" min="1" style="width: 80px;">
                                            </td>
                                            <td class="fw-bold text-success text-center">${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                                            <td class="text-end pe-4">
                                                <button class="btn btn-sm btn-outline-danger cart_remove"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="card border-0 shadow-sm rounded-4 bg-light">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">ملخص الطلب</h5>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">المجموع الفرعي</span>
                                <span class="fw-bold">${{ number_format($total, 2) }}</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <span class="fw-bold fs-5">الإجمالي</span>
                                <span class="fw-bold fs-5 text-success">${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="d-grid gap-2">
                                <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-lg fw-bold" style="background-color: var(--primary-green); border: none;">إتمام الشراء <i class="fas fa-check-circle ms-2"></i></a>
                                <a href="{{ route('home') }}" class="btn btn-outline-secondary fw-bold">متابعة التسوق</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-shopping-cart fa-4x text-muted mb-3 opacity-50"></i>
                <h4 class="text-muted">السلة فارغة حالياً</h4>
                <a href="{{ route('home') }}" class="btn btn-outline-success mt-3 rounded-pill px-4">ابدأ التسوق الآن</a>
            </div>
        @endif
    </div>

    @section('scripts')
    <script type="module">
        $(".cart_update").change(function (e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('cart.update') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id"), 
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                   window.location.reload();
                }
            });
        });

        $(".cart_remove").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("هل أنت متأكد من حذف هذا المنتج؟")) {
                $.ajax({
                    url: '{{ route('cart.remove') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
    @endsection
</x-app-layout>