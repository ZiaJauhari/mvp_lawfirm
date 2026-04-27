@extends('layouts.app')

@section('content')

    {{-- ===================== HERO ===================== --}}
    <section class="relative py-32 overflow-hidden hero-pattern" style="background:#FDFBFC;">
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute top-16 left-16 w-96 h-96 rounded-full blur-3xl animate-float"
                style="background:radial-gradient(circle,rgba(184,154,114,0.1),transparent 70%);"></div>
            <div class="absolute bottom-16 right-16 w-72 h-72 rounded-full blur-3xl animate-float"
                style="background:radial-gradient(circle,rgba(212,184,150,0.08),transparent 70%); animation-delay:1.2s;"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl reveal">
                <div class="flex items-center gap-4 mb-6">
                    <div class="h-0.5 w-12 rounded" style="background:linear-gradient(90deg,#B89A72,#d4b896);"></div>
                    <span class="text-uppercase-accent">Tentang Kami</span>
                </div>
                <h1 class="text-5xl md:text-6xl xl:text-7xl font-bold mb-6 leading-[1.08]"
                    style="font-family:'Playfair Display',serif; color:#242844; letter-spacing:-0.02em;">
                    {!! $contents['about_hero_title'] !!}
                </h1>
                <p class="text-lg md:text-xl leading-relaxed max-w-2xl" style="color:#5a5e7a;">
                    {{ $contents['about_hero_subtitle'] }}
                </p>
            </div>
        </div>
    </section>

    {{-- ===================== MISSION & VISION ===================== --}}
    <section class="section-padding relative" style="background:#F5F3F4;">
        <div class="absolute inset-0 grid-pattern opacity-25"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-6 reveal-left">
                    {{-- Mission --}}
                    <div class="glass rounded-2xl p-8 holographic card-lift">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center border pulse-ring"
                                style="background:linear-gradient(135deg,rgba(184,154,114,0.15),rgba(212,184,150,0.1)); border-color:rgba(184,154,114,0.25);">
                                <i class="fas fa-bullseye text-xl" style="color:#8a7048;"></i>
                            </div>
                            <h3 class="text-2xl font-bold" style="font-family:'Playfair Display',serif; color:#242844;">{{ $contents['about_mission_title'] }}</h3>
                        </div>
                        <p class="text-sm leading-relaxed" style="color:#5a5e7a;">
                            {{ $contents['about_mission_text'] }}
                        </p>
                    </div>

                    {{-- Vision --}}
                    <div class="glass rounded-2xl p-8 holographic card-lift">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center border pulse-ring"
                                style="background:linear-gradient(135deg,rgba(184,154,114,0.15),rgba(212,184,150,0.1)); border-color:rgba(184,154,114,0.25);">
                                <i class="fas fa-eye text-xl" style="color:#8a7048;"></i>
                            </div>
                            <h3 class="text-2xl font-bold" style="font-family:'Playfair Display',serif; color:#242844;">{{ $contents['about_vision_title'] }}</h3>
                        </div>
                        <p class="text-sm leading-relaxed" style="color:#5a5e7a;">
                            {{ $contents['about_vision_text'] }}
                        </p>
                    </div>
                </div>

                {{-- Right visual --}}
                <div class="reveal-right">
                    <div class="rounded-3xl overflow-hidden holographic shadow-2xl"
                        style="background:linear-gradient(135deg,#242844,#2d3050); min-height:360px;">
                        <div class="p-10 flex flex-col justify-center items-center text-center h-full">
                            <div class="w-24 h-24 rounded-2xl flex items-center justify-center mb-6 animate-pulse-glow"
                                style="background:linear-gradient(135deg,rgba(184,154,114,0.2),rgba(212,184,150,0.12)); border:1.5px solid rgba(184,154,114,0.3);">
                                <i class="fas fa-balance-scale text-4xl" style="color:#B89A72;"></i>
                            </div>
                            <blockquote class="text-lg font-medium leading-relaxed mb-4 italic"
                                style="font-family:'Playfair Display',serif; color:#FDFBFC;">
                                "Keadilan bukan hanya sebuah kata — itu adalah komitmen yang kami pegang setiap hari."
                            </blockquote>
                            <div class="text-sm" style="color:rgba(212,184,150,0.8);">— Pendiri MVP Law Firm</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== CORE VALUES ===================== --}}
    <section class="section-padding relative" style="background:#FDFBFC;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <span class="text-uppercase-accent mb-3 block">Nilai-Nilai Kami</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4"
                    style="font-family:'Playfair Display',serif; color:#242844;">
                    {!! $contents['about_values_title'] !!}
                </h2>
                <p class="text-lg max-w-2xl mx-auto" style="color:#5a5e7a;">
                    {{ $contents['about_values_subtitle'] }}
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4 stagger-children">
                @foreach ([
                    ['shield-alt', 'Integritas', 'Komitmen tak tergoyahkan terhadap praktik etis dan nasihat yang jujur kepada setiap klien'],
                    ['trophy', 'Keunggulan', 'Pengejaran tanpa henti terhadap standar tertinggi dalam setiap kasus yang kami tangani'],
                    ['users', 'Fokus Klien', 'Menempatkan kebutuhan dan kepentingan klien selalu di atas segalanya dalam setiap keputusan'],
                    ['lightbulb', 'Inovasi', 'Menerapkan pendekatan modern dan kreatif sambil menghormati tradisi dan nilai hukum'],
                ] as [$icon, $title, $desc])
                <div class="glass rounded-2xl p-8 card-lift holographic reveal text-center relative overflow-hidden group">
                    {{-- Background icon --}}
                    <div class="absolute bottom-4 right-4 opacity-[0.04] text-[5rem] leading-none pointer-events-none">
                        <i class="fas fa-{{ $icon }}" style="color:#242844;"></i>
                    </div>
                    <div class="w-16 h-16 mx-auto mb-5 rounded-2xl flex items-center justify-center border pulse-ring"
                        style="background:linear-gradient(135deg,rgba(184,154,114,0.15),rgba(212,184,150,0.08)); border-color:rgba(184,154,114,0.2);">
                        <i class="fas fa-{{ $icon }} text-2xl" style="color:#8a7048;"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-3" style="color:#242844; font-family:'Playfair Display',serif;">{{ $title }}</h3>
                    <p class="text-sm leading-relaxed" style="color:#5a5e7a;">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== TIMELINE ===================== --}}
    <section class="section-padding relative" style="background:#F5F3F4;">
        <div class="absolute inset-0 grid-pattern opacity-20"></div>
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <span class="text-uppercase-accent mb-3 block">Perjalanan Kami</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4"
                    style="font-family:'Playfair Display',serif; color:#242844;">
                    {!! $contents['about_timeline_title'] !!}
                </h2>
                <p class="text-lg max-w-2xl mx-auto" style="color:#5a5e7a;">{{ $contents['about_timeline_subtitle'] }}</p>
            </div>

            {{-- Vertical Timeline --}}
            <div class="relative">
                <div class="timeline-line hidden md:block"></div>

                <div class="space-y-10">
                    @foreach ([
                        ['1999', 'Firma Didirikan', 'MVP Law Firm didirikan dengan visi menyediakan layanan hukum berkualitas tinggi yang dapat diakses oleh semua kalangan.', 'left'],
                        ['2005', 'Ekspansi Regional', 'Membuka kantor tambahan dan memperluas tim untuk melayani lebih banyak klien di berbagai wilayah Indonesia.', 'right'],
                        ['2012', 'Penghargaan Nasional', 'Menerima berbagai penghargaan bergengsi untuk keunggulan di bidang hukum korporasi dan keluarga dari asosiasi nasional.', 'left'],
                        ['2018', 'Transformasi Digital', 'Mengadopsi teknologi hukum terkini untuk meningkatkan layanan dan aksesibilitas klien secara digital.', 'right'],
                        ['2024', 'Inovasi & Pertumbuhan', 'Meluncurkan layanan digital inovatif dan memperluas tim ke 50+ pengacara ahli di berbagai bidang hukum.', 'left'],
                    ] as [$year, $title, $desc, $side])
                    <div class="relative reveal">
                        <div class="md:flex items-center {{ $side === 'left' ? 'md:flex-row' : 'md:flex-row-reverse' }}">
                            <div class="md:w-5/12 {{ $side === 'left' ? 'md:pr-12 md:text-right' : 'md:pl-12 md:text-left' }} mb-4 md:mb-0">
                                <div class="glass rounded-2xl p-6 holographic card-lift inline-block w-full md:w-auto">
                                    <div class="text-2xl font-bold mb-1" style="font-family:'Playfair Display',serif; color:#B89A72;">{{ $year }}</div>
                                    <h4 class="text-base font-semibold mb-2" style="color:#242844;">{{ $title }}</h4>
                                    <p class="text-sm leading-relaxed" style="color:#5a5e7a;">{{ $desc }}</p>
                                </div>
                            </div>
                            {{-- Center dot --}}
                            <div class="hidden md:flex md:w-2/12 justify-center">
                                <div class="timeline-dot"></div>
                            </div>
                            <div class="md:w-5/12"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== STATS ===================== --}}
    <section class="section-padding relative" style="background:#FDFBFC;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 stagger-children">

                <div class="text-center reveal">
                    <div class="text-5xl font-bold mb-2 counter-animate" data-target="25"
                        style="font-family:'Playfair Display',serif; color:#8a7048;">0</div>
                    <div class="font-semibold mb-1 text-sm" style="color:#242844;">Tahun Pengalaman</div>
                    <div class="text-xs" style="color:#5a5e7a;">Melayani klien sejak 1999</div>
                </div>

                <div class="text-center reveal">
                    <div class="text-5xl font-bold mb-2 counter-animate" data-target="50"
                        style="font-family:'Playfair Display',serif; color:#8a7048;">0</div>
                    <div class="font-semibold mb-1 text-sm" style="color:#242844;">Pengacara Ahli</div>
                    <div class="text-xs" style="color:#5a5e7a;">Profesional hukum berdedikasi</div>
                </div>

                <div class="text-center reveal">
                    <div class="text-5xl font-bold mb-2 counter-animate" data-target="10000"
                        style="font-family:'Playfair Display',serif; color:#8a7048;">0</div>
                    <div class="font-semibold mb-1 text-sm" style="color:#242844;">Kasus Ditangani</div>
                    <div class="text-xs" style="color:#5a5e7a;">Representasi yang sukses</div>
                </div>

                <div class="text-center reveal">
                    <div class="text-5xl font-bold mb-2 counter-animate" data-target="98"
                        data-suffix="%" style="font-family:'Playfair Display',serif; color:#8a7048;">0</div>
                    <div class="font-semibold mb-1 text-sm" style="color:#242844;">Tingkat Keberhasilan</div>
                    <div class="text-xs" style="color:#5a5e7a;">Kepuasan klien terjamin</div>
                </div>

            </div>
        </div>
    </section>

@endsection
