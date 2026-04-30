@extends('layouts.app')

@section('title', $team->name . ' - Profil Anggota | ' . config('app.name', 'MVP Law Firm'))

@section('content')

    {{-- ===================== HERO ===================== --}}
    <section class="relative py-32 overflow-hidden hero-pattern" style="background:#FDFBFC;">
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute top-16 right-16 w-96 h-96 rounded-full blur-3xl animate-float"
                style="background:radial-gradient(circle,rgba(184,154,114,0.1),transparent 70%);"></div>
            <div class="absolute bottom-16 left-16 w-72 h-72 rounded-full blur-3xl animate-float"
                style="background:radial-gradient(circle,rgba(212,184,150,0.08),transparent 70%); animation-delay:1.2s;"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl reveal">
                <div class="flex items-center gap-4 mb-6">
                    <div class="h-0.5 w-12 rounded" style="background:linear-gradient(90deg,#B89A72,#d4b896);"></div>
                    <span class="text-uppercase-accent">Profil Anggota</span>
                </div>
                <h1 class="text-5xl md:text-6xl xl:text-7xl font-bold mb-4 leading-[1.08]"
                    style="font-family:'Playfair Display',serif; color:#242844; letter-spacing:-0.02em;">
                    {{ $team->name }}
                </h1>
                <p class="text-lg md:text-xl leading-relaxed" style="color:#B89A72; font-weight:600;">
                    {{ $team->position }}
                </p>
            </div>
        </div>
    </section>

    {{-- ===================== PROFILE DETAIL ===================== --}}
    <section class="section-padding relative" style="background:#F5F3F4;">
        <div class="absolute inset-0 grid-pattern opacity-25"></div>
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-3 items-start">

                {{-- LEFT: Photo & Contact --}}
                <div class="lg:col-span-1 reveal">
                    <div class="glass rounded-2xl overflow-hidden holographic sticky top-28">
                        {{-- Photo --}}
                        <div class="relative h-80 overflow-hidden">
                            @if (!empty($team->photo))
                                <img src="{{ asset('storage/' . $team->photo) }}"
                                    alt="{{ $team->name }}"
                                    class="w-full h-full object-cover"
                                    loading="lazy">
                            @else
                                <div class="avatar-initials h-80 text-5xl">
                                    {{ strtoupper(substr($team->name, 0, 1)) }}{{ strtoupper(substr(explode(' ', $team->name)[1] ?? '', 0, 1)) }}
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-linear-to-t from-[#242844]/60 via-transparent to-transparent"></div>
                        </div>

                        {{-- Contact Info --}}
                        <div class="p-6 space-y-4">
                            @if (!empty($team->email))
                            <a href="mailto:{{ $team->email }}"
                                class="flex items-center gap-3 group/link transition-colors">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center border shrink-0"
                                    style="background:linear-gradient(135deg,rgba(184,154,114,0.12),rgba(212,184,150,0.08)); border-color:rgba(184,154,114,0.2);">
                                    <i class="fas fa-envelope text-sm" style="color:#8a7048;"></i>
                                </div>
                                <div>
                                    <div class="text-[0.65rem] uppercase tracking-wider font-semibold" style="color:#5a5e7a;">Email</div>
                                    <div class="text-sm font-medium group-hover/link:text-[#8a7048] transition-colors" style="color:#242844;">{{ $team->email }}</div>
                                </div>
                            </a>
                            @endif

                            @if (!empty($team->phone))
                            <a href="tel:{{ $team->phone }}"
                                class="flex items-center gap-3 group/link transition-colors">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center border shrink-0"
                                    style="background:linear-gradient(135deg,rgba(184,154,114,0.12),rgba(212,184,150,0.08)); border-color:rgba(184,154,114,0.2);">
                                    <i class="fas fa-phone text-sm" style="color:#8a7048;"></i>
                                </div>
                                <div>
                                    <div class="text-[0.65rem] uppercase tracking-wider font-semibold" style="color:#5a5e7a;">Telepon</div>
                                    <div class="text-sm font-medium group-hover/link:text-[#8a7048] transition-colors" style="color:#242844;">{{ $team->phone }}</div>
                                </div>
                            </a>
                            @endif

                            {{-- Specializations --}}
                            @if (!empty($team->specialization))
                            <div class="pt-4 border-t" style="border-color:rgba(184,154,114,0.12);">
                                <div class="text-[0.65rem] uppercase tracking-wider font-semibold mb-3" style="color:#5a5e7a;">Spesialisasi</div>
                                <div class="flex flex-wrap gap-2">
                                    @foreach (explode(',', $team->specialization) as $spec)
                                    <span class="badge badge-dark text-[0.65rem]">{{ trim($spec) }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            {{-- CTA --}}
                            <div class="pt-4 border-t" style="border-color:rgba(184,154,114,0.12);">
                                <a href="{{ route('contact') }}" class="btn-primary btn-magnetic w-full text-center text-sm">
                                    <i class="fas fa-calendar-check mr-2"></i>Jadwalkan Konsultasi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT: Bio & Details --}}
                <div class="lg:col-span-2 reveal">
                    <div class="glass rounded-2xl p-8 md:p-10 holographic">
                        {{-- Bio Section --}}
                        <div class="mb-8">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center border"
                                    style="background:linear-gradient(135deg,rgba(184,154,114,0.15),rgba(212,184,150,0.1)); border-color:rgba(184,154,114,0.25);">
                                    <i class="fas fa-user" style="color:#B89A72;"></i>
                                </div>
                                <h2 class="text-2xl font-bold" style="color:#242844; font-family:'Playfair Display',serif;">
                                    Tentang {{ $team->name }}
                                </h2>
                            </div>
                            <div class="prose max-w-none text-sm leading-[1.9]" style="color:#5a5e7a;">
                                {!! nl2br(e($team->bio)) !!}
                            </div>
                        </div>

                        {{-- Experience Highlights --}}
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                            <div class="rounded-xl p-5 text-center border"
                                style="background:linear-gradient(135deg,rgba(184,154,114,0.06),rgba(212,184,150,0.04)); border-color:rgba(184,154,114,0.12);">
                                <i class="fas fa-briefcase text-xl mb-2" style="color:#B89A72;"></i>
                                <div class="text-sm font-semibold" style="color:#242844;">{{ $team->position }}</div>
                                <div class="text-xs mt-1" style="color:#5a5e7a;">Jabatan</div>
                            </div>
                            @if (!empty($team->specialization))
                            <div class="rounded-xl p-5 text-center border"
                                style="background:linear-gradient(135deg,rgba(184,154,114,0.06),rgba(212,184,150,0.04)); border-color:rgba(184,154,114,0.12);">
                                <i class="fas fa-balance-scale text-xl mb-2" style="color:#B89A72;"></i>
                                <div class="text-sm font-semibold" style="color:#242844;">{{ count(explode(',', $team->specialization)) }} Bidang</div>
                                <div class="text-xs mt-1" style="color:#5a5e7a;">Spesialisasi</div>
                            </div>
                            @endif
                            <div class="rounded-xl p-5 text-center border"
                                style="background:linear-gradient(135deg,rgba(184,154,114,0.06),rgba(212,184,150,0.04)); border-color:rgba(184,154,114,0.12);">
                                <i class="fas fa-certificate text-xl mb-2" style="color:#B89A72;"></i>
                                <div class="text-sm font-semibold" style="color:#242844;">Terverifikasi</div>
                                <div class="text-xs mt-1" style="color:#5a5e7a;">Status</div>
                            </div>
                        </div>

                        {{-- Back Navigation --}}
                        <div class="pt-8 border-t flex flex-wrap gap-4" style="border-color:rgba(184,154,114,0.12);">
                            <a href="{{ route('team') }}" class="btn-outline btn-magnetic">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Tim
                            </a>
                            <a href="{{ route('contact') }}" class="btn-primary btn-magnetic">
                                <i class="fas fa-phone-alt mr-2"></i>Hubungi Sekarang
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===================== OTHER MEMBERS ===================== --}}
    @if ($otherMembers->count() > 0)
    <section class="section-padding relative" style="background:#FDFBFC;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 reveal">
                <span class="text-uppercase-accent mb-3 block">Tim Lainnya</span>
                <h2 class="text-3xl md:text-4xl font-bold"
                    style="font-family:'Playfair Display',serif; color:#242844;">
                    Anggota Tim <span style="color:#B89A72;">Lainnya</span>
                </h2>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4 stagger-children">
                @foreach ($otherMembers as $member)
                <div class="group glass rounded-2xl overflow-hidden card-lift holographic reveal">
                    <div class="relative h-60 overflow-hidden">
                        @if (!empty($member->photo))
                            <img src="{{ asset('storage/' . $member->photo) }}"
                                alt="{{ $member->name }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                loading="lazy">
                        @else
                            <div class="avatar-initials h-60">
                                {{ strtoupper(substr($member->name, 0, 1)) }}{{ strtoupper(substr(explode(' ', $member->name)[1] ?? '', 0, 1)) }}
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-linear-to-t from-[#242844]/80 via-[#242844]/20 to-transparent"></div>
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-400"
                            style="background:linear-gradient(135deg,rgba(184,154,114,0.1),transparent);"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-5">
                            <h3 class="font-bold text-base group-hover:text-[#d4b896] transition-colors"
                                style="color:#FDFBFC; font-family:'Playfair Display',serif;">
                                {{ $member->name }}
                            </h3>
                            <p class="text-sm" style="color:#d4b896;">{{ $member->position }}</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <p class="text-sm mb-4 leading-relaxed" style="color:#5a5e7a;">{{ Str::limit($member->bio, 75) }}</p>
                        <div class="flex items-center justify-end">
                            <a href="{{ route('team.show', $member) }}" class="text-xs font-semibold transition-colors hover:text-[#6b5639]"
                                style="color:#8a7048;">
                                Profil <i class="fas fa-arrow-right ml-1 text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

@endsection
