@extends('layouts.app')

@section('content')

    {{-- ===================== HERO ===================== --}}
    <section class="relative py-32 overflow-hidden hero-pattern" style="background:#FDFBFC;">
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute top-16 left-16 w-96 h-96 rounded-full blur-3xl animate-float"
                style="background:radial-gradient(circle,rgba(184,154,114,0.1),transparent 70%);"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl reveal">
                <div class="flex items-center gap-4 mb-6">
                    <div class="h-0.5 w-12 rounded" style="background:linear-gradient(90deg,#B89A72,#d4b896);"></div>
                    <span class="text-uppercase-accent">{{ $article->category ?? 'Artikel' }}</span>
                </div>
                <h1 class="text-4xl md:text-5xl xl:text-6xl font-bold mb-6 leading-[1.08]"
                    style="font-family:'Playfair Display',serif; color:#242844; letter-spacing:-0.02em;">
                    {{ $article->title }}
                </h1>
                <div class="flex items-center gap-6 text-sm" style="color:#5a5e7a;">
                    <span><i class="far fa-calendar-alt mr-1"></i>{{ $article->created_at?->format('d M Y') }}</span>
                    <span><i class="far fa-user mr-1"></i>{{ $article->author ?? 'Tim Redaksi' }}</span>
                    <span><i class="far fa-eye mr-1"></i>{{ number_format($article->views ?? 0) }} dilihat</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== ARTICLE CONTENT ===================== --}}
    <section class="section-padding relative" style="background:#F5F3F4;">
        <div class="absolute inset-0 grid-pattern opacity-25"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass rounded-2xl p-8 md:p-12 holographic reveal">
                <div class="prose max-w-none text-base leading-relaxed" style="color:#363a5c;">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== RELATED ARTICLES ===================== --}}
    @if ($relatedArticles->count() > 0)
    <section class="section-padding relative" style="background:#FDFBFC;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 mb-10 reveal">
                <div class="h-0.5 w-8 rounded" style="background:linear-gradient(90deg,#B89A72,#d4b896);"></div>
                <span class="text-uppercase-accent">Artikel Terkait</span>
            </div>

            <div class="grid gap-8 md:grid-cols-3 stagger-children">
                @foreach ($relatedArticles as $related)
                <article class="group glass rounded-2xl overflow-hidden card-lift holographic reveal">
                    <div class="h-52 relative overflow-hidden img-placeholder">
                        <div class="absolute inset-0 bg-linear-to-t from-[#242844]/60 to-transparent opacity-60"></div>
                        <div class="absolute top-4 left-4">
                            <span class="badge badge-accent text-[0.65rem]">
                                {{ $related->category ?? 'Hukum' }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-4 text-xs mb-3" style="color:#5a5e7a;">
                            <span><i class="far fa-calendar-alt mr-1"></i>{{ $related->created_at?->format('d M Y') }}</span>
                        </div>
                        <h3 class="font-semibold text-base mb-3 line-clamp-2 transition-colors group-hover:text-[#8a7048]"
                            style="color:#242844; font-family:'Playfair Display',serif;">
                            {{ $related->title }}
                        </h3>
                        <p class="text-xs leading-relaxed mb-4 line-clamp-2" style="color:#5a5e7a;">
                            {{ Str::limit($related->content, 110) }}
                        </p>
                        <a href="#" class="text-xs font-semibold transition-colors hover:text-[#6b5639]"
                            style="color:#8a7048;">
                            Baca <i class="fas fa-arrow-right ml-1 text-[10px]"></i>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="text-center mt-12 reveal">
                <a href="{{ route('articles') }}" class="btn-outline btn-magnetic">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali ke Artikel
                </a>
            </div>
        </div>
    </section>
    @endif

@endsection
