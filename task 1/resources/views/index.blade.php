<x-app-layout>

    <div class="container py-4">
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="hero-banner large d-flex align-items-end" 
                     style="height: 400px; background-color: #e9ecef; background-image: url('{{ asset('images/iPhone-16.jpg') }}'); background-size: cover; border-radius: 12px; position: relative;">
                    <div class="banner-content p-4 bg-white bg-opacity-90 rounded m-4 shadow-sm" style="max-width: 350px;">
                        <h2 class="fw-bold mb-2">الوان مميزة ومتعددة</h2>
                        <p class="text-muted mb-4 fs-5">مع أحدث أجهزة iPhone</p>
                        <a href="{{ url('category/mobile-phones') }}" class="hero-btn hero-btn-primary">التسوق الان</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex flex-column gap-3">
                <div class="hero-banner small d-flex align-items-end" 
                     style="height: 190px; background-color: #dee2e6; background-image: url('{{ asset('images/photo-5.jpg') }}'); background-size: cover; border-radius: 12px; position: relative;">
                    <div class="banner-content p-3 bg-white bg-opacity-90 rounded m-3 shadow-sm">
                        <h5 class="fw-bold mb-2">احدث الساعات</h5>
                        <a href="{{ url('category/smart-watches') }}" class="hero-btn hero-btn-dark btn-sm">تسوق الآن</a>
                    </div>
                </div>
                <div class="hero-banner small d-flex align-items-end" 
                     style="height: 190px; background-color: #dee2e6; background-image: url('{{ asset('images/photo-14.jpg') }}'); background-size: cover; border-radius: 12px; position: relative;">
                    <div class="banner-content p-3 bg-white bg-opacity-90 rounded m-3 shadow-sm">
                        <h5 class="fw-bold mb-2">حماية كاملة</h5>
                        <a href="{{ url('category/mobile-phones') }}" class="hero-btn hero-btn-dark btn-sm">اطلب الآن</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <h3 class="section-title">مقترحة لك</h3>
        <div class="row g-4">
            @forelse($featuredProducts as $product)
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 bg-white border-0 shadow-sm rounded-4 overflow-hidden position-relative">
                    <div style="height: 220px; overflow: hidden; padding: 20px; display:flex; align-items:center; justify-content:center;">
                        <a href="{{ route('product.show', $product->slug) }}">
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" style="max-height: 100%; object-fit: contain;" alt="{{ $product->name }}">
                        </a>
                    </div>
                    <div class="card-body d-flex flex-column pt-0">
                        <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none text-dark">
                            <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                        </a>
                        <p class="text-muted small mb-3">{{ $product->short_description }}</p>
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="price fs-5">${{ number_format($product->price, 2) }}</span>
                            </div>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn-add-cart w-100">
                                    <i class="fas fa-cart-plus"></i>
                                    <span>أضف إلى السلة</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">لا توجد منتجات مقترحة حالياً.</p>
            </div>
            @endforelse
        </div>
    </div>

    <div class="container py-4">
        <div class="row g-3 text-center">
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-3 shadow-sm h-100 d-flex flex-column justify-content-center align-items-center border border-light">
                    <div class="mb-3" style="color: var(--primary-green); font-size: 2.5rem;"><i class="fas fa-gamepad"></i></div>
                    <h5 class="fw-bold">اكسسوارات اللعب</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-3 shadow-sm h-100 d-flex flex-column justify-content-center align-items-center border border-light">
                    <div class="mb-3" style="color: var(--primary-green); font-size: 2.5rem;"><i class="fas fa-spa"></i></div>
                    <h5 class="fw-bold">أجهزة التدليك والاسترخاء</h5>
                    <p class="text-muted mb-0 small">910 TIYT</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-3 shadow-sm h-100 d-flex flex-column justify-content-center align-items-center border border-light">
                    <div class="mb-3" style="color: var(--primary-green); font-size: 2.5rem;"><i class="fas fa-plug"></i></div>
                    <h5 class="fw-bold">اكسسوارات الكترونية</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
        @if($flashSaleProducts->count() > 0)
        <div class="flash-sale-section px-4 py-5 rounded-4 position-relative overflow-hidden" style="background: linear-gradient(45deg, #fff3cd 0%, #fff8e1 100%);">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <div>
                    <h3 class="mb-1 fw-bold text-dark"><i class="fas fa-bolt text-danger me-2"></i>Flash Sale</h3>
                    <p class="text-danger mb-0 fw-bold">خصومات لفترة محدودة جداً</p>
                </div>
                <div dir="ltr" class="d-flex gap-2 align-items-center">
                    <span class="badge bg-dark rounded-3 p-3 fs-5">02</span> <span class="fw-bold">:</span>
                    <span class="badge bg-dark rounded-3 p-3 fs-5">45</span> <span class="fw-bold">:</span>
                    <span class="badge bg-dark rounded-3 p-3 fs-5">30</span>
                </div>
                <a href="#" class="btn btn-outline-danger rounded-pill px-4 fw-bold">عرض الكل</a>
            </div>
            
            <div class="row g-4">
                @foreach($flashSaleProducts as $product)
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4">
                        <div class="position-absolute top-0 end-0 m-3 z-2"><span class="badge bg-danger px-3 py-2 rounded-pill">Sale</span></div>
                        <div style="height: 200px; padding: 20px; display:flex; align-items:center; justify-content:center;">
                            <a href="{{ route('product.show', $product->slug) }}">
                                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" style="max-height: 100%; object-fit: contain;" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none text-dark">
                                <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                            </a>
                            <p class="text-muted small mb-2">{{ $product->short_description }}</p>
                            <div class="mt-auto">
                                <p class="price mb-3 text-danger fw-bold fs-5">
                                    ${{ number_format($product->sale_price, 2) }} 
                                    <span class="text-muted text-decoration-line-through small ms-2 fs-6 fw-normal">${{ number_format($product->price, 2) }}</span>
                                </p>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button class="btn-add-cart btn-danger">
                                    <i class="fas fa-cart-plus"></i>
                                    <span>أضف إلى السلة</span>
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    <div class="container py-5">
        <div class="bg-white p-4 rounded-4 shadow-sm">
            <div class="row text-center g-4">
                <div class="col-md-3">
                    <div class="p-2">
                        <i class="fas fa-store mb-3" style="color: var(--primary-green); font-size: 2.5rem;"></i>
                        <h5 class="fw-bold">منصة موثوقة</h5>
                        <p class="text-muted small">تسوق آمن وموثوق 100%</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-2">
                        <i class="fas fa-shield-alt mb-3" style="color: var(--primary-green); font-size: 2.5rem;"></i>
                        <h5 class="fw-bold">دفع آمن</h5>
                        <p class="text-muted small">بوابات دفع مشفرة بالكامل</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-2">
                        <i class="fas fa-medal mb-3" style="color: var(--primary-green); font-size: 2.5rem;"></i>
                        <h5 class="fw-bold">كفالة ذهبية</h5>
                        <p class="text-muted small">ضمان لمدة سنة على الأجهزة</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-2">
                        <i class="fas fa-check-circle mb-3" style="color: var(--primary-green); font-size: 2.5rem;"></i>
                        <h5 class="fw-bold">منتجات أصلية</h5>
                        <p class="text-muted small">منتجات أصلية 100%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="section-title mb-0">أحدث المنتجات</h3>
            <a href="#" class="text-decoration-none fw-bold" style="color: var(--primary-green);">عرض الجميع <i class="fas fa-angle-left ms-1"></i></a>
        </div>
        
        <div class="row g-4">
            @forelse($latestProducts as $product)
            <div class="col-6 col-md-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <div style="height: 180px; padding: 15px; display:flex; align-items:center; justify-content:center;">
                        <a href="{{ route('product.show', $product->slug) }}">
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" style="max-height: 100%; object-fit: contain;">
                        </a>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none text-dark">
                            <h6 class="card-title fw-bold">{{ $product->name }}</h6>
                        </a>
                        <p class="price small mb-2">${{ number_format($product->price, 2) }}</p>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn-add-cart w-100">
                                    <i class="fas fa-cart-plus"></i>
                                    <span>أضف إلى السلة</span>
                                </button>
                            </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12"><p class="text-muted text-center">لا توجد منتجات مضافة حديثاً.</p></div>
            @endforelse
        </div>
    </div>
    
    <div class="container py-4">
        <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm position-relative overflow-hidden border border-light">
            <div class="position-absolute top-0 end-0 h-100" style="width: 6px; background-color: var(--primary-green);"></div>
            
            <div class="row align-items-center">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <h4 class="fw-bold mb-2">شاركنا تجربتك</h4>
                    <p class="text-muted small mb-0">رأيك يهمنا ويساعدنا في تحسين خدماتنا</p>
                </div>

                <div class="col-lg-8">
                    @auth
                        @if(session('success'))
                            <div class="alert alert-success d-flex align-items-center p-3 mb-3 border-0 shadow-sm rounded-3" role="alert" style="background-color: #d1e7dd; color: #0f5132;">
                                <i class="fas fa-check-circle fs-4 me-3" style="color: #198754;"></i>
                                <div>
                                    <h6 class="fw-bold mb-0">شكراً لك!</h6>
                                    <small>{{ session('success') }}</small>
                                </div>
                            </div>
                        @else
                            <form action="{{ route('review.store') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-5">
                                        <label class="form-label fw-bold small">التقييم</label>
                                        <div class="star-rating" dir="ltr">
                                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="ممتاز"></label>
                                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="جيد جداً"></label>
                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="جيد"></label>
                                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="مقبول"></label>
                                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="سيء"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold small">تعليقك</label>
                                        <textarea name="content" class="form-control shadow-none" rows="2" placeholder="اكتب رأيك هنا..." style="border-color: #eee; resize: none;"></textarea>
                                    </div>
                                    <div class="col-12 text-start">
                                        <button type="submit" class="btn btn-primary text-white fw-bold px-4" style="background-color: var(--primary-green); border: none;">
                                            نشر التقييم <i class="fas fa-paper-plane me-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    @else
                        <div class="d-flex align-items-center justify-content-center p-4 bg-light rounded-3 border border-dashed">
                            <div class="text-center">
                                <i class="fas fa-user-lock text-muted mb-2 fs-4"></i>
                                <p class="text-muted mb-3 small">يرجى تسجيل الدخول لتتمكن من إضافة تقييمك</p>
                                <a href="{{ route('login') }}" class="btn btn-outline-success btn-sm fw-bold px-4">تسجيل الدخول</a>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <h3 class="section-title text-center mx-auto mb-5" style="width: fit-content; border-right: none; border-bottom: 4px solid var(--primary-green); padding-bottom: 10px;">ماذا يقول عملاؤنا</h3>
        <div class="row g-4">
            @forelse($testimonials as $testimonial)
            <div class="col-md-6 col-lg-3">
                <div class="bg-white p-4 rounded-3 shadow-sm text-center h-100">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <div class="rounded-circle bg-{{ $testimonial->avatar_color ?? 'primary' }} text-white d-flex align-items-center justify-content-center fw-bold" style="width: 50px; height: 50px;">
                            {{ mb_substr($testimonial->name, 0, 1) }}
                        </div>
                        <div class="ms-2 text-end">
                            <h6 class="mb-0 fw-bold">{{ $testimonial->name }}</h6>
                            <small class="text-muted">{{ $testimonial->created_at ? $testimonial->created_at->format('Y, M') : 'غير محدد' }}</small>                        </div>
                    </div>
                    <p class="fst-italic">"{{ $testimonial->content }}"</p>
                    <div class="text-warning">
                        @for($i=1; $i<=5; $i++)
                            @if($i <= $testimonial->rating)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12"><p class="text-center text-muted">لا توجد تقييمات بعد.</p></div>
            @endforelse
        </div>
    </div>

</x-app-layout>
