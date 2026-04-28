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
                    <span class="text-uppercase-accent">Wawasan Hukum</span>
                </div>
                <h1 class="text-5xl md:text-6xl xl:text-7xl font-bold mb-6 leading-[1.08]"
                    style="font-family:'Playfair Display',serif; color:#242844; letter-spacing:-0.02em;">
                    {!! $contents['articles_hero_title'] !!}
                </h1>
                <p class="text-lg md:text-xl leading-relaxed max-w-2xl" style="color:#5a5e7a;">
                    {{ $contents['articles_hero_subtitle'] }}
                </p>
            </div>
        </div>
    </section>

    {{-- ===================== SEARCH + FILTER ===================== --}}
    <section class="py-8 relative" style="background:#F5F3F4; border-bottom:1px solid rgba(184,154,114,0.1);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between reveal">
                {{-- Search --}}
                <div class="search-input-wrap w-full md:max-w-sm">
                    <i class="fas fa-search search-icon text-sm"></i>
                    <input type="text" id="article-search" placeholder="Cari artikel..." class="input-modern pl-10">
                </div>
                {{-- Category Filter --}}
                <div class="flex flex-wrap gap-2">
                    <button class="filter-btn active" data-cat="all">Semua</button>
                    <button class="filter-btn" data-cat="korporasi">Hukum Korporasi</button>
                    <button class="filter-btn" data-cat="keluarga">Hukum Keluarga</button>
                    <button class="filter-btn" data-cat="pidana">Pidana</button>
                    <button class="filter-btn" data-cat="real-estat">Real Estat</button>
                    <button class="filter-btn" data-cat="imigrasi">Imigrasi</button>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== FEATURED ARTICLE ===================== --}}
    @php $articleItems = $articles->items(); $featured = count($articleItems) > 0 ? $articleItems[0] : null; @endphp
    @if ($featured)
    <section class="section-padding relative" style="background:#F5F3F4;">
        <div class="absolute inset-0 grid-pattern opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 mb-8 reveal">
                <div class="h-0.5 w-8 rounded" style="background:linear-gradient(90deg,#B89A72,#d4b896);"></div>
                <span class="text-uppercase-accent">Artikel Unggulan</span>
            </div>
            <div class="glass rounded-3xl overflow-hidden card-lift holographic reveal">
                <div class="grid lg:grid-cols-2">
                    {{-- Image --}}
                    <div class="h-72 lg:h-auto relative img-placeholder">
                        <div class="absolute inset-0 bg-linear-to-t from-[#242844]/60 to-transparent opacity-70"></div>
                        <div class="absolute top-6 left-6">
                            <span class="badge" style="background:linear-gradient(135deg,#B89A72,#d4b896); color:#242844;">
                                Unggulan
                            </span>
                        </div>
                    </div>
                    {{-- Content --}}
                    <div class="p-8 lg:p-12 flex flex-col justify-center">
                        <div class="flex items-center gap-4 text-xs mb-4" style="color:#5a5e7a;">
                            <span><i class="far fa-calendar-alt mr-1"></i>{{ $featured->created_at?->format('d M Y') }}</span>
                            <span><i class="far fa-clock mr-1"></i>8 menit baca</span>
                            <span><i class="far fa-eye mr-1"></i>{{ number_format(rand(1000,5000)) }} dilihat</span>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-bold mb-4 hover:text-[#8a7048] transition-colors cursor-pointer"
                            style="color:#242844; font-family:'Playfair Display',serif;">
                            {{ $featured->title }}
                        </h2>
                        <p class="text-sm leading-relaxed mb-6" style="color:#5a5e7a;">
                            {{ Str::limit($featured->content, 200) }}
                        </p>
                        <div class="flex items-center justify-between pt-4 border-t" style="border-color:rgba(184,154,114,0.12);">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm"
                                    style="background:linear-gradient(135deg,#B89A72,#d4b896); color:#242844; font-family:'Playfair Display',serif;">
                                    {{ strtoupper(substr($featured->author ?? 'A', 0, 1)) }}
                                </div>
                                <div>
                                    <div class="font-semibold text-sm" style="color:#242844;">{{ $featured->author ?? 'Tim Redaksi' }}</div>
                                    <div class="text-xs" style="color:#5a5e7a;">{{ $featured->category ?? 'Hukum Umum' }}</div>
                                </div>
                            </div>
                            <a href="#" class="btn-outline text-sm">
                                Baca Artikel <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- ===================== ARTICLES GRID ===================== --}}
    <section class="section-padding relative" style="background:#FDFBFC;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 mb-10 reveal">
                <div class="h-0.5 w-8 rounded" style="background:linear-gradient(90deg,#B89A72,#d4b896);"></div>
                <span class="text-uppercase-accent">Semua Artikel</span>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3" id="articles-grid">
                @foreach (array_slice($articles->items(), 1) as $article)
                <article class="group glass rounded-2xl overflow-hidden card-lift holographic reveal article-card"
                    data-title="{{ strtolower($article->title) }}"
                    data-category="{{ strtolower($article->category ?? '') }}">
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
                        <p class="text-xs leading-relaxed mb-4 line-clamp-3" style="color:#5a5e7a;">
                            {{ Str::limit($article->content, 130) }}
                        </p>
                        <div class="flex items-center justify-between pt-4 border-t" style="border-color:rgba(184,154,114,0.1);">
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-full flex items-center justify-center text-[0.6rem] font-bold"
                                    style="background:linear-gradient(135deg,#B89A72,#d4b896); color:#242844;">
                                    {{ strtoupper(substr($article->author ?? 'A', 0, 1)) }}
                                </div>
                                <span class="text-xs" style="color:#5a5e7a;">{{ $article->author ?? 'Tim Redaksi' }}</span>
                            </div>
                            <a href="#" class="text-xs font-semibold transition-colors hover:text-[#6b5639]" style="color:#8a7048;">
                                Baca <i class="fas fa-arrow-right ml-1 text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            {{-- No results --}}
            <div id="no-articles" class="hidden text-center py-16">
                <i class="fas fa-newspaper text-4xl mb-4" style="color:rgba(184,154,114,0.3);"></i>
                <p class="text-base" style="color:#5a5e7a;">Tidak ada artikel ditemukan.</p>
            </div>

            {{-- Pagination (Laravel) --}}
            @if (method_exists($articles, 'links'))
            <div class="mt-12 flex justify-center reveal">
                {{ $articles->onEachSide(1)->links() }}
            </div>
            @endif
        </div>
    </section>

@endsection
