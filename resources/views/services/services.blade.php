@extends('layouts.app')

@section('content')

    {{-- ===================== HERO ===================== --}}
    <section class="relative py-32 overflow-hidden hero-pattern" style="background:#FDFBFC;">
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute top-16 right-16 w-96 h-96 rounded-full blur-3xl animate-float"
                style="background:radial-gradient(circle,rgba(184,154,114,0.1),transparent 70%);"></div>
            <div class="absolute bottom-16 left-16 w-72 h-72 rounded-full blur-3xl animate-float"
                style="background:radial-gradient(circle,rgba(212,184,150,0.08),transparent 70%); animation-delay:1.2s;"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="reveal max-w-3xl mx-auto">
                <span class="text-uppercase-accent mb-3 block">Layanan Kami</span>
                <h1 class="text-5xl md:text-6xl xl:text-7xl font-bold mb-6"
                    style="font-family:'Playfair Display',serif; color:#242844; letter-spacing:-0.02em;">
                    {!! $contents['services_hero_title'] !!}
                </h1>
                <p class="text-lg md:text-xl leading-relaxed" style="color:#5a5e7a;">
                    {{ $contents['services_hero_subtitle'] }}
                </p>
            </div>
        </div>
    </section>

    {{-- ===================== SERVICES GRID ===================== --}}
    <section class="section-padding relative" style="background:#F5F3F4;">
        <div class="absolute inset-0 grid-pattern opacity-25"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 stagger-children">
                @foreach ($services as $index => $service)
                <div class="group glass rounded-2xl card-lift glow-hover holographic tilt reveal relative flex flex-col h-full overflow-visible" style="isolation: isolate;">
                    <span class="service-number z-0">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="tilt-inner p-8 flex flex-col grow relative z-10">
                        <div class="flex items-center mb-6">
                            <div class="icon-container shrink-0 shadow-lg">
                                <i class="fas {{ $service->icon }}"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-bold transition-colors group-hover:text-[#8a7048]"
                                    style="color:#242844; font-family:'Playfair Display',serif;">
                                    {{ $service->title }}
                                </h3>
                            </div>
                        </div>
                        
                        <div class="mb-6 grow">
                            @if($service->short_description && $service->short_description != $service->description)
                                <p class="text-sm leading-relaxed mb-4" style="color:#5a5e7a;">{{ $service->short_description }}</p>
                            @endif
                            <p class="text-sm leading-relaxed" style="color:#363a5c;">{{ $service->description }}</p>
                        </div>

                        <div class="space-y-3 mb-8 pt-4 border-t border-[#B89A72]/5">
                            @foreach (['Konsultasi Ahli', 'Analisis Kasus Mendalam', 'Dukungan Berkelanjutan'] as $feat)
                            <div class="flex items-center gap-3 text-sm" style="color:#5a5e7a;">
                                <i class="fas fa-check-circle text-xs" style="color:#8a7048;"></i>
                                <span class="font-medium">{{ $feat }}</span>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-auto pt-5 border-t border-[#B89A72]/10 flex items-center justify-between">
                            <a href="{{ route('contact') }}"
                                class="inline-flex items-center text-sm font-bold transition-all group-hover:gap-3"
                                style="color:#8a7048;">
                                Konsultasi Sekarang
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== PROCESS ===================== --}}
    <section class="section-padding relative" style="background:#FDFBFC;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <span class="text-uppercase-accent mb-3 block">{!! $contents['services_approach_title'] !!}</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4"
                    style="font-family:'Playfair Display',serif; color:#242844;">
                    {{ $contents['services_approach_subtitle'] }}
                </h2>
                <p class="text-lg max-w-2xl mx-auto" style="color:#5a5e7a;">
                    Pendekatan yang efisien dan terstruktur untuk memberikan layanan hukum terbaik
                </p>
            </div>

            <div class="relative grid gap-8 md:grid-cols-4 stagger-children">
                {{-- Hidden connecting line on desktop --}}
                <div class="hidden md:block absolute top-10 left-[12.5%] right-[12.5%] h-px"
                    style="background:linear-gradient(90deg,transparent,rgba(184,154,114,0.4) 20%,rgba(184,154,114,0.4) 80%,transparent); z-index:0;"></div>

                @foreach ([
                    ['fas fa-phone', '01', $contents['services_process_1_title'] ?? 'Konsultasi', $contents['services_process_1_desc'] ?? 'Konsultasi awal gratis untuk memahami kebutuhan hukum Anda secara menyeluruh'],
                    ['fas fa-search', '02', $contents['services_process_2_title'] ?? 'Analisis', $contents['services_process_2_desc'] ?? 'Analisis kasus mendalam dan perumusan strategi hukum yang tepat sasaran'],
                    ['fas fa-gavel', '03', $contents['services_process_3_title'] ?? 'Eksekusi', $contents['services_process_3_desc'] ?? 'Representasi hukum profesional dan manajemen kasus yang terstruktur'],
                    ['fas fa-check-double', '04', $contents['services_process_4_title'] ?? 'Resolusi', $contents['services_process_4_desc'] ?? 'Mencapai hasil terbaik dan memastikan kepuasan klien sepenuhnya'],
                ] as [$icon, $num, $title, $desc])
                <div class="text-center reveal relative z-10">
                    <div class="process-step-icon mb-5 pulse-ring" style="position:relative; z-index:1;">
                        <span class="process-step-number">{{ $num }}</span>
                        <i class="{{ $icon }} text-2xl" style="color:#8a7048;"></i>
                    </div>
                    <h3 class="font-semibold text-lg mb-2" style="color:#242844; font-family:'Playfair Display',serif;">
                        {{ $title }}
                    </h3>
                    <p class="text-sm leading-relaxed" style="color:#5a5e7a;">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== PRICING ===================== --}}
    <section class="section-padding relative" style="background:#F5F3F4;">
        <div class="absolute inset-0 grid-pattern opacity-25"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <span class="text-uppercase-accent mb-3 block">Paket Layanan</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4"
                    style="font-family:'Playfair Display',serif; color:#242844;">
                    Harga <span style="color:#B89A72;">Transparan</span>
                </h2>
                <p class="text-lg max-w-2xl mx-auto" style="color:#5a5e7a;">
                    Tidak ada biaya tersembunyi. Konsultasi awal selalu gratis.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-3 stagger-children pt-10">
                {{-- Basic --}}
                <div class="glass rounded-2xl p-8 card-lift holographic reveal flex flex-col h-full overflow-visible">
                    <div class="mb-6">
                        <h3 class="text-xl font-bold mb-1" style="color:#242844; font-family:'Playfair Display',serif;">{{ $contents['services_pricing_1_title'] ?? 'Dasar' }}</h3>
                        <p class="text-sm" style="color:#5a5e7a;">{{ $contents['services_pricing_1_desc'] ?? 'Untuk masalah hukum sederhana' }}</p>
                    </div>
                    <div class="mb-8 text-center py-6 px-4 rounded-2xl transition-all hover:bg-[#B89A72]/10" 
                        style="background:rgba(184,154,114,0.06); border:1.5px solid rgba(184,154,114,0.12);">
                        <div class="text-2xl font-bold mb-1" style="color:#8a7048; font-family:'Playfair Display',serif; letter-spacing: -0.01em;">
                            {{ $contents['services_pricing_1_price'] ?? 'Hubungi Kami' }}
                        </div>
                        <div class="text-xs font-medium uppercase tracking-wider" style="color:#5a5e7a; opacity: 0.8;">{{ $contents['services_pricing_1_subprice'] ?? 'Harga sesuai kebutuhan' }}</div>
                    </div>
                    <ul class="space-y-4 mb-8 grow">
                        @php
                            $features1 = explode("\n", $contents['services_pricing_1_features'] ?? "Konsultasi Awal Gratis\nTinjauan Dokumen\nSaran Hukum Dasar\nDukungan via Email");
                        @endphp
                        @foreach ($features1 as $item)
                        @if(trim($item))
                        <li class="flex items-start gap-3 text-sm leading-snug" style="color:#5a5e7a;">
                            <i class="fas fa-check-circle mt-0.5" style="color:#8a7048;"></i>
                            <span>{{ trim($item) }}</span>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    <div class="mt-auto">
                        <a href="{{ route('contact') }}" class="btn-outline w-full text-center block py-4">Mulai Sekarang</a>
                    </div>
                </div>

                {{-- Professional (featured) --}}
                <div class="glass rounded-2xl p-8 card-lift holographic reveal relative border-2 flex flex-col h-full overflow-visible" style="border-color:rgba(184,154,114,0.4); isolation: isolate; overflow: visible !important;">
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 z-20">
                        <span class="badge badge-accent shadow-lg px-6 py-2 border-none" style="background: linear-gradient(135deg, #B89A72, #d4b896); color: #242844;">Paling Populer</span>
                    </div>
                    <div class="absolute inset-0 rounded-2xl pointer-events-none"
                        style="background:linear-gradient(to bottom,rgba(184,154,114,0.06),transparent);"></div>
                    <div class="relative mb-6">
                        <h3 class="text-xl font-bold mb-1" style="color:#242844; font-family:'Playfair Display',serif;">{{ $contents['services_pricing_2_title'] ?? 'Profesional' }}</h3>
                        <p class="text-sm" style="color:#5a5e7a;">{{ $contents['services_pricing_2_desc'] ?? 'Untuk kebutuhan hukum menengah-kompleks' }}</p>
                    </div>
                    <div class="relative mb-8 text-center py-6 px-4 rounded-2xl shadow-inner-sm transition-all hover:bg-[#B89A72]/15" 
                        style="background:rgba(184,154,114,0.1); border:1.5px solid rgba(184,154,114,0.25);">
                        <div class="text-2xl font-bold mb-1" style="color:#8a7048; font-family:'Playfair Display',serif; letter-spacing: -0.01em;">
                            {{ $contents['services_pricing_2_price'] ?? 'Hubungi Kami' }}
                        </div>
                        <div class="text-xs font-medium uppercase tracking-wider" style="color:#5a5e7a; opacity: 0.8;">{{ $contents['services_pricing_2_subprice'] ?? 'Konsultasi & penawaran gratis' }}</div>
                    </div>
                    <ul class="relative space-y-4 mb-8 grow">
                        @php
                            $features2 = explode("\n", $contents['services_pricing_2_features'] ?? "Semua di Paket Dasar\nStrategi Kasus Mendalam\nRepresentasi Pengadilan\nDukungan Prioritas\nPersiapan & Review Dokumen");
                        @endphp
                        @foreach ($features2 as $item)
                        @if(trim($item))
                        <li class="flex items-start gap-3 text-sm font-medium leading-snug" style="color:#363a5c;">
                            <i class="fas fa-check-circle mt-0.5" style="color:#8a7048;"></i>
                            <span>{!! trim($item) !!}</span>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    <div class="relative mt-auto">
                        <a href="{{ route('contact') }}" class="btn-primary w-full text-center block py-4 shadow-xl">Mulai Sekarang</a>
                    </div>
                </div>

                {{-- Enterprise --}}
                <div class="glass rounded-2xl p-8 card-lift holographic reveal flex flex-col h-full overflow-visible">
                    <div class="mb-6">
                        <h3 class="text-xl font-bold mb-1" style="color:#242844; font-family:'Playfair Display',serif;">{{ $contents['services_pricing_3_title'] ?? 'Enterprise' }}</h3>
                        <p class="text-sm" style="color:#5a5e7a;">{{ $contents['services_pricing_3_desc'] ?? 'Untuk bisnis & korporasi besar' }}</p>
                    </div>
                    <div class="mb-8 text-center py-6 px-4 rounded-2xl transition-all hover:bg-[#242844]/5" 
                        style="background:rgba(36,40,68,0.05); border:1.5px solid rgba(36,40,68,0.1);">
                        <div class="text-2xl font-bold mb-1" style="color:#242844; font-family:'Playfair Display',serif; letter-spacing: -0.01em;">
                            {{ $contents['services_pricing_3_price'] ?? 'Kustom' }}
                        </div>
                        <div class="text-xs font-medium uppercase tracking-wider" style="color:#5a5e7a; opacity: 0.8;">{{ $contents['services_pricing_3_subprice'] ?? 'Sesuai skala & kebutuhan bisnis' }}</div>
                    </div>
                    <ul class="space-y-4 mb-8 grow">
                        @php
                            $features3 = explode("\n", $contents['services_pricing_3_features'] ?? "Semua di Paket Profesional\nTim Hukum Khusus\nDukungan Prioritas 24/7\nManajemen Kepatuhan\nSolusi Hukum Kustom");
                        @endphp
                        @foreach ($features3 as $item)
                        @if(trim($item))
                        <li class="flex items-start gap-3 text-sm leading-snug" style="color:#5a5e7a;">
                            <i class="fas fa-check-circle mt-0.5" style="color:#8a7048;"></i>
                            <span>{{ trim($item) }}</span>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    <div class="mt-auto">
                        <a href="{{ route('contact') }}" class="btn-outline w-full text-center block py-4">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
