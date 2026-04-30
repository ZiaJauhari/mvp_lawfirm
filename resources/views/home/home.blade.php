@extends('layouts.app')

@section('content')

    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 10s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        @keyframes float-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        .animate-float { animation: float-slow 4s ease-in-out infinite; }
        .animate-float-delayed { animation: float-slow 5s ease-in-out infinite 2s; }
    </style>

    <section class="relative overflow-hidden min-h-[50vh] block pt-28" style="background-image: url('{{ asset('images/images2.png') }}'); background-size: cover; background-position: center 25%; background-repeat: no-repeat;">
        <div class="absolute inset-0 bg-linear-to-r from-[#FDFBFC]/95 via-[#FDFBFC]/70 to-[#FDFBFC]/20 filter backdrop-blur-[1px]"></div>

        {{-- Elite Background Decor --}}
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-[-25%] left-[-15%] w-[900px] h-[900px] bg-[#B89A72]/10 rounded-full filter blur-[180px]"></div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-8 pb-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">

                {{-- ── LEFT CONTENT: EDITORIAL TYPOGRAPHY ── --}}
                <div class="reveal">
                    {{-- Premium Badge --}}
                    <div class="inline-flex items-center px-4 py-1.5 rounded-full border border-gray-200 mb-8 w-fit bg-white/70 backdrop-blur-sm">
                        <div class="w-1.5 h-1.5 rounded-full bg-[#B89A72] mr-3"></div>
                        <span class="text-[0.6rem] uppercase tracking-widest font-bold text-[#8a7048]">{{ $contents['hero_badge'] ?? 'Keunggulan Hukum Terpercaya' }}</span>
                    </div>

                    {{-- 3-Line Precise Serif Headline --}}
                    <div class="mb-8">
                        <div class="font-serif leading-none tracking-tight text-5xl md:text-6xl lg:text-[5.5rem] font-bold text-[#1a1c2e]">
                            {!! $contents['hero_title'] ?? 'Membela Hak &<br><span style="color:#B89A72;">Masa Depan Anda</span>' !!}
                        </div>
                    </div>

                    {{-- Refined Description --}}
                    <p class="text-base leading-relaxed text-[#5a5e7a] mb-12 max-w-lg font-medium">
                        {{ $contents['hero_subtitle'] ?? 'Layanan hukum profesional dengan integritas dan keunggulan. Kami menyediakan solusi hukum komprehensif untuk individu dan bisnis.' }}
                    </p>

                    {{-- Action Buttons: Bronze Primary --}}
                    <div class="flex flex-wrap items-stretch gap-4 mb-16">
                        <a href="{{ route('contact') }}"
                            class="bg-[#B89A72] text-white px-8 py-4 rounded-xl font-bold transition-all hover:bg-[#a08560] flex items-center justify-center gap-3 w-fit">
                            <i class="far fa-calendar-check text-lg"></i>
                            Konsultasi Gratis
                        </a>
                        <a href="{{ route('services') }}"
                            class="bg-white border text-[#1a1c2e] border-gray-200 px-8 py-4 rounded-xl font-bold transition-all hover:border-[#1a1c2e] flex items-center justify-between gap-6 w-[220px]">
                            Layanan Kami
                            <i class="fas fa-arrow-right text-[0.9rem] text-[#B89A72]"></i>
                        </a>
                    </div>

                    {{-- Value Props --}}
                    <div class="flex flex-wrap items-center gap-10">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-[#B89A72] flex items-center justify-center">
                                <i class="fas fa-check text-[0.6rem] text-white"></i>
                            </div>
                            <span class="text-xs font-bold text-[#1a1c2e] uppercase tracking-wider">Advokat Ahli</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-[#B89A72] flex items-center justify-center">
                                <i class="fas fa-check text-[0.6rem] text-white"></i>
                            </div>
                            <span class="text-xs font-bold text-[#1a1c2e] uppercase tracking-wider">Hasil Terjamin</span>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        {{-- ===================== STATS BAR ===================== --}}
        <div class="relative w-full z-10 pb-6 pt-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="stats-bar bg-white/90 backdrop-blur-md shadow-2xl border border-white/50 rounded-2xl px-6 py-6 reveal">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 divide-x" style="divide-color:rgba(184,154,114,0.15);">
                    <div class="text-center px-4">
                        <div class="text-3xl font-bold counter-animate" data-target="{{ $contents['stat_experience'] ?? 25 }}"
                            style="font-family:'Playfair Display',serif; color:#8a7048;">0</div>
                        <div class="text-xs font-semibold uppercase tracking-wider mt-1" style="color:#5a5e7a;">Tahun Pengalaman</div>
                    </div>
                    <div class="text-center px-4">
                        <div class="text-3xl font-bold counter-animate" data-target="{{ $contents['stat_cases'] ?? 1200 }}"
                            style="font-family:'Playfair Display',serif; color:#8a7048;">0</div>
                        <div class="text-xs font-semibold uppercase tracking-wider mt-1" style="color:#5a5e7a;">Kasus Menang</div>
                    </div>
                    <div class="text-center px-4">
                        <div class="text-3xl font-bold counter-animate" data-target="{{ $contents['stat_lawyers'] ?? 30 }}"
                            style="font-family:'Playfair Display',serif; color:#8a7048;">0</div>
                        <div class="text-xs font-semibold uppercase tracking-wider mt-1" style="color:#5a5e7a;">Pengacara Ahli</div>
                    </div>
                    <div class="text-center px-4">
                        <div class="text-3xl font-bold counter-animate" data-target="{{ $contents['stat_success'] ?? 98 }}"
                            data-suffix="%" style="font-family:'Playfair Display',serif; color:#8a7048;">0</div>
                        <div class="text-xs font-semibold uppercase tracking-wider mt-1" style="color:#5a5e7a;">Tingkat Keberhasilan</div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- ===================== SERVICES PREVIEW ===================== --}}
    <section class="section-padding relative" style="background:#FDFBFC;">
        <div class="absolute inset-0 grid-pattern opacity-25"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <span class="text-uppercase-accent mb-3 block">Layanan Kami</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4"
                    style="font-family:'Playfair Display',serif; color:#242844;">
                    {!! $contents['services_title'] ?? 'Bidang <span style="color:#B89A72;">Praktik</span>' !!}
                </h2>
                <p class="text-lg max-w-2xl mx-auto" style="color:#5a5e7a;">
                    {{ $contents['services_subtitle'] ?? 'Layanan hukum komprehensif yang disesuaikan dengan kebutuhan Anda' }}
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 stagger-children">
                @foreach ($services->take(6) as $index => $service)
                <div class="group glass rounded-2xl p-8 card-lift glow-hover holographic tilt reveal relative overflow-hidden">
                    <span class="service-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="tilt-inner">
                        <div class="flex items-center mb-6">
                            <div class="icon-container group-hover:scale-110 group-hover:-rotate-3 transition-all duration-300">
                                <i class="fas {{ $service->icon }}"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold transition-colors group-hover:text-[#8a7048]"
                                    style="color:#242844;">
                                    {{ $service->title }}
                                </h3>
                            </div>
                        </div>
                        <p class="text-sm leading-relaxed mb-5" style="color:#5a5e7a;">{{ $service->short_description }}</p>
                        <a href="{{ route('services') }}"
                            class="inline-flex items-center text-sm font-semibold transition-colors"
                            style="color:#8a7048;">
                            Pelajari Lebih Lanjut
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12 reveal">
                <a href="{{ route('services') }}" class="btn-outline btn-magnetic">
                    Lihat Semua Layanan <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- ===================== WHY CHOOSE US ===================== --}}
    <section class="section-padding relative" style="background:#F5F3F4;">
        <div class="absolute inset-0 grid-pattern opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="reveal-left">
                    <span class="text-uppercase-accent mb-3 block">Kenapa Memilih MVP Lawfirm</span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6"
                        style="font-family:'Playfair Display',serif; color:#242844;">
                        {!! $contents['why_title'] ?? 'Pengalaman &amp;<br><span style="color:#B89A72;">Keunggulan</span>' !!}
                    </h2>
                    <p class="text-base leading-relaxed mb-8" style="color:#5a5e7a;">
                        {{ $contents['why_description'] ?? 'Dengan pengalaman gabungan lebih dari 25 tahun, tim pengacara berdedikasi kami telah berhasil menangani ribuan kasus, memperoleh kepercayaan klien di seluruh negeri.' }}
                    </p>

                    <div class="space-y-5 stagger-children">
                        @foreach ([
                            ['scale-balanced', $contents['home_feat_1_title'] ?? 'Rekam Jejak Terbukti', $contents['home_feat_1_desc'] ?? 'Tingkat keberhasilan 98% di semua bidang praktik hukum kami'],
                            ['chess-king', $contents['home_feat_2_title'] ?? 'Perhatian Personal', $contents['home_feat_2_desc'] ?? 'Setiap kasus mendapatkan fokus dan strategi yang berdedikasi penuh'],
                            ['file-lines', $contents['home_feat_3_title'] ?? 'Ketersediaan 24/7', $contents['home_feat_3_desc'] ?? 'Dukungan hukum darurat 24 jam untuk masalah mendesak Anda'],
                            ['briefcase', $contents['home_feat_4_title'] ?? 'Biaya Transparan', $contents['home_feat_4_desc'] ?? 'Tidak ada biaya tersembunyi — konsultasi awal selalu gratis'],
                        ] as $feat)
                        <div class="flex items-start gap-4 reveal">
                            <div class="shrink-0 w-11 h-11 rounded-xl flex items-center justify-center border"
                                style="background:linear-gradient(135deg,rgba(184,154,114,0.15),rgba(212,184,150,0.1)); border-color:rgba(184,154,114,0.25);">
                                <i class="fas fa-{{ $feat[0] }}" style="color:#B89A72;"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-0.5" style="color:#242844;">{{ $feat[1] }}</h4>
                                <p class="text-sm" style="color:#5a5e7a;">{{ $feat[2] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('about') }}" class="btn-primary btn-magnetic">
                            Lebih Lanjut Tentang Kami <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                {{-- Visual --}}
                <div class="relative reveal-right">
                    <div class="rounded-3xl overflow-hidden holographic shadow-2xl bg-cover bg-center"
                        style="background: linear-gradient(135deg, rgba(36,40,68,0.7), rgba(45,48,80,0.8)), url('{{ asset('images/bookes.jpg') }}'); background-size: cover; background-position: center; min-height:380px;">
                        <div class="p-10 h-full flex flex-col justify-center items-center text-center">
                            <div class="w-24 h-24 rounded-2xl flex items-center justify-center mb-6 animate-pulse-glow"
                                style="background:linear-gradient(135deg,rgba(184,154,114,0.2),rgba(212,184,150,0.15)); border:1.5px solid rgba(184,154,114,0.3);">
                                <i class="fas fa-trophy text-4xl" style="color:#B89A72;"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-2" style="font-family:'Playfair Display',serif; color:#FDFBFC;">
                                Penghargaan Hukum 2024
                            </h3>
                            <p class="text-sm mb-6" style="color:rgba(253,251,252,0.6);">
                                Diakui sebagai firma hukum terbaik oleh Asosiasi Pengacara Indonesia
                            </p>
                            <div class="grid grid-cols-2 gap-3 w-full">
                                <div class="rounded-xl p-3 text-center"
                                    style="background:rgba(184,154,114,0.12); border:1px solid rgba(184,154,114,0.2);">
                                    <i class="fas fa-star text-lg mb-1" style="color:#B89A72;"></i>
                                    <p class="text-[0.7rem]" style="color:rgba(253,251,252,0.7);">Best Corporate Lawyer</p>
                                </div>
                                <div class="rounded-xl p-3 text-center"
                                    style="background:rgba(184,154,114,0.12); border:1px solid rgba(184,154,114,0.2);">
                                    <div>
                                        <h4 class="text-sm font-bold" style="color:#FDFBFC;">MVP Law Firm</h4>
                                        <p class="text-[0.7rem]" style="color:rgba(253,251,252,0.7);">Keunggulan dalam Layanan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Floating glass badge --}}
                    <div class="absolute -bottom-6 -left-6 glass rounded-2xl p-4 holographic shadow-xl">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center pulse-ring"
                                style="background:linear-gradient(135deg,#B89A72,#d4b896);">
                                <i class="fas fa-shield-alt text-[#242844] text-sm"></i>
                            </div>
                            <div>
                                <div class="font-bold text-sm" style="color:#242844;">Klien Terlindungi</div>
                                <div class="text-xs" style="color:#5a5e7a;">Sejak 1999</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== TEAM PREVIEW ===================== --}}
    <section class="section-padding relative" style="background:#FDFBFC;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <span class="text-uppercase-accent mb-3 block">Tim Kami</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4"
                    style="font-family:'Playfair Display',serif; color:#242844;">
                    {!! $contents['team_title'] ?? 'Temui <span style="color:#B89A72;">Para Ahli</span> Kami' !!}
                </h2>
                <p class="text-lg max-w-2xl mx-auto" style="color:#5a5e7a;">
                    {{ $contents['team_subtitle'] ?? 'Profesional berdedikasi yang berkomitmen pada kesuksesan Anda' }}
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4 stagger-children">
                @foreach ($teams->take(4) as $team)
                <div class="group glass rounded-2xl overflow-hidden card-lift holographic reveal">
                    <div class="relative h-60">
                        @if (!empty($team->photo))
                            <img src="{{ asset('storage/' . $team->photo) }}"
                                alt="{{ $team->name }}"
                                class="w-full h-full object-cover"
                                loading="lazy">
                        @else
                            <div class="avatar-initials h-60">
                                {{ strtoupper(substr($team->name, 0, 1)) }}{{ strtoupper(substr(explode(' ', $team->name)[1] ?? '', 0, 1)) }}
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-linear-to-t from-[#242844]/80 via-[#242844]/20 to-transparent"></div>
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                            style="background:linear-gradient(135deg,rgba(184,154,114,0.1),transparent);"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-5">
                            <h3 class="font-bold text-base group-hover:text-[#d4b896] transition-colors"
                                style="color:#FDFBFC; font-family:'Playfair Display',serif;">
                                {{ $team->name }}
                            </h3>
                            <p class="text-sm" style="color:#d4b896;">{{ $team->position }}</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <p class="text-sm mb-4 leading-relaxed" style="color:#5a5e7a;">{{ Str::limit($team->bio, 75) }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex gap-2">
                                @if(!empty($team->email))
                                <a href="mailto:{{ $team->email }}" aria-label="Email"
                                    class="w-8 h-8 rounded-lg flex items-center justify-center border transition-colors hover:bg-[#8a7048]/20"
                                    style="background:#F5F3F4; border-color:rgba(138,112,72,0.2);">
                                    <i class="fas fa-envelope text-[#8a7048] text-xs"></i>
                                </a>
                                @endif
                                @if(!empty($team->phone))
                                <a href="tel:{{ $team->phone }}" aria-label="Telepon"
                                    class="w-8 h-8 rounded-lg flex items-center justify-center border transition-colors hover:bg-[#8a7048]/20"
                                    style="background:#F5F3F4; border-color:rgba(138,112,72,0.2);">
                                    <i class="fas fa-phone text-[#8a7048] text-xs"></i>
                                </a>
                                @endif
                            </div>
                            <a href="{{ route('team.show', $team) }}" class="text-xs font-semibold transition-colors hover:text-[#6b5639]"
                                style="color:#8a7048;">
                                Profil <i class="fas fa-arrow-right ml-1 text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12 reveal">
                <a href="{{ route('team') }}" class="btn-outline btn-magnetic">
                    Lihat Semua Tim <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- ===================== TESTIMONIALS ===================== --}}
    <section class="section-padding relative overflow-hidden" style="background:#F5F3F4;">
        <div class="absolute inset-0 grid-pattern opacity-20"></div>
        <div class="absolute top-16 left-16 w-80 h-80 rounded-full blur-3xl pointer-events-none"
            style="background:radial-gradient(circle,rgba(184,154,114,0.1),transparent 70%);"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <span class="text-uppercase-accent mb-3 block">Testimoni</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4"
                    style="font-family:'Playfair Display',serif; color:#242844;">
                    {!! $contents['testimonials_title'] ?? 'Apa Kata <span style="color:#B89A72;">Klien</span> Kami' !!}
                </h2>
                <p class="text-lg max-w-2xl mx-auto" style="color:#5a5e7a;">{{ $contents['testimonials_subtitle'] ?? 'Kisah nyata dari klien nyata' }}</p>
            </div>

            <div class="grid gap-8 md:grid-cols-3 stagger-children">
                @foreach ($testimonials->take(3) as $testimonial)
                <div class="glass rounded-2xl p-8 card-lift holographic reveal relative">
                    <span class="quote-icon">"</span>
                    <div class="stars mb-3">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <p class="text-sm leading-relaxed mb-6" style="color:#363a5c;">{{ $testimonial->content }}</p>
                    <div class="flex items-center gap-3 pt-4 border-t" style="border-color:rgba(184,154,114,0.1);">
                        <div class="w-11 h-11 rounded-full flex items-center justify-center font-bold text-base pulse-ring"
                            style="background:linear-gradient(135deg,#B89A72,#d4b896); color:#242844; font-family:'Playfair Display',serif;">
                            {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="font-semibold text-sm" style="color:#242844;">{{ $testimonial->name }}</div>
                            <div class="text-xs" style="color:#8a7048;">{{ $testimonial->position }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== LATEST ARTICLES ===================== --}}
    <section class="section-padding relative" style="background:#FDFBFC;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-4 reveal">
                <div>
                    <span class="text-uppercase-accent mb-2 block">Wawasan Hukum</span>
                    <h2 class="text-4xl md:text-5xl font-bold"
                        style="font-family:'Playfair Display',serif; color:#242844;">
                        {!! $contents['articles_title'] ?? 'Artikel <span style="color:#B89A72;">Terbaru</span>' !!}
                    </h2>
                </div>
                <a href="{{ route('articles') }}" class="btn-outline btn-magnetic shrink-0">
                    Lihat Semua <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="grid gap-8 md:grid-cols-3 stagger-children">
                @foreach ($articles->take(3) as $article)
                <article class="group glass rounded-2xl overflow-hidden card-lift holographic reveal">
                    <div class="h-52 relative overflow-hidden img-placeholder">
                        <div class="absolute inset-0 bg-linear-to-t from-[#242844]/60 to-transparent opacity-60"></div>
                        <div class="absolute top-4 left-4">
                            <span class="badge badge-accent text-[0.65rem]">
                                {{ $article->category ?? 'Hukum' }}
                            </span>
                        </div>
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-400"
                            style="background:linear-gradient(135deg,rgba(184,154,114,0.15),rgba(212,184,150,0.15));"></div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-4 text-xs mb-3" style="color:#5a5e7a;">
                            <span><i class="far fa-calendar-alt mr-1"></i>{{ $article->created_at?->format('d M Y') }}</span>
                            <span><i class="far fa-clock mr-1"></i>5 menit</span>
                        </div>
                        <h3 class="font-semibold text-base mb-3 line-clamp-2 transition-colors group-hover:text-[#8a7048]"
                            style="color:#242844; font-family:'Playfair Display',serif;">
                            {{ $article->title }}
                        </h3>
                        <p class="text-xs leading-relaxed mb-4 line-clamp-2" style="color:#5a5e7a;">
                            {{ Str::limit($article->content, 110) }}
                        </p>
                        <div class="flex items-center justify-between pt-4 border-t" style="border-color:rgba(184,154,114,0.1);">
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-full flex items-center justify-center text-[0.6rem] font-bold"
                                    style="background:linear-gradient(135deg,#B89A72,#d4b896); color:#242844;">
                                    {{ strtoupper(substr($article->author ?? 'A', 0, 1)) }}
                                </div>
                                <span class="text-xs" style="color:#5a5e7a;">{{ $article->author ?? 'Tim Redaksi' }}</span>
                            </div>
                            <a href="#" class="text-xs font-semibold transition-colors hover:text-[#6b5639]"
                                style="color:#8a7048;">
                                Baca <i class="fas fa-arrow-right ml-1 text-[10px] group-hover:translate-x-0.5 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

@endsection
