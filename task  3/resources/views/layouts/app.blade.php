<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'X-BIKE | عالم الدراجات الاحترافي') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&family=Oswald:wght@700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        :root {
            --primary: #FF4D00;
            --dark: #0a0a0a;
        }
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #fbfbfb;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }
        .oswald { font-family: 'Oswald', sans-serif; }
        
        .bg-text {
            position: absolute;
            font-size: 15rem;
            font-weight: 900;
            color: rgba(0,0,0,0.03);
            z-index: -1;
            user-select: none;
            text-transform: uppercase;
        }

        .btn-premium {
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
            z-index: 1;
        }
        .btn-premium::before {
            content: '';
            position: absolute;
            top: 0; right: 100%; width: 100%; height: 100%;
            background: white;
            transition: all 0.4s ease;
            z-index: -1;
        }
        .btn-premium:hover::before { right: 0; }
        .btn-premium:hover { color: var(--primary); }

        .dark-overlay {
            background: linear-gradient(to right, rgba(0,0,0,0.95) 20%, rgba(0,0,0,0.4) 100%);
        }

        .glass-nav {
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .glass-nav.scrolled {
            background: rgba(0, 0, 0, 0.9);
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }
        .reveal-on-scroll.active {
            opacity: 1;
            transform: translateY(0);
        }

        #cart-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(4px);
            z-index: 150;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0a0a0a; }
        ::-webkit-scrollbar-thumb { background: #FF4D00; border-radius: 10px; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateX(10px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .animate-fadeIn { animation: fadeIn 0.3s ease-out forwards; }
    </style>
</head>
<body class="text-gray-900">

<nav class="fixed w-full z-[100] py-4 px-6 md:px-10 transition-all duration-500 glass-nav" id="mainNav">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-3xl font-black tracking-tighter oswald text-white">
            <a href="{{ url('/') }}">X-<span class="text-orange-600">BIKE</span></a>
        </div>
        
            <div class="hidden lg:flex space-x-reverse space-x-10 text-white font-bold uppercase text-xs tracking-widest">
                <a href="{{ route('home') }}" class="hover:text-orange-500 transition">الرئيسية</a>
                <a href="{{ route('shop.index') }}" class="hover:text-orange-500 transition">المتجر</a>
                <a href="{{ route('about') }}" class="hover:text-orange-500 transition">نبذة عنا</a>
                <a href="{{ route('faq') }}" class="hover:text-orange-500 transition">الأسئلة الشائعة</a>
                <a href="{{ route('contact') }}" class="hover:text-orange-500 transition">اتصل بنا</a>
            </div>


        <div class="flex items-center space-x-reverse space-x-6 text-white">
            <button class="hover:text-orange-500 transition hidden sm:block">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>

            <div class="relative cursor-pointer group" onclick="toggleCart()">
                <svg class="w-6 h-6 group-hover:text-orange-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                <span id="cart-count" class="absolute -top-2 -left-2 bg-orange-600 text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold">0</span>
            </div>

            @auth
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-2 hover:text-orange-500 transition focus:outline-none">
                        <span class="text-xs font-black uppercase tracking-widest">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>

                    <div x-show="open" 
                         @click.away="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="absolute left-0 mt-4 w-48 bg-black/90 backdrop-blur-xl border border-white/10 rounded-xl shadow-2xl py-2 z-[110]">
                        
                        @if(Auth::user()->hasRole('admin'))
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-xs font-bold hover:bg-orange-600 transition">لوحة التحكم</a>
                        
                        <div class="border-t border-white/10 my-1"></div>
                        @endif
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-xs font-bold hover:bg-orange-600 transition">الملف الشخصي</a>
                        
                        <div class="border-t border-white/10 my-1"></div>
                        <a href="{{ route('my-orders') }}" class="block px-4 py-2 text-xs font-bold hover:bg-orange-600 transition">طلباتي</a>
                        
                        <div class="border-t border-white/10 my-1"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-right block px-4 py-2 text-xs font-bold text-red-500 hover:bg-red-500 hover:text-white transition">
                                تسجيل الخروج
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="hidden sm:flex items-center gap-4">
                    <a href="{{ route('login') }}" class="text-xs font-black uppercase tracking-widest hover:text-orange-500 transition">دخول</a>
                    <a href="{{ route('register') }}" class="bg-orange-600 px-4 py-2 rounded-lg text-[10px] font-black uppercase tracking-tighter hover:bg-white hover:text-orange-600 transition">إنشاء حساب</a>
                </div>
            @endauth

            <button class="lg:hidden text-white" id="mobile-menu-btn" onclick="toggleMobileMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
    </div>
    
    <div id="mobile-menu" class="hidden lg:hidden absolute top-full left-0 w-full bg-black/95 p-8 flex flex-col space-y-6 text-center border-t border-white/10">
        <a href="{{ url('/') }}" onclick="toggleMobileMenu()" class="text-white font-bold uppercase text-sm">الرئيسية</a>
        <a href="#store" onclick="toggleMobileMenu()" class="text-white font-bold uppercase text-sm">المتجر</a>
        @guest
            <a href="{{ route('login') }}" class="text-orange-500 font-bold uppercase text-sm">تسجيل الدخول</a>
        @endguest
    </div>
</nav>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            
    <footer id="contact" class="bg-black text-white pt-24 pb-10">
        <div class="container mx-auto px-6 md:px-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-20">
                <div class="col-span-1 md:col-span-2 lg:col-span-1">
                    <h2 class="text-4xl font-black oswald mb-8">X-<span class="text-orange-600">BIKE</span></h2>
                    <p class="text-gray-500 text-sm leading-relaxed mb-8">نحن لا نبيع الدراجات، نحن نصنع أدوات الحرية. رؤيتنا هي تحويل كل رحلة إلى تجربة أداء لا تُنسى.</p>
                </div>
                <div>
                    <h4 class="text-lg font-black mb-8 uppercase oswald tracking-widest text-orange-600">روابط سريعة</h4>
                    <ul class="space-y-4 text-gray-500 text-sm font-bold">
                        <li><a href="#home" class="hover:text-white transition">أحدث الإصدارات</a></li>
                        <li><a href="#" class="hover:text-white transition">دليل القياسات</a></li>
                        <li><a href="#" class="hover:text-white transition">قطع الغيار</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-black mb-8 uppercase oswald tracking-widest text-orange-600">اتصل بنا</h4>
                    <p class="text-gray-500 text-sm font-bold leading-loose">
                        برج الابتكار، حي التصميم، دبي<br>
                        <span class="text-white mt-4 block text-left" dir="ltr" style="right: -213px;position: relative;">+971 4 000 0000</span>
                        <span class="text-orange-600 block">support@x-bike.pro</span>
                    </p>
                </div>
            </div>
            <div class="pt-10 border-t border-white/10 text-center text-gray-600 text-[10px] font-black uppercase tracking-widest">
                <p>&copy; 2024 X-BIKE GLOBAL PERFORMANCE. ALL RIGHTS RESERVED.</p>
            </div>
        </div>
    </footer>

    <!-- Cart UI -->
    <div id="cart-overlay" onclick="toggleCart()"></div>

    <div id="cart-sidebar" class="fixed top-0  w-80 md:w-96 h-full bg-white z-[200] shadow-2xl translate-x-[100%] transition-transform duration-500 p-8 flex flex-col">
        <div class="flex justify-between items-center mb-10">
            <h3 class="font-black text-2xl uppercase oswald">سلة المشتريات</h3>
            <button onclick="toggleCart()" class="text-gray-400 hover:text-black flex items-center gap-2 text-sm font-black">
                إغلاق <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <div id="cart-items" class="flex-grow space-y-6 overflow-y-auto pr-2">
            <p class="text-gray-400 text-center py-10">السلة فارغة حالياً</p>
        </div>
        <div class="border-t pt-6 mt-6">
            <div class="flex justify-between font-black text-lg mb-6">
                <span>الإجمالي:</span>
                <span id="cart-total" class="text-orange-600">$0</span>
            </div>
            <a href="{{ route('checkout.index') }}" class="block w-full text-center bg-black text-white py-5 rounded-2xl font-black uppercase text-xs tracking-widest hover:bg-orange-600 transition shadow-xl">
                إتمام الطلب
            </a>
        </div>
    </div>

    <script>
        // 1. Scroll Effects for Navbar
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('mainNav');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
            
            // 2. Reveal animations on scroll
            const reveals = document.querySelectorAll('.reveal-on-scroll');
            reveals.forEach(el => {
                const windowHeight = window.innerHeight;
                const elementTop = el.getBoundingClientRect().top;
                const elementVisible = 100;
                if (elementTop < windowHeight - elementVisible) {
                    el.classList.add('active');
                }
            });
        });

        // 3. Mobile Menu Toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
// 4. Shopping Cart Logic
        // جلب السلة من الجلسة (Session) عند تحميل الصفحة بدلاً من مصفوفة فارغة
        let cart = @json(session('cart') ? array_values(session('cart')) : []);
        
        const cartCount = document.getElementById('cart-count');
        const cartSidebar = document.getElementById('cart-sidebar');
        const cartOverlay = document.getElementById('cart-overlay');
        const cartItemsContainer = document.getElementById('cart-items');
        const cartTotal = document.getElementById('cart-total');

        // تحديث الواجهة فور تحميل الصفحة لتعكس محتوى الجلسة
        window.addEventListener('DOMContentLoaded', () => {
            updateCartUI();
        });

        function toggleCart() {
            const isHidden = cartSidebar.style.transform === 'translateX(100%)' || cartSidebar.style.transform === '';
            cartSidebar.style.transform = isHidden ? 'translateX(0)' : 'translateX(100%)';
            cartOverlay.style.display = isHidden ? 'block' : 'none';
            document.body.style.overflow = isHidden ? 'hidden' : '';
        }

function addToCart(name, price, event, productId) {
            // هذان السطران هما الحل: يمنعان المتصفح من فتح رابط صفحة المنتج
            if (event) {
                event.preventDefault(); // يمنع السلوك الافتراضي (مثل الانتقال لرابط)
                event.stopPropagation(); // يمنع انتقال النقرة للعناصر الأب (مثل البطاقة)
            }

            // إضافة المنتج للمصفوفة المحلية مع الـ ID
            cart.push({ id: productId, name: name, price: price });
            updateCartUI();

            // إرسال الطلب للخلفية بصمت
            fetch(`/add-to-cart/${productId}`, {
                method: 'GET',
                headers: { 
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            // تأثير الزر البصري
            const btn = event.currentTarget;
            const originalText = btn.innerText;
            btn.innerText = 'تمت الإضافة ✓';
            btn.classList.replace('bg-black', 'bg-green-600');
            
            setTimeout(() => {
                btn.innerText = originalText;
                btn.classList.replace('bg-green-600', 'bg-black');
            }, 2000);
        }

        function updateCartUI() {
            cartCount.innerText = cart.length;
            
            if (cart.length === 0) {
                cartItemsContainer.innerHTML = '<p class="text-gray-400 text-center py-10">السلة فارغة حالياً</p>';
                cartTotal.innerText = '$0';
                return;
            }

            let total = 0;
            cartItemsContainer.innerHTML = cart.map((item, index) => {
                total += item.price;
                return `
                    <div class="flex justify-between items-center border-b border-gray-100 pb-4 animate-fadeIn">
                        <div>
                            <h4 class="font-bold text-sm text-gray-800">${item.name}</h4>
                            <p class="text-orange-600 font-black text-xs">$${item.price.toLocaleString()}</p>
                        </div>
                        <button onclick="removeFromCart(${index}, ${item.id})" class="text-red-500 hover:text-red-700 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                `;
            }).join('');
            
            cartTotal.innerText = '$' + total.toLocaleString();
        }

        function removeFromCart(index, productId) {
            // مسح من الواجهة
            cart.splice(index, 1);
            updateCartUI();

            // إرسال طلب مسح للخادم
            fetch('/remove-from-cart', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ id: productId })
            });
        }

        // Initialize scroll check on load
        window.addEventListener('load', () => {
            window.dispatchEvent(new Event('scroll'));
        });
    </script>
    </body>
</html>
