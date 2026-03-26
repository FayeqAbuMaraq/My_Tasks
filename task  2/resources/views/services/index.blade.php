<x-app-layout>
    <!-- Header Section -->
    <div class="bg-dark py-5 mb-5 text-white">
        <div class="container text-center">
            <h1 class="fw-bold display-5">خدماتنا وحلولنا</h1>
            <p class="lead text-white-50">اكتشف أحدث التقنيات والخدمات التي نقدمها لعيادتك</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row g-4">
            @forelse($services as $service)
                <div class="col-md-6 col-lg-3">
                    <div class="product-card position-relative overflow-hidden shadow-sm rounded-4">
                        
                        <div class="position-absolute top-0 end-0 m-2" style="z-index: 5;">
                            <span class="badge bg-white text-success rounded-pill px-3 py-2 shadow-sm fw-bold border border-success border-opacity-10">
                                {{ $service->price }} ₪
                            </span>
                        </div>

                        <div class="product-img-container" style="height: 200px;">
                            <a href="{{ route('services.show', $service->slug) }}"> 
                                @if($service->image)
                                    <img src="{{ asset('storage/' . $service->image) }}" class="w-100 h-100 object-fit-cover" alt="{{ $service->name }}">
                                @else
                                    <img src="{{ asset('img/11.jpeg') }}" class="w-100 h-100 object-fit-cover" alt="Default Image">
                                @endif
                            </a>
                        </div>

                        <!-- معلومات المنتج -->
                        <div class="product-info p-3 text-center bg-white">
                            <h5 class="product-title fw-bold mb-1">
                                <a href="{{ route('services.show', $service->slug) }}" class="text-decoration-none text-dark">
                                    {{ $service->name }}
                                </a>
                            </h5>
                            <p class="small text-muted mb-0">{{ Str::limit($service->description, 50) }}</p>
                            
                            <!-- رابط سريع للطلب -->
                            <div class="mt-3">
                                <a href="{{ route('orders.create', ['service_id' => $service->id]) }}" class="btn btn-sm btn-outline-success rounded-pill px-3">
                                    اطلب الآن
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted italic">لا توجد خدمات مضافة حالياً.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>