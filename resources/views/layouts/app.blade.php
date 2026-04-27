<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="MVP Law Firm - Layanan hukum profesional dengan integritas dan keunggulan. Solusi hukum komprehensif untuk individu dan bisnis di Indonesia.">
    <meta name="keywords" content="pengacara, hukum, law firm, konsultasi hukum, advokat, Indonesia, MVP Law">
    <meta name="theme-color" content="#242844">

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ config('app.name', 'MVP Law Firm') }} | Layanan Hukum Profesional">
    <meta property="og:description" content="Layanan hukum profesional dengan integritas dan keunggulan. Kami menyediakan solusi hukum komprehensif untuk individu dan bisnis.">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="id_ID">

    <title>{{ config('app.name', 'MVP Law Firm') }} | Layanan Hukum Profesional</title>

    {{-- Preconnect --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- Google Fonts: Playfair Display + Inter + Noto Sans Arabic --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;0,900;1,500;1,700&family=Inter:wght@300;400;500;600;700;800&family=Noto+Sans+Arabic:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased min-h-screen flex flex-col" style="background-color:#FDFBFC; color:#242844;">

    <!-- ===================== PRELOADER ===================== -->
    <div id="preloader"
        class="fixed inset-0 z-[100] flex items-center justify-center transition-opacity duration-500"
        style="background:#FDFBFC;">
        <div class="text-center">
            <div class="relative w-20 h-20 mx-auto mb-4">
                <div class="absolute inset-0 rounded-xl animate-pulse"
                    style="background:linear-gradient(135deg,#B89A72,#d4b896);"></div>
                <div class="absolute inset-[6px] rounded-lg flex items-center justify-center"
                    style="background:#FDFBFC;">
                    <i class="fas fa-scale-balanced text-2xl" style="color:#B89A72;"></i>
                </div>
                <div class="absolute inset-0 rounded-xl border-2 border-[#B89A72]/30 animate-ping"></div>
            </div>
            <p class="text-sm font-semibold animate-pulse" style="color:#B89A72; letter-spacing:0.08em;">
                MVP LAW FIRM
            </p>
        </div>
    </div>

    <!-- ===================== SCROLL PROGRESS ===================== -->
    <div class="fixed top-0 left-0 right-0 z-[60] h-[3px]" style="background:rgba(184,154,114,0.15);">
        <div id="scroll-progress" class="h-full w-0 transition-none"
            style="background:linear-gradient(90deg,#B89A72,#d4b896);"></div>
    </div>

    <!-- ===================== NAVIGATION ===================== -->
    <nav id="navbar"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 glass-nav">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-[4.5rem] items-center gap-6">

                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center group flex-shrink-0" aria-label="MVP Law Firm - Beranda">
                    <img src="{{ asset('storage/Primary Horizontal.png') }}" alt="MVP Law Logo" class="h-10 md:h-11 w-auto object-contain transition-all duration-300 group-hover:opacity-80">
                </a>

                <!-- Desktop Nav — centered -->
                <div class="hidden md:flex flex-1 items-center justify-center gap-6">
                    <a href="{{ route('home') }}"
                        class="nav-link {{ request()->routeIs('home') ? 'active' : '' }} text-[0.85rem] font-medium transition-all">beranda</a>
                    <a href="{{ route('about') }}"
                        class="nav-link {{ request()->routeIs('about') ? 'active' : '' }} text-[0.85rem] font-medium transition-all">tentang kami</a>
                    <a href="{{ route('services') }}"
                        class="nav-link {{ request()->routeIs('services') ? 'active' : '' }} text-[0.85rem] font-medium transition-all">layanan</a>
                    <a href="{{ route('team') }}"
                        class="nav-link {{ request()->routeIs('team') ? 'active' : '' }} text-[0.85rem] font-medium transition-all">tim</a>
                    <a href="{{ route('articles') }}"
                        class="nav-link {{ request()->routeIs('articles') ? 'active' : '' }} text-[0.85rem] font-medium transition-all">artikel</a>
                </div>

                <!-- Desktop CTA -->
                <a href="{{ route('contact') }}" id="nav-cta"
                    class="nav-cta-btn hidden md:flex items-center"
                    style="background:#242844; color:#FDFBFC; padding: 0.65rem 1.6rem; border-radius: 99px;">
                    <i class="fas fa-phone-alt text-xs mr-2"></i>
                    kontak
                </a>

                <!-- Mobile Menu Toggle -->
                <button type="button" id="mobile-toggle"
                    class="nav-mobile-toggle md:hidden"
                    style="color:#5a5e7a;"
                    aria-label="Buka menu navigasi"
                    aria-expanded="false">
                    <i class="fas fa-bars" style="font-size:1.2rem;" id="menu-icon"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu"
            class="hidden md:hidden border-t"
            style="background:rgba(253,251,252,0.97); backdrop-filter:blur(20px); border-color:rgba(184,154,114,0.12);">
            <div class="px-4 py-4 space-y-1">
                <a href="{{ route('home') }}"
                    class="flex items-center gap-2 px-4 py-3 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('home') ? 'bg-[#B89A72]/10 text-[#8a7048]' : 'text-[#363a5c] hover:bg-[#B89A72]/8 hover:text-[#242844]' }}">
                    <i class="fas fa-home w-4"></i> beranda
                </a>
                <a href="{{ route('about') }}"
                    class="flex items-center gap-2 px-4 py-3 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('about') ? 'bg-[#B89A72]/10 text-[#8a7048]' : 'text-[#363a5c] hover:bg-[#B89A72]/8 hover:text-[#242844]' }}">
                    <i class="fas fa-info-circle w-4"></i> tentang kami
                </a>
                <a href="{{ route('services') }}"
                    class="flex items-center gap-2 px-4 py-3 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('services') ? 'bg-[#B89A72]/10 text-[#8a7048]' : 'text-[#363a5c] hover:bg-[#B89A72]/8 hover:text-[#242844]' }}">
                    <i class="fas fa-briefcase w-4"></i> layanan
                </a>
                <a href="{{ route('team') }}"
                    class="flex items-center gap-2 px-4 py-3 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('team') ? 'bg-[#B89A72]/10 text-[#8a7048]' : 'text-[#363a5c] hover:bg-[#B89A72]/8 hover:text-[#242844]' }}">
                    <i class="fas fa-users w-4"></i> tim
                </a>
                <a href="{{ route('articles') }}"
                    class="flex items-center gap-2 px-4 py-3 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('articles') ? 'bg-[#B89A72]/10 text-[#8a7048]' : 'text-[#363a5c] hover:bg-[#B89A72]/8 hover:text-[#242844]' }}">
                    <i class="fas fa-newspaper w-4"></i> artikel
                </a>
                <div class="pt-2 pb-1">
                    <a href="{{ route('contact') }}" class="flex items-center justify-center gap-2 w-full px-5 py-3 rounded-xl text-sm font-semibold" style="background:#242844; color:#FDFBFC;">
                        <i class="fas fa-phone-alt text-xs"></i>kontak
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ===================== MAIN CONTENT ===================== -->
    <main class="flex-grow" {!! request()->routeIs('home') ? '' : 'style="padding-top:4.5rem;"' !!}>
        @yield('content')
    </main>

    <!-- ===================== WHATSAPP FAB ===================== -->
    <a href="https://wa.me/6281234567890?text=Halo%20MVP%20Law%20Firm%2C%20saya%20ingin%20konsultasi%20hukum."
        target="_blank" rel="noopener noreferrer"
        class="fab-whatsapp group no-print"
        aria-label="Hubungi via WhatsApp"
        title="Chat WhatsApp">
        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
        <span class="absolute right-full mr-3 top-1/2 -translate-y-1/2 px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none shadow-lg"
            style="background:#1a1c2e; color:#FDFBFC;">
            Chat WhatsApp
        </span>
    </a>



    <!-- ===================== FOOTER ===================== -->
    <footer class="relative overflow-hidden" style="background:#F5F3F4; border-top:1px solid rgba(184,154,114,0.1);">
        <div class="absolute inset-0 grid-pattern opacity-25"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

                <!-- Brand -->
                <div class="lg:col-span-1">
                    <a href="{{ route('home') }}" class="flex items-center mb-5 group">
                        <img src="{{ asset('storage/Primary Horizontal.png') }}" alt="MVP Law Logo" class="h-12 w-auto object-contain">
                    </a>
                    <p class="text-sm leading-relaxed mb-5" style="color:#5a5e7a;">
                        Layanan hukum profesional dengan integritas dan keunggulan. Solusi hukum komprehensif untuk individu dan bisnis.
                    </p>
                    <div class="flex gap-3">
                        <a href="#" aria-label="LinkedIn"
                            class="social-link w-9 h-9 rounded-lg flex items-center justify-center border"
                            style="background:#F5F3F4; border-color:rgba(184,154,114,0.15);">
                            <i class="fab fa-linkedin-in text-[#B89A72] text-sm"></i>
                        </a>
                        <a href="#" aria-label="Twitter / X"
                            class="social-link w-9 h-9 rounded-lg flex items-center justify-center border"
                            style="background:#F5F3F4; border-color:rgba(184,154,114,0.15);">
                            <i class="fab fa-twitter text-[#B89A72] text-sm"></i>
                        </a>
                        <a href="#" aria-label="Facebook"
                            class="social-link w-9 h-9 rounded-lg flex items-center justify-center border"
                            style="background:#F5F3F4; border-color:rgba(184,154,114,0.15);">
                            <i class="fab fa-facebook-f text-[#B89A72] text-sm"></i>
                        </a>
                        <a href="#" aria-label="Instagram"
                            class="social-link w-9 h-9 rounded-lg flex items-center justify-center border"
                            style="background:#F5F3F4; border-color:rgba(184,154,114,0.15);">
                            <i class="fab fa-instagram text-[#B89A72] text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-semibold mb-5 text-sm uppercase tracking-widest" style="color:#242844; font-family:'Playfair Display',serif; letter-spacing:0.1em;">Navigasi</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-sm transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">Beranda</a></li>
                        <li><a href="{{ route('about') }}" class="text-sm transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">Tentang Kami</a></li>
                        <li><a href="{{ route('services') }}" class="text-sm transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">Layanan</a></li>
                        <li><a href="{{ route('team') }}" class="text-sm transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">Tim Kami</a></li>
                        <li><a href="{{ route('articles') }}" class="text-sm transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">Artikel</a></li>
                        <li><a href="{{ route('contact') }}" class="text-sm transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Practice Areas -->
                <div>
                    <h3 class="font-semibold mb-5 text-sm" style="color:#242844; font-family:'Playfair Display',serif; letter-spacing:0.05em;">Bidang Praktik</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('services') }}" class="text-sm transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">Hukum Korporasi</a></li>
                        <li><a href="{{ route('services') }}" class="text-sm transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">Pembelaan Pidana</a></li>
                        <li><a href="{{ route('services') }}" class="text-sm transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">Hukum Keluarga</a></li>
                        <li><a href="{{ route('services') }}" class="text-sm transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">Real Estat</a></li>
                        <li><a href="{{ route('services') }}" class="text-sm transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">Hukum Perburuhan</a></li>
                        <li><a href="{{ route('services') }}" class="text-sm transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">Hak Kekayaan Intelektual</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="font-semibold mb-5 text-sm" style="color:#242844; font-family:'Playfair Display',serif; letter-spacing:0.05em;">Hubungi Kami</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt mt-0.5 flex-shrink-0" style="color:#B89A72;"></i>
                            <span class="text-sm" style="color:#5a5e7a;">Jl. Sudirman No. 123<br>Jakarta Pusat, 10220</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-phone flex-shrink-0" style="color:#B89A72;"></i>
                            <a href="tel:+62211234567" class="text-sm transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">+62 21 1234 5678</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope flex-shrink-0" style="color:#B89A72;"></i>
                            <a href="mailto:info@mvplaw.id" class="text-sm transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">info@mvplaw.id</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fab fa-whatsapp flex-shrink-0" style="color:#25D366;"></i>
                            <a href="https://wa.me/6281234567890" target="_blank" rel="noopener" class="text-sm transition-colors hover:text-[#25D366]" style="color:#5a5e7a;">+62 812 3456 7890</a>
                        </li>
                    </ul>
                    <div class="mt-5 text-xs px-3 py-2 rounded-lg" style="background:rgba(184,154,114,0.08); color:#8a7048; border:1px solid rgba(184,154,114,0.15);">
                        <i class="fas fa-clock mr-1.5"></i>Senin–Jumat: 08.00–17.00 WIB
                    </div>
                </div>
            </div>

            <!-- Bottom bar -->
            <div class="mt-14 pt-8 border-t" style="border-color:rgba(184,154,114,0.12);">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-xs" style="color:#5a5e7a;">
                        &copy; {{ date('Y') }} MVP Law Firm. Hak cipta dilindungi undang-undang.
                    </p>
                    <div class="flex gap-6">
                        <a href="#" class="text-xs transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">Kebijakan Privasi</a>
                        <a href="#" class="text-xs transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">Syarat Layanan</a>
                        <a href="#" class="text-xs transition-colors hover:text-[#B89A72]" style="color:#5a5e7a;">Peta Situs</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dark accent strip at bottom -->
        <div class="h-1.5 w-full" style="background:linear-gradient(90deg,#242844,#B89A72,#d4b896,#B89A72,#242844);"></div>
    </footer>

    <!-- ===================== SCRIPTS ===================== -->
    <script>
    (function () {
        'use strict';

        // ── Preloader ──
        window.addEventListener('load', function () {
            var pre = document.getElementById('preloader');
            pre.style.opacity = '0';
            setTimeout(function () { pre.style.display = 'none'; }, 500);
        });

        // ── Scroll Progress ──
        var progress = document.getElementById('scroll-progress');
        function updateProgress() {
            var scrollTop = window.scrollY;
            var docH = document.documentElement.scrollHeight - window.innerHeight;
            progress.style.width = (docH > 0 ? (scrollTop / docH * 100) : 0) + '%';
        }
        window.addEventListener('scroll', updateProgress, { passive: true });

        // ── Navbar: glassmorphism on scroll ──
        var navbar = document.getElementById('navbar');
        var lastST = 0;
        var scrollTimer;

        function handleNavScroll() {
            var st = window.scrollY;

            if (st > 60) {
                navbar.classList.add('glass-nav');
                navbar.style.boxShadow = '0 4px 20px rgba(36, 40, 68, 0.08)';
            } else {
                navbar.classList.add('glass-nav');
                navbar.style.boxShadow = 'none';
            }

            // Hide on scroll down, show on scroll up
            if (st > lastST && st > 120) {
                navbar.style.transform = 'translateY(-100%)';
            } else {
                navbar.style.transform = 'translateY(0)';
            }

            lastST = st <= 0 ? 0 : st;
            clearTimeout(scrollTimer);
            scrollTimer = setTimeout(function () {
                navbar.style.transform = 'translateY(0)';
            }, 150);
        }

        window.addEventListener('scroll', handleNavScroll, { passive: true });
        handleNavScroll(); // init

        // ── Mobile Menu ──
        var toggle = document.getElementById('mobile-toggle');
        var mobileMenu = document.getElementById('mobile-menu');
        var menuIcon = document.getElementById('menu-icon');

        toggle.addEventListener('click', function () {
            var isOpen = !mobileMenu.classList.contains('hidden');
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('fa-bars', isOpen);
            menuIcon.classList.toggle('fa-times', !isOpen);
            toggle.setAttribute('aria-expanded', String(!isOpen));
        });

        // ── Scroll Reveal ──
        var revealEls = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');
        var revealObs = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) e.target.classList.add('active');
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
        revealEls.forEach(function (el) { revealObs.observe(el); });

        // ── Stagger Children ──
        var staggerEls = document.querySelectorAll('.stagger-children');
        var staggerObs = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) e.target.classList.add('active');
            });
        }, { threshold: 0.08 });
        staggerEls.forEach(function (el) { staggerObs.observe(el); });

        // ── Counter Animation ──
        var counters = document.querySelectorAll('.counter-animate');
        var counterObs = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (!e.isIntersecting) return;
                var el = e.target;
                var target = parseInt(el.getAttribute('data-target'), 10);
                if (isNaN(target)) return;
                var duration = 2000;
                var step = target / (duration / 16);
                var current = 0;
                var suffix = el.getAttribute('data-suffix') || '';
                var update = function () {
                    current += step;
                    if (current < target) {
                        el.textContent = Math.floor(current) + suffix;
                        requestAnimationFrame(update);
                    } else {
                        el.textContent = target + suffix;
                    }
                };
                update();
                counterObs.unobserve(el);
            });
        }, { threshold: 0.5 });
        counters.forEach(function (c) { counterObs.observe(c); });

        // ── 3D Tilt Effect ──
        var tiltCards = document.querySelectorAll('.tilt');
        tiltCards.forEach(function (card) {
            card.addEventListener('mousemove', function (e) {
                var rect = this.getBoundingClientRect();
                var x = e.clientX - rect.left;
                var y = e.clientY - rect.top;
                var cx = rect.width / 2;
                var cy = rect.height / 2;
                var inner = this.querySelector('.tilt-inner');
                if (inner) {
                    inner.style.transform =
                        'rotateX(' + ((y - cy) / 12) + 'deg) rotateY(' + ((cx - x) / 12) + 'deg)';
                }
            });
            card.addEventListener('mouseleave', function () {
                var inner = this.querySelector('.tilt-inner');
                if (inner) inner.style.transform = 'rotateX(0) rotateY(0)';
            });
        });

        // ── Magnetic Button ──
        document.querySelectorAll('.btn-magnetic').forEach(function (btn) {
            btn.addEventListener('mousemove', function (e) {
                var r = this.getBoundingClientRect();
                this.style.setProperty('--mouse-x', (e.clientX - r.left) + 'px');
                this.style.setProperty('--mouse-y', (e.clientY - r.top) + 'px');
            });
        });

        // ── Smooth Scroll (anchor links) ──
        document.querySelectorAll('a[href^="#"]').forEach(function (a) {
            a.addEventListener('click', function (e) {
                var href = this.getAttribute('href');
                if (href === '#') return;
                var target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

    })();
    </script>
</body>
</html>
