<x-app-layout>
    
    <!-- هيدر القسم -->
    <div class="bg-light py-5 mb-5" style="background-image:  url('{{ asset('storage/' . $category->image) }}'); background-size: cover; background-position: center; position: relative;">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
        
        <div class="container position-relative z-1 text-center text-white">
            <h1 class="fw-bold display-4">{{ $category->name }}</h1>
            <p class="lead opacity-75">تصفح أفضل المنتجات في قسم {{ $category->name }}</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="d-flex justify-content-between align-items-center mb-4 p-3 bg-white rounded shadow-sm border border-light">
            <span class="text-muted fw-bold">تم العثور على {{ $products->total() }} منتج</span>
            <div class="d-flex gap-2">
                <select class="form-select form-select-sm border-0 bg-light fw-bold" style="width: 150px;">
                    <option selected>الأحدث</option>
                    <option value="1">الأعلى سعراً</option>
                    <option value="2">الأقل سعراً</option>
                </select>
            </div>
        </div>

        <div class="row g-4">
            @forelse($products as $product)
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 bg-white border-0 shadow-sm rounded-4 overflow-hidden position-relative product-card-hover">
                    @if($product->sale_price)
                        <div class="position-absolute top-0 end-0 m-3 z-2"><span class="badge bg-danger px-3 py-2 rounded-pill">خصم</span></div>
                    @endif
                    
                    <div style="height: 220px; overflow: hidden; padding: 20px; display:flex; align-items:center; justify-content:center;">
                        <a href="{{ route('product.show', $product->slug) }}">
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid transition-transform" style="max-height: 100%; object-fit: contain;" alt="{{ $product->name }}">
                        </a>
                    </div>
                    
                    <div class="card-body d-flex flex-column pt-0">
                        <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none text-dark">
                            <h5 class="card-title fw-bold text-truncate">{{ $product->name }}</h5>
                        </a>
                        <p class="text-muted small mb-3 text-truncate">{{ $product->short_description }}</p>
                        
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                @if($product->sale_price)
                                    <div>
                                        <span class="price fs-5 text-danger fw-bold">${{ number_format($product->sale_price, 2) }}</span>
                                        <span class="text-muted text-decoration-line-through small ms-1">${{ number_format($product->price, 2) }}</span>
                                    </div>
                                @else
                                    <span class="price fs-5 fw-bold">${{ number_format($product->price, 2) }}</span>
                                @endif
                            </div>
                            <button class="btn-add-cart w-100">
                                <i class="fas fa-cart-plus me-1"></i> <span>أضف للسلة</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="py-5">
                    <i class="fas fa-box-open fa-4x text-muted mb-3 opacity-25"></i>
                    <h4 class="text-muted fw-bold">عذراً، لا توجد منتجات في هذا القسم حالياً.</h4>
                    <a href="{{ route('home') }}" class="btn btn-outline-success mt-3 rounded-pill px-4">العودة للرئيسية</a>
                </div>
            </div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>