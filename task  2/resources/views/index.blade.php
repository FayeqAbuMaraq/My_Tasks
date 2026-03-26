<x-app-layout>
<!-- ================= HERO ================= -->
<section class="hero-section">
<div class="container">
    <div class="row align-items-center g-5">

    <div class="col-lg-6 order-lg-2">
        <img src="{{ asset('img/woman-patient-dentist.jpg') }}" 
            loading="lazy" 
            class="img-fluid rounded-4 shadow-lg hero-img w-100" 
            alt="مختبر الأسنان الرقمي">
    </div>

    <div class="col-lg-6 order-lg-1">
        <div class="hero-box">
        <h1>
            مختبر الأسنان الرقمي<br>
            مع التواصل في الوقت الحقيقي
        </h1>
        <p>
            نحن نعمل على تمكين الآلاف من عيادات طب الأسنان من خلال تدفقات عمل مبتكرة لتعزيز رعاية المرضى وإحداث ثورة في طريقة فحصهم وطلبهم والتعاون في العمل المختبري.
        </p>
        <div class="hero-actions">
            <a href="#contact" class="btn btn-light text-success fw-bold btn-lg px-4">ابدأ الآن</a>
            <a href="#" class="btn btn-outline-light fw-bold btn-lg px-4"><i class="fas fa-play-circle me-2"></i> شاهد الفيديو</a>
        </div>
        </div>
    </div>

    </div>
</div>
</section>

<!-- ================= FEATURES ================= -->
<section class="features-section">
<div class="container">
    <h2 class="section-title">تعزيز مستقبل طب الأسنان الرقمي</h2>
    <p class="section-desc">
    لا يمكن تحقيق ترميمات متسقة وملائمة إلا من خلال التواصل القوي. في الازورد، قمنا بتطوير طرق مبتكرة للتعاون مع أطباء الأسنان.
    </p>

    <div class="row g-4">
    <div class="col-md-6 col-lg-3">
        <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-comments"></i></div>
        <h5>سير العمل التعاوني</h5>
        <p class="text-muted">احصل على مراجعات المسح في الوقت الفعلي واعتمد تصميمات الحالات ثلاثية الأبعاد للتحكم النهائي.</p>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-cubes"></i></div>
        <h5>منتجات مبتكرة</h5>
        <p class="text-muted">خدمات تغير قواعد اللعبة مثل التيجان لمدة 5 أيام، وأطقم الأسنان ذات الموعدين.</p>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-laptop-medical"></i></div>
        <h5>مختبر رقمي بالكامل</h5>
        <p class="text-muted">يمكنك الوصول إلى فنيينا ذوي المستوى العالمي المجهزين بأحدث تقنيات طب الأسنان.</p>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-headset"></i></div>
        <h5>خبرة عند الطلب</h5>
        <p class="text-muted">احصل على إرشادات ودعم الخبراء السريريين عبر الهاتف أو الرسائل أو الدردشة المباشرة.</p>
        </div>
    </div>
    </div>
</div>
</section>

<!-- ================= PRODUCTS ================= -->
<section class="products-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">خدماتنا المتميزة</h2>
            <p class="text-muted">نقدم مجموعة واسعة من الحلول الرقمية لعيادات الأسنان</p>
        </div>
        
        <div class="row g-4">
            @forelse($services as $service)
                <div class="col-md-6 col-lg-3">
                    <div class="product-card position-relative overflow-hidden shadow-sm rounded-4">
                        
                        <!-- ملصق السعر: يظهر دائماً -->
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

    <div class="text-center mt-5">
    <a class="btn btn-outline-success btn-lg px-5 fw-bold">استكشف جميع المنتجات</a>
    </div>
</section>


<!-- ================= STATS ================= -->
<section class="stats-section">
<div class="container">
    <div class="text-center mb-5">
        <h3 class="text-white">الآلاف من الممارسات تثق في الازورد</h3>
    </div>
    <div class="row text-center">
    <div class="col-md-4 mb-4 mb-md-0">
        <div class="stat-item">
            <h3>50K+</h3>
            <p>تقييمات 5 نجوم</p>
        </div>
    </div>
    <div class="col-md-4 mb-4 mb-md-0">
        <div class="stat-item">
            <h3>$30K</h3>
            <p>تم توفيرها للعيادات مقدماً</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-item">
            <h3>1.5M+</h3>
            <p>ابتسامة سعيدة تم تسليمها</p>
        </div>
    </div>
    </div>
</div>
</section>

<!-- ================= LEAD FORM ================= -->
<section class="lead-section py-5" id="contact">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4" style="color: #0f3d34; font-size: 2.8rem; line-height: 1.3;">
                    قم بتحويل ممارساتك <br>
                    باستخدام <span style="color: #198754;">سير عمل رقمي مثبت</span>
                </h2>
                
                <p class="mb-5" style="color: #555; font-size: 1.15rem; line-height: 1.8;">
                    الشريك الرقمي المتكامل لتحسين تجربة المريض، والحلول السريرية، ونمو الأعمال. 
                    انضم إلى الآلاف من أطباء الأسنان الذين يثقون في لازورد.
                </p>

                <ul class="list-unstyled m-0">
                    @php
                        $features = [
                            'ماسح ضوئي داخل الفم مجانًا',
                            'تدريب ودعم فني غير محدود',
                            'سير عمل رقمي متكامل وفعّال',
                            'تحكم كامل في النتائج النهائية'
                        ];
                    @endphp
                    @foreach($features as $feature)
                    <li class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-circle" style="color: #198754; font-size: 1.4rem; margin-left: 15px;"></i>
                        <span class="fw-bold" style="color: #0f3d34; font-size: 1.1rem;">{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-6">
                <div class="lead-card p-4 shadow-lg rounded-4 bg-white border">
                    @if(session('success'))
                        <div class="alert alert-success border-0 shadow-sm rounded-3">
                            <i class="fas fa-paper-plane me-2"></i> {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('leads.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">الاسم الأول</label>
                                <input name="first_name" class="form-control" placeholder="الاسم الأول" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">اسم العائلة</label>
                                <input name="last_name" class="form-control" placeholder="اسم العائلة" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">البريد الإلكتروني</label>
                                <input name="email" class="form-control" type="email" placeholder="name@example.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">رقم الهاتف</label>
                                <input name="phone" class="form-control" placeholder="+970" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">اسم العيادة</label>
                                <input name="clinic_name" class="form-control" placeholder="اسم العيادة" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">الدور الوظيفي</label>
                                <select name="role" class="form-select" required>
                                    <option value="" selected disabled>اختر دورك...</option>
                                    <option value="doctor">طبيب أسنان</option>
                                    <option value="assistant">مساعد</option>
                                    <option value="manager">مدير عيادة</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100 mt-4 py-3 fs-5 shadow-sm rounded-3 fw-bold">
                            ابدأ اليوم <i class="fas fa-arrow-left ms-2"></i>
                        </button>
                        <p class="form-note text-center mt-3 text-muted small">
                            بإرسال النموذج أوافق على شروط الاستخدام وسياسة الخصوصية.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= BENEFITS SECTION ================= -->
<section class="benefits-section" style="padding: 100px 0; background-color: #fff;">
<div class="container">
    <div class="row align-items-center g-5">
    
    <!-- الصورة الجانبية -->
    <div class="col-lg-6">
        <img src="{{ asset('img/1.jpg') }}" 
            class="img-fluid rounded-4 shadow-lg w-100" 
            alt="نتائج أفضل"
            style="object-fit: cover; min-height: 400px;">
    </div>

    <!-- المحتوى النصي -->
    <div class="col-lg-6">
        <h2 class="fw-bold mb-5 text-start" style="color: #0f3d34; line-height: 1.4; font-size: 2.5rem;">
        تحقيق نتائج أفضل <br>لممارستك ومرضاك
        </h2>
        
        <!-- الميزة 1 -->
        <div class="d-flex mb-4">
        <div class="flex-shrink-0">
            <div style="width: 55px; height: 55px; background-color: #e6f4f1; color: #0f3d34; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.4rem;">
            <i class="fas fa-heart-pulse"></i>
            </div>
        </div>
        <div class="flex-grow-1 ms-3 me-3">
            <h5 class="fw-bold mb-2" style="color: #0f3d34;">تحسين تجربة المريض</h5>
            <p class="text-muted mb-0" style="line-height: 1.6;">
            ارفع مستوى رعاية المرضى من خلال ابتكارات مثل أطقم الأسنان ذات الموعدين، والأجزاء الجزئية المباشرة إلى النهاية، والماسح الصوتي رقم 1 في طب الأسنان الترميمي.
            </p>
        </div>
        </div>

        <!-- الميزة 2 -->
        <div class="d-flex mb-4">
        <div class="flex-shrink-0">
            <div style="width: 55px; height: 55px; background-color: #e6f4f1; color: #0f3d34; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.4rem;">
            <i class="fas fa-chart-line"></i>
            </div>
        </div>
        <div class="flex-grow-1 ms-3 me-3">
            <h5 class="fw-bold mb-2" style="color: #0f3d34;">زيادة القدرة على التنبؤ بالعلاج</h5>
            <p class="text-muted mb-0" style="line-height: 1.6;">
            استخدم أدوات المسح المتقدمة لتصور التصميمات الرقمية والموافقة عليها، وتعزيز قبول الحالة، وتقديم نتائج ناجحة للمرضى مع التحكم المطلق.
            </p>
        </div>
        </div>

        <!-- الميزة 3 -->
        <div class="d-flex">
        <div class="flex-shrink-0">
            <div style="width: 55px; height: 55px; background-color: #e6f4f1; color: #0f3d34; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.4rem;">
            <i class="fas fa-user-graduate"></i>
            </div>
        </div>
        <div class="flex-grow-1 ms-3 me-3">
            <h5 class="fw-bold mb-2" style="color: #0f3d34;">تطوير مهارات كل عضو من الموظفين</h5>
            <p class="text-muted mb-0" style="line-height: 1.6;">
            اجعل مساعديك يقومون بالمسح بثقة لكل سير عمل رقمي. استفد من التدريب غير المحدود لفريقك كلما دعت الحاجة.
            </p>
        </div>
        </div>

    </div>
    </div>
</div>
</section>

<!-- ================= FUTURE & VIDEO SECTION ================= -->
<section class="future-section" style="padding: 100px 0; background-color: #f8faf9;">
    <div class="container">

        <!-- العنوان -->
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color: #0f3d34; font-size: 2.2rem;">
                تعرف على المزيد حول مستقبل طب الأسنان <br> وكيف يشكله لازورد
            </h2>
        </div>

        <div class="row align-items-center g-4">

            <!-- العمود الأيمن (الصور العمودية) -->
            <div class="col-lg-4">
                
                <!-- كرت 1 -->
                <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden h-100">
                    <img src="{{ asset('img/4.jpg') }}" class="card-img-top" alt="داخل معمل لازورد" style="height: 250px; object-fit: cover;">
                    <div class="card-body text-center p-3">
                        <h6 class="fw-bold mb-0" style="color: #0f3d34;">داخل معمل لازورد للمستقبل</h6>
                    </div>
                </div>

                <!-- كرت 2 -->
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <img src="{{ asset('img/3.jpg') }}" class="card-img-top" alt="كيف يعمل لازورد" style="height: 250px; object-fit: cover;">
                    <div class="card-body text-center p-3">
                        <h6 class="fw-bold mb-0" style="color: #0f3d34;">كيف يعمل لازورد</h6>
                    </div>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg rounded-4 p-4 h-100 bg-white">
                    <div class="text-center mb-4">
                        <h5 class="fw-bold" style="color: #0f3d34;">
                            دراسة حالة: 10 وحدات لتحويل ابتسامة الزركونيا
                        </h5>
                        <p class="text-muted small">شاهد الفرق الذي تحدثه دقة التصنيع الرقمي</p>
                    </div>

                    <div class="row g-3">
                        <!-- قبل -->
                        <div class="col-md-6">
                            <div class="position-relative rounded-4 overflow-hidden shadow-sm">
                                <img src="{{ asset('img/8.1.jpg') }}" class="img-fluid w-100" alt="قبل" style="height: 300px; object-fit: cover;">
                                <div class="position-absolute bottom-0 start-0 w-100 py-2 text-center text-white fw-bold" style="background: rgba(220, 53, 69, 0.8);">
                                    BEFORE (قبل)
                                </div>
                            </div>
                        </div>

                        <!-- بعد -->
                        <div class="col-md-6">
                            <div class="position-relative rounded-4 overflow-hidden shadow-sm">
                                <img src="{{ asset('img/8.2.jpg') }}" class="img-fluid w-100" alt="بعد" style="height: 300px; object-fit: cover;">
                                <div class="position-absolute bottom-0 start-0 w-100 py-2 text-center text-white fw-bold" style="background: rgba(25, 135, 84, 0.8);">
                                    AFTER (بعد)
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-outline-success rounded-pill px-4 fw-bold">عرض الدراسة كاملة</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

    <!-- ================= FAQ SECTION ================= -->
    <section class="faq-section py-5" id="faq">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h2 class="fw-bold text-dark">الأسئلة الشائعة</h2>
                        <p class="text-muted">إجابات على أكثر الاستفسارات شيوعاً</p>
                    </div>

                    <div class="accordion" id="faqAccordion">
                        @forelse($faqs as $index => $faq)
                            <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden">
                                <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                    <button class="accordion-button fw-bold py-3 {{ $loop->first ? '' : 'collapsed' }}" 
                                            type="button" 
                                            data-bs-toggle="collapse" 
                                            data-bs-target="#collapse{{ $faq->id }}" 
                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}" 
                                            aria-controls="collapse{{ $faq->id }}"
                                            style="color: #0f3d34; background-color: #fff;">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $faq->id }}" 
                                     class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" 
                                     aria-labelledby="heading{{ $faq->id }}" 
                                     data-bs-parent="#faqAccordion">
                                    <div class="accordion-body text-muted bg-white" style="line-height: 1.7;">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-muted">لا توجد أسئلة شائعة حالياً.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>