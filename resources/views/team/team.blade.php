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
                <span class="text-uppercase-accent mb-3 block">Tim Kami</span>
                <h1 class="text-5xl md:text-6xl xl:text-7xl font-bold mb-6"
                    style="font-family:'Playfair Display',serif; color:#242844; letter-spacing:-0.02em;">
                    {!! $contents['team_hero_title'] !!}
                </h1>
                <p class="text-lg md:text-xl leading-relaxed" style="color:#5a5e7a;">
                    {{ $contents['team_hero_subtitle'] }}
                </p>
            </div>
        </div>
    </section>

    {{-- ===================== TEAM GRID ===================== --}}
    <section class="section-padding relative" style="background:#F5F3F4;">
        <div class="absolute inset-0 grid-pattern opacity-25"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Filter Buttons --}}
            <div class="flex flex-wrap justify-center gap-3 mb-12 reveal">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="Partner">Partner</button>
                <button class="filter-btn" data-filter="Associate">Associate</button>
                <button class="filter-btn" data-filter="Senior">Senior</button>
                <button class="filter-btn" data-filter="Support">Dukungan</button>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 stagger-children" id="team-grid">
                @foreach ($teams as $team)
                <div class="group glass rounded-2xl overflow-hidden card-lift holographic reveal team-card"
                    data-category="{{ $team->position }}">
                    {{-- Photo / Avatar --}}
                    <div class="relative h-72 overflow-hidden">
                        @if (!empty($team->photo))
                            <img src="{{ asset('storage/' . $team->photo) }}"
                                alt="{{ $team->name }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                loading="lazy">
                        @else
                            <div class="avatar-initials h-72">
                                {{ strtoupper(substr($team->name, 0, 1)) }}{{ strtoupper(substr(explode(' ', $team->name)[1] ?? '', 0, 1)) }}
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-linear-to-t from-[#242844]/80 via-[#242844]/20 to-transparent"></div>
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-400"
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
                        <p class="text-sm leading-relaxed mb-4" style="color:#5a5e7a;">{{ Str::limit($team->bio, 90) }}</p>

                        {{-- Practice area tags --}}
                        @if (!empty($team->specialization))
                        <div class="flex flex-wrap gap-1 mb-4">
                            @foreach (explode(',', $team->specialization) as $spec)
                            <span class="badge badge-dark text-[0.6rem]">{{ trim($spec) }}</span>
                            @endforeach
                        </div>
                        @endif

                        <div class="flex items-center justify-between pt-3 border-t" style="border-color:rgba(184,154,114,0.1);">
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
                            <a href="{{ route('team.show', $team) }}" class="text-xs font-semibold transition-colors hover:text-[#6b5639]" style="color:#8a7048;">
                                Profil <i class="fas fa-arrow-right ml-1 text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Empty state --}}
            <div id="no-results" class="hidden text-center py-16">
                <i class="fas fa-users text-4xl mb-4" style="color:rgba(184,154,114,0.3);"></i>
                <p class="text-base" style="color:#5a5e7a;">Tidak ada anggota tim untuk kategori ini.</p>
            </div>
        </div>
    </section>

    {{-- ===================== STATS ===================== --}}
    <section class="section-padding relative" style="background:#FDFBFC;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 stagger-children">
                @foreach ([
                    ['users', '50', 'Anggota Tim'],
                    ['graduation-cap', '120', 'Tahun Pengalaman Gabungan'],
                    ['award', '35', 'Penghargaan Industri'],
                    ['briefcase', '15', 'Bidang Praktik'],
                ] as [$icon, $num, $label])
                <div class="text-center reveal">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-2xl flex items-center justify-center border"
                        style="background:linear-gradient(135deg,rgba(184,154,114,0.12),rgba(212,184,150,0.08)); border-color:rgba(184,154,114,0.2);">
                        <i class="fas fa-{{ $icon }} text-2xl" style="color:#8a7048;"></i>
                    </div>
                    <div class="text-4xl font-bold mb-1 counter-animate" data-target="{{ $num }}"
                        style="font-family:'Playfair Display',serif; color:#8a7048;">0</div>
                    <div class="text-sm" style="color:#5a5e7a;">{{ $label }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- JS: Team Filter --}}
    <script>
    (function () {
        var btns = document.querySelectorAll('.filter-btn');
        var cards = document.querySelectorAll('.team-card');
        var noResults = document.getElementById('no-results');

        function filterTeam(category) {
            var visible = 0;
            cards.forEach(function (card) {
                var cat = card.getAttribute('data-category') || '';
                var show = (category === 'all') || cat.toLowerCase().includes(category.toLowerCase());
                if (show) {
                    card.style.display = '';
                    card.style.opacity = '1';
                    visible++;
                } else {
                    card.style.display = 'none';
                }
            });
            noResults.classList.toggle('hidden', visible > 0);
        }

        btns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                btns.forEach(function (b) { b.classList.remove('active'); });
                this.classList.add('active');
                filterTeam(this.getAttribute('data-filter'));
            });
        });
    })();
    </script>

@endsection
