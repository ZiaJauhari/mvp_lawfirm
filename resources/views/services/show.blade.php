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
                    <span class="text-uppercase-accent">Detail Layanan</span>
                </div>
                <h1 class="text-5xl md:text-6xl xl:text-7xl font-bold mb-6 leading-[1.08]"
                    style="font-family:'Playfair Display',serif; color:#242844; letter-spacing:-0.02em;">
                    {{ $service->title }}
                </h1>
                <p class="text-lg md:text-xl leading-relaxed max-w-2xl" style="color:#5a5e7a;">
                    {{ $service->short_description }}
                </p>
            </div>
        </div>
    </section>

    {{-- ===================== SERVICE DETAIL ===================== --}}
    <section class="section-padding relative" style="background:#F5F3F4;">
        <div class="absolute inset-0 grid-pattern opacity-25"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass rounded-2xl p-8 md:p-12 holographic reveal">
                <div class="flex items-center gap-4 mb-8">
                    <div class="icon-container shrink-0">
                        <i class="fas {{ $service->icon }}"></i>
                    </div>
                    <h2 class="text-2xl font-bold" style="color:#242844; font-family:'Playfair Display',serif;">
                        {{ $service->title }}
                    </h2>
                </div>

                <div class="prose max-w-none text-sm leading-relaxed" style="color:#5a5e7a;">
                    {!! nl2br(e($service->description)) !!}
                </div>

                <div class="mt-10 pt-8 border-t" style="border-color:rgba(184,154,114,0.12);">
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('contact') }}" class="btn-primary btn-magnetic">
                            <i class="fas fa-phone-alt mr-2"></i>Konsultasi Sekarang
                        </a>
                        <a href="{{ route('services') }}" class="btn-outline btn-magnetic">
                            <i class="fas fa-arrow-left mr-2"></i>Semua Layanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
