<x-app-layout>
    <div class="container py-5">
        
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('services.index') }}" class="text-decoration-none text-muted">الخدمات</a></li>
                <li class="breadcrumb-item active text-success fw-bold" aria-current="page">{{ $service->name }}</li>
            </ol>
        </nav>

        <div class="row g-5">
            <!-- تفاصيل الخدمة -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                    @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" class="w-100 object-fit-cover" style="height: 400px;" alt="{{ $service->name }}">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center text-muted" style="height: 400px;">
                            <i class="fas fa-tooth fa-5x opacity-25"></i>
                        </div>
                    @endif
                    
                    <div class="card-body p-4 p-lg-5">
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <h1 class="fw-bold text-dark mb-0">{{ $service->name }}</h1>
                            <span class="badge bg-success fs-5 px-3 py-2 rounded-pill shadow-sm">{{ $service->price }} ₪</span>
                        </div>
                        
                        <h5 class="fw-bold text-success mb-3">وصف الخدمة</h5>
                        <div class="text-muted lh-lg mb-5" style="white-space: pre-line;">
                            {{ $service->description ?? 'لا يوجد وصف متاح لهذه الخدمة حالياً.' }}
                        </div>

                        <!-- أزرار الإجراءات -->
                        <div class="d-flex gap-3">
                            <a href="{{ route('orders.create', ['service_id' => $service->id]) }}" class="btn btn-success btn-lg rounded-pill fw-bold px-5 flex-grow-1">
                                <i class="fas fa-cart-plus me-2"></i> اطلب هذه الخدمة
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- القائمة الجانبية (خدمات أخرى) -->
            <div class="col-lg-5">
                <div class="bg-light p-4 rounded-4 border">
                    <h5 class="fw-bold mb-4">خدمات قد تهمك أيضاً</h5>
                    <div class="d-flex flex-column gap-3">
                        {{-- تم تغيير $service إلى $related_services هنا --}}
                        @forelse($related_services as $related)
                            <a href="{{ route('services.show', $related->slug) }}" class="card border-0 shadow-sm rounded-3 text-decoration-none text-dark hover-shadow transition-all">
                                <div class="card-body d-flex align-items-center p-3">
                                    <div class="rounded-3 overflow-hidden flex-shrink-0" style="width: 70px; height: 70px;">
                                        @if($related->image)
                                            <img src="{{ asset('storage/' . $related->image) }}" class="w-100 h-100 object-fit-cover">
                                        @else
                                            <div class="w-100 h-100 bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center">
                                                <i class="fas fa-tooth text-muted"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ms-3 flex-grow-1">
                                        <h6 class="fw-bold mb-1">{{ $related->name }}</h6>
                                        <small class="text-success fw-bold">{{ $related->price }} ₪</small>
                                    </div>
                                    <div class="text-muted">
                                        <i class="fas fa-chevron-left small"></i>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-center text-muted py-3">لا توجد خدمات أخرى حالياً.</p>
                        @endforelse
                    </div>
                    
                    <div class="mt-4 pt-4 border-top text-center">
                        <p class="text-muted small mb-3">هل تحتاج لمساعدة في اختيار الخدمة المناسبة؟</p>
                        <a href="https://wa.me/رقمك" class="btn btn-outline-dark rounded-pill w-100">تواصل مع الدعم الفني</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>