<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'lazord') }}</title>

        <!-- SEO -->
        <meta name="description" content="مختبر أسنان رقمي متكامل يوفر حلول ترميمية متقدمة، تواصل فوري، وسير عمل رقمي لعيادات طب الأسنان.">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- Bootstrap 5 RTL -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
        
        <!-- Font Awesome for Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
        --primary-color: #0f3d34; /* أخضر غامق - الهوية */
        --accent-color: #198754; /* أخضر فاتح - للأزرار */
        --light-bg: #f4f7f6;
        --text-color: #222;
        }

        * { box-sizing: border-box; }

        body {
        font-family: 'Cairo', sans-serif;
        background: #ffffff;
        color: var(--text-color);
        overflow-x: hidden;
        }

        /* Layout */
        .container { max-width: 1200px; }
        .nav-space { height: 80px; }

        /* NAVBAR */
        .navbar {
            padding: 15px 0;
        }
        .navbar-brand {
            font-size: 1.8rem;
        }
        .nav-link {
            font-weight: 600;
            margin: 0 10px;
            color: var(--primary-color) !important;
        }
        .nav-link:hover {
            color: var(--accent-color) !important;
        }
.product-card {
        transition: all 0.3s ease-in-out;
        border: 1px solid #eee;
    }
    .product-card:hover {
        transform: translateY(-5px); /* ترتفع قليلاً للأعلى */
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; /* ظل أنعم */
        border-color: #198754; /* حدود خضراء خفيفة */
    }
    .product-img-container img {
        transition: transform 0.5s ease;
    }
    .product-card:hover .product-img-container img {
        transform: scale(1.05); /* تكبير بسيط للصورة */
    }
        /* HERO */
        .hero-section {
        background: var(--light-bg);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
        }
        .hero-box {
        background: var(--primary-color);
        color: #fff;
        padding: 50px;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(15, 61, 52, 0.15);
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        }
        .hero-box h1 {
        font-weight: 800;
        line-height: 1.3;
        margin-bottom: 20px;
        font-size: 2.8rem;
        }
        .hero-box p {
        opacity: 0.9;
        margin-bottom: 30px;
        font-size: 1.1rem;
        line-height: 1.8;
        }
        .hero-actions {
        display: flex;
        gap: 15px;
        }
        .hero-img {
            object-fit: cover;
            height: 100%;
            min-height: 450px;
        }

        /* SECTIONS GLOBAL */
        .section-title {
        text-align: center;
        font-weight: 800;
        margin-bottom: 15px;
        color: var(--primary-color);
        font-size: 2.2rem;
        }
        .section-desc {
        text-align: center;
        color: #666;
        margin-bottom: 60px;
        font-size: 1.1rem;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        }

        /* FEATURES */
        .features-section { padding: 100px 0; }
        .feature-card {
        background: #fff;
        padding: 40px 30px;
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        height: 100%;
        transition: transform 0.3s ease;
        border: 1px solid #eee;
        text-align: center;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            border-color: var(--accent-color);
        }
        .feature-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        .feature-card h5 {
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 1.3rem;
        }

        /* PRODUCTS */
        .products-section {
        background: #f8faf9;
        padding: 100px 0;
        }
        .product-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0,0,0,0.05);
        transition: 0.3s;
        height: 100%;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .product-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }
        .product-info {
            padding: 20px;
        }
        .product-title {
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--primary-color);
        }

        /* LEAD FORM */
        .lead-section { padding: 100px 0; }
        .lead-card {
        background: #fff;
        padding: 40px;
        border-radius: 22px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.08);
        border: 1px solid #eee;
        }
        .lead-text h2 { color: var(--primary-color); }
        .lead-benefits {
            list-style: none;
            padding: 0;
            margin-top: 30px;
        }
        .lead-benefits li {
        font-weight: 600;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        font-size: 1.1rem;
        }
        .lead-benefits li i {
            color: var(--accent-color);
            margin-left: 10px;
            font-size: 1.2rem;
        }
        .form-control, .form-select {
        height: 52px;
        border-radius: 12px;
        background-color: #f9f9f9;
        border: 1px solid #e0e0e0;
        }
        .form-control:focus {
            background-color: #fff;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 4px rgba(25, 135, 84, 0.1);
        }
        .btn-success {
            background-color: var(--accent-color);
            border: none;
            padding: 12px 30px;
            font-weight: 700;
            border-radius: 12px;
        }
        .btn-success:hover {
            background-color: var(--primary-color);
        }

        /* STATS */
        .stats-section {
        background: linear-gradient(135deg, var(--primary-color), #145246);
        padding: 80px 0;
        color: white;
        }
        .stat-item h3 {
        font-weight: 800;
        font-size: 3rem;
        margin-bottom: 5px;
        color: #4ade80; /* لون أخضر مضيء للأرقام */
        }
        .stat-item p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

            .accordion-button:focus {
        border-color: #198754;
        box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
        }
        /* FOOTER */
        .footer {
        background: #111;
        color: #aaa;
        padding: 70px 0 20px;
        font-size: 14px;
        }
        .footer h5 {
            color: #fff;
            font-weight: 700;
            margin-bottom: 25px;
            font-size: 1.1rem;
        }
        .footer ul {
            list-style: none;
            padding: 0;
        }
        .footer ul li {
            margin-bottom: 12px;
        }
        .footer a {
            color: #aaa;
            text-decoration: none;
            transition: 0.2s;
        }
        .footer a:hover {
            color: #fff;
        }
        .social-icons a {
            font-size: 1.2rem;
            margin-left: 15px;
            color: #aaa;
        }
        .social-icons a:hover { color: #fff; }

    </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">


        <!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
  <div class="container">
        <a class="navbar-brand fw-bold text-success" href="{{ route('home') }}">
            <i class="fas fa-tooth me-2"></i> لازورد
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
<ul class="navbar-nav mx-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pages.why') }}">لماذا لازورد</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pages.solutions') }}">الحلول</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('services.index') }}">خدمات المختبرات</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pages.pricing') }}">التسعير</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pages.learning') }}">التعلم</a>
    </li>
</ul>
        <div class="d-flex gap-2">
        <div class="d-flex align-items-center gap-2">
            @auth
                <!-- في حالة المستخدم مسجل دخول: يظهر الاسم والقائمة -->
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle fw-bold" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle ms-1"></i> {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end text-end shadow-sm">
                        @role('admin|technician')
                        <li>
                            <a class="dropdown-item mb-1" href="{{ url('/dashboard') }}">
                                <i class="fas fa-columns ms-2 text-muted"></i> لوحة التحكم
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>                        
                        @endrole
                            <li><a class="dropdown-item" href="{{ route('orders.index') }}">طلباتي</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt ms-2"></i> تسجيل الخروج
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <!-- في حالة الزائر: تظهر أزرار الدخول والتسجيل -->
                <a href="{{ route('login') }}" class="btn btn-outline-success fw-bold ms-2">
                    تسجيل الدخول
                </a>
                
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-success fw-bold">
                        حساب جديد
                    </a>
                @endif
            @endauth
        </div>
        </div>
    </div>
  </div>
</nav>

<div class="nav-space"></div>

        <div class="min-h-screen bg-gray-100">
            {{-- @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>


            <!-- ================= FOOTER ================= -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4 text-center text-lg-end">
                <h5 class="text-white mb-3"><i class="fas fa-tooth me-2"></i> لازورد</h5>
                <p class="text-muted small" style="line-height: 1.8 ; color: #aaa !important;">
                    شريكك الموثوق في طب الأسنان الرقمي. نجمع بين أحدث التقنيات والخبرة البشرية لتقديم نتائج استثنائية لمرضاك وعيادتك.
                </p>
                <div class="social-icons mt-3">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <div class="col-lg-2 col-6 mb-4">
                <h5>الشركة</h5>
                <ul>
                    <li><a href="#">من نحن</a></li>
                    <li><a href="#">الوظائف</a></li>
                    <li><a href="#">المدونة</a></li>
                    <li><a href="#">تواصل معنا</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-6 mb-4">
                <h5>المنتجات</h5>
                <ul>
                    <li><a href="#">التيجان والجسور</a></li>
                    <li><a href="#">الزراعة</a></li>
                    <li><a href="#">التقويم الشفاف</a></li>
                    <li><a href="#">واقيات الأسنان</a></li>
                </ul>
            </div>

            <div class="col-lg-4 mb-4">
                <h5>اتصل بنا</h5>
                <ul class="list-unstyled text-muted small">
                    <li class="mb-2" style="color: #aaa;"><i class="fas fa-map-marker-alt me-2" style="color: #aaa;"></i> فلسطين، رام الله، الشارع الرئيسي</li>
                    <li class="mb-2" style="color: #aaa;"><i class="fas fa-phone me-2" style="color: #aaa;"></i> +970 59 000 0000</li>
                    <li class="mb-2" style="color: #aaa;"><i class="fas fa-envelope me-2" style="color: #aaa;"></i> info@lazord-lab.com</li>
                </ul>
            </div>
        </div>
        
        <div class="border-top border-secondary pt-4 mt-4">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-end mb-2 mb-md-0">
                    &copy; 2026 لازورد. جميع الحقوق محفوظة.
                </div>
                <div class="col-md-6 text-center text-md-start">
                    <a href="#" class="me-3">سياسة الخصوصية</a>
                    <a href="#">شروط الاستخدام</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        </div>
    </body>
</html>
