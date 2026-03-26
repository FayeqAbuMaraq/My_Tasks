<x-app-layout>
    <div class="container py-5">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row g-5">
            <div class="col-lg-6">
                <div class="border rounded-4 p-3 bg-white shadow-sm position-relative">
                    @if($product->sale_price)
                        <span class="badge bg-danger position-absolute top-0 end-0 m-3 px-3 py-2">عرض خاص</span>
                    @endif
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid w-100 rounded-3" alt="{{ $product->name }}" style="object-fit: contain; max-height: 500px;">
                </div>
            </div>

            <div class="col-lg-6">
                <h1 class="fw-bold mb-2">{{ $product->name }}</h1>
                <p class="text-muted mb-3">{{ $product->short_description }}</p>
                
                <div class="mb-3 text-warning">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    <span class="text-muted small text-black ms-2">(4.5 تقييم)</span>
                </div>

                <!-- السعر -->
                <div class="mb-4">
                    @if($product->sale_price)
                        <h2 class="text-danger fw-bold d-inline-block me-2">${{ number_format($product->sale_price, 2) }}</h2>
                        <span class="text-muted text-decoration-line-through fs-5">${{ number_format($product->price, 2) }}</span>
                    @else
                        <h2 class="fw-bold" style="color: var(--text-black);">${{ number_format($product->price, 2) }}</h2>
                    @endif
                </div>

                <p class="text-secondary lh-lg mb-4">
                    {{ $product->description ?? 'لا يوجد وصف تفصيلي لهذا المنتج حالياً. ولكننا نضمن لك جودة عالية وأداء ممتاز مع كفالة المتجر.' }}
                </p>

                <!-- أزرار الإجراءات -->
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="input-group" style="width: 140px;">
                        <button class="btn btn-outline-secondary" type="button" onclick="decrementQuantity()"><i class="fas fa-minus"></i></button>
                        <input type="text" id="quantity" class="form-control text-center bg-white" value="1" readonly>
                        <button class="btn btn-outline-secondary" type="button" onclick="incrementQuantity()"><i class="fas fa-plus"></i></button>
                    </div>
                </div>

                <button class="btn btn-add-cart py-3 fs-5 shadow-sm">
                    <i class="fas fa-cart-plus fa-lg"></i>
                    <span>إضافة إلى السلة</span>
                </button>

                <!-- معلومات إضافية -->
                <div class="row mt-4 g-3">
                    <div class="col-6">
                        <div class="d-flex align-items-center p-3 border rounded-3 bg-light">
                            <i class="fas fa-truck text-success fs-3 ms-3"></i>
                            <div>
                                <small class="d-block text-muted">التوصيل</small>
                                <span class="fw-bold small">شحن سريع ومجاني</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center p-3 border rounded-3 bg-light">
                            <i class="fas fa-shield-alt text-success fs-3 ms-3"></i>
                            <div>
                                <small class="d-block text-muted">الضمان</small>
                                <span class="fw-bold small">كفالة لمدة سنة</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products Section (منتجات مشابهة) -->
        <div class="mt-5 pt-5 border-top">
            <h3 class="section-title mb-4">منتجات مشابهة قد تعجبك</h3>
            <div class="row g-4">
                @forelse($relatedProducts as $related)
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 bg-white border-0 shadow-sm rounded-4 overflow-hidden position-relative">
                         <a href="{{ route('product.show', $related->slug) }}" class="stretched-link"></a> <!-- يجعل الكرت كله قابل للنقر -->
                        <div style="height: 200px; padding: 20px; display:flex; align-items:center; justify-content:center;">
                            <img src="{{ asset('storage/' . $related->image) }}" class="img-fluid" style="max-height: 100%; object-fit: contain;">
                        </div>
                        <div class="card-body pt-0">
                            <h6 class="card-title fw-bold text-dark text-truncate">{{ $related->name }}</h6>
                            <p class="price small mb-2 text-primary fw-bold" style="color: var(--primary-green) !important;">
                                ${{ number_format($related->price, 2) }}
                            </p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12"><p class="text-muted">لا توجد منتجات مشابهة حالياً.</p></div>
                @endforelse
            </div>
        </div>
    </div>


    <script>
        function incrementQuantity() {
            var value = parseInt(document.getElementById('quantity').value, 10);
            value = isNaN(value) ? 0 : value;
            document.getElementById('quantity').value = value + 1;
        }
        function decrementQuantity() {
            var value = parseInt(document.getElementById('quantity').value, 10);
            if(value > 1) {
                document.getElementById('quantity').value = value - 1;
            }
        }
    </script>
</x-app-layout>