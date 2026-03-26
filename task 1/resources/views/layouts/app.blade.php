<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        :root {
            --primary-green: #78BE20;
            --primary-green-dark: #66a11b;
            --text-black: #000000;
            --text-gray: #555555;
            --bg-light: #f8f9fa;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background-color: var(--bg-light);
            color: #212529;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar Fixes */
        .navbar {
            background-color: var(--primary-green) !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            z-index: 1000;
        }
        .nav-link { font-weight: 600; color: rgba(255, 255, 255, 0.95) !important; font-size: 1rem; }
        .nav-link:hover { color: #fff !important; opacity: 1; }
        .navbar-brand { font-weight: 700; color: #fff !important; font-size: 1.5rem; }

        /* Button Fixes */
        .btn-add-cart {
            background-color: var(--primary-green) !important;
            color: white !important;
            border: 1px solid var(--primary-green) !important;
            border-radius: 8px !important;
            width: 100%;
            font-weight: 700 !important;
            padding: 10px 15px !important;
            transition: all 0.3s ease-in-out;
            display: flex !important;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
        }

        .btn-add-cart:hover {
            background-color: var(--primary-green-dark) !important;
            border-color: var(--primary-green-dark) !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(120, 190, 32, 0.3);
        }

        .btn-add-cart.btn-danger {
            background-color: #dc3545 !important;
            border-color: #dc3545 !important;
        }
        .btn-add-cart.btn-danger:hover {
            background-color: #bb2d3b !important;
        }

        .hero-btn {
            padding: 8px 25px !important;
            border-radius: 50px !important;
            font-weight: bold !important;
            text-decoration: none !important;
            display: inline-block;
        }
        .hero-btn-primary {
            background-color: var(--primary-green) !important;
            color: white !important;
        }
        .hero-btn-dark {
            background-color: transparent !important;
            border: 2px solid #212529 !important;
            color: #212529 !important;
        }
        .hero-btn-dark:hover {
            background-color: #212529 !important;
            color: white !important;
        }

        /* General Layout */
        .section-title { 
            font-weight: 800; 
            margin-bottom: 25px; 
            border-right: 5px solid var(--primary-green); 
            padding-right: 15px; 
            font-size: 1.5rem;
        }
        
        /* Footer Styling */
        footer {
            background-color: #212529;
            color: #fff;
            padding-top: 50px;
            padding-bottom: 20px;
            margin-top: auto;
        }
        footer h5 {
            color: #fff;
            font-weight: 700;
            margin-bottom: 20px;
        }
        footer ul {
            padding: 0;
            list-style: none;
        }
        footer ul li {
            margin-bottom: 10px;
        }
        footer ul li a {
            color: #adb5bd;
            text-decoration: none;
            transition: color 0.2s;
        }
        footer ul li a:hover {
            color: var(--primary-green);
        }
        .newsletter-btn {
            background-color: var(--primary-green) !important;
            border-color: var(--primary-green) !important;
            color: white !important;
            font-weight: bold !important;
        }
        .newsletter-btn:hover {
            background-color: var(--primary-green-dark) !important;
        }
        
        /* Inputs */
        .input-group-rtl .form-control { border-radius: 0 5px 5px 0 !important; }
        .input-group-rtl .btn { border-radius: 5px 0 0 5px !important; }

        /* Star Rating */
        .star-rating {
            display: inline-flex;
            flex-direction: row-reverse;
            gap: 5px;
        }
        .star-rating input { display: none; }
        .star-rating label {
            color: #e4e5e9;
            font-size: 2rem;
            cursor: pointer;
            transition: color 0.2s;
        }
        .star-rating label:before {
            content: "\f005";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
        }
        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #ffc107;
        }
    </style>
</head>
<body class="font-sans antialiased">
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Store</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">الرئيسية</a></li>
                    
                    @if(isset($navbarCategories))
                        @foreach($navbarCategories as $cat)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.show', $cat->slug) }}">{{ $cat->name }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>

                <div class="d-flex align-items-center gap-3">
                    <a href="#" class="text-white"><i class="fas fa-search fa-lg"></i></a>
                    
                    <a href="{{ route('cart.index') }}" class="text-white position-relative">
                        <i class="fas fa-shopping-cart fa-lg"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                            {{ count((array) session('cart')) }}
                        </span>
                    </a>

                    @auth
                        <div class="dropdown">
                            <a class="text-white dropdown-toggle text-decoration-none fw-bold" href="#" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end text-end">
                                @role('admin')
                                <li><a class="dropdown-item" href="{{ route('dashboard.index') }}">لوحة التحكم</a></li>
                                <li><hr class="dropdown-divider"></li>
                                @endrole
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">الملف الشخصي</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('my-orders.index') }}">طلباتي 📦</a></li>
                                <li><hr class="dropdown-divider"></li>

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">تسجيل الخروج</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="d-flex gap-2">
                            <a href="{{ route('login') }}" class="btn btn-sm bg-white text-success fw-bold px-3">دخول</a>
                            <a href="{{ route('register') }}" class="btn btn-sm btn-outline-light px-3">تسجيل</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <h5>متواجدين دائماً لمساعدتك</h5>
                    <p class="text-white-50">تواصل معنا عبر البريد الإلكتروني أو الهاتف في أي وقت.</p>
                    <div class="d-flex gap-3 mt-3">
                        <a href="#" class="text-white"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6">
                    <h5>عن متجرنا</h5>
                    <ul>
                        <li><a href="#">تواصل معنا</a></li>
                        <li><a href="#">مقالات</a></li>
                        <li><a href="#">من نحن</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6">
                    <h5>سياسة</h5>
                    <ul>
                        <li><a href="#">سياسية التبديل و الارجاع</a></li>
                        <li><a href="#">الشروط والاحكام</a></li>
                        <li><a href="#">سياسية الاستخدام</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <h5>خليك متابع كل جديد</h5>
                    <p class="small text-white-50">اشترك في النشرة الإخبارية ولا تفوتك العروض</p>
                    <form action="#">
                        <div class="input-group input-group-rtl">
                            <input type="email" class="form-control" placeholder="ادخل بريدك الالكتروني">
                            <button class="btn newsletter-btn" type="button">اشترك الآن</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="border-top border-secondary mt-4 pt-3 text-center text-white-50 small">
                <p class="mb-0">&copy; {{ date('Y') }} Store. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>