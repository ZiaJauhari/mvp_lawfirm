@extends('layouts.admin')
@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')

{{-- Welcome --}}
<div style="margin-bottom:1.75rem;">
    <h1 class="adm-page-title">Selamat datang, {{ auth()->user()->name ?? 'Admin' }} 👋</h1>
    <p class="adm-page-subtitle">Berikut ringkasan terbaru dari website MVP Law Firm Anda</p>
</div>

{{-- Stat Cards --}}
<div class="adm-grid adm-grid-4" style="margin-bottom:1.75rem;">
    <a href="{{ route('admin.articles.index') }}" style="text-decoration:none;">
        <div class="adm-stat">
            <div class="adm-stat-icon" style="background:rgba(99,102,241,0.1); color:#6366f1;">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="adm-stat-value">{{ $stats['articles'] }}</div>
            <div class="adm-stat-label">Total Artikel</div>
            <i class="fas fa-newspaper adm-stat-bg"></i>
        </div>
    </a>
    <a href="{{ route('admin.services.index') }}" style="text-decoration:none;">
        <div class="adm-stat">
            <div class="adm-stat-icon" style="background:rgba(16,185,129,0.1); color:#059669;">
                <i class="fas fa-briefcase"></i>
            </div>
            <div class="adm-stat-value">{{ $stats['services'] }}</div>
            <div class="adm-stat-label">Layanan Aktif</div>
            <i class="fas fa-briefcase adm-stat-bg"></i>
        </div>
    </a>
    <a href="{{ route('admin.teams.index') }}" style="text-decoration:none;">
        <div class="adm-stat">
            <div class="adm-stat-icon" style="background:rgba(245,158,11,0.1); color:#d97706;">
                <i class="fas fa-users"></i>
            </div>
            <div class="adm-stat-value">{{ $stats['team'] }}</div>
            <div class="adm-stat-label">Anggota Tim</div>
            <i class="fas fa-users adm-stat-bg"></i>
        </div>
    </a>
    <a href="{{ route('admin.contacts.index') }}" style="text-decoration:none;">
        <div class="adm-stat">
            <div class="adm-stat-icon" style="background:rgba(239,68,68,0.1); color:#dc2626;">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="adm-stat-value">{{ $stats['unread_contacts'] }}</div>
            <div class="adm-stat-label">Pesan Belum Dibaca</div>
            <i class="fas fa-envelope adm-stat-bg"></i>
        </div>
    </a>
</div>

{{-- Quick Actions --}}
<div style="margin-bottom:1.75rem;">
    <div style="font-size:0.75rem; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:var(--text-muted); margin-bottom:0.75rem;">Aksi Cepat</div>
    <div style="display:flex; flex-wrap:wrap; gap:0.625rem;">
        <a href="{{ route('admin.articles.create') }}" class="adm-btn adm-btn-primary">
            <i class="fas fa-pen-nib"></i> Tulis Artikel
        </a>
        <a href="{{ route('admin.services.create') }}" class="adm-btn adm-btn-outline">
            <i class="fas fa-plus"></i> Tambah Layanan
        </a>
        <a href="{{ route('admin.teams.create') }}" class="adm-btn adm-btn-outline">
            <i class="fas fa-user-plus"></i> Tambah Anggota Tim
        </a>
        <a href="{{ url('/') }}" target="_blank" class="adm-btn adm-btn-ghost">
            <i class="fas fa-arrow-up-right-from-square"></i> Lihat Website
        </a>
    </div>
</div>

{{-- Recent data --}}
<div class="adm-grid adm-grid-2">

    {{-- Recent Messages --}}
    <div class="adm-card">
        <div class="adm-card-header">
            <i class="fas fa-envelope" style="color:var(--oak);"></i>
            <span class="adm-card-title">Pesan Terbaru</span>
            <a href="{{ route('admin.contacts.index') }}" class="adm-btn adm-btn-ghost adm-btn-sm" style="margin-left:auto;">
                Lihat Semua
            </a>
        </div>
        @if($recent_contacts->count() > 0)
        <div>
            @foreach($recent_contacts as $contact)
            <a href="{{ route('admin.contacts.show', $contact) }}"
                style="display:flex; align-items:center; justify-content:space-between; padding:0.875rem 1.25rem; border-bottom:1px solid rgba(36,40,68,0.05); text-decoration:none; transition:background 0.2s ease;"
                onmouseover="this.style.background='rgba(184,154,114,0.03)'" onmouseout="this.style.background=''">
                <div>
                    <div style="font-weight:600; font-size:0.83rem; color:var(--comet);">{{ $contact->name }}</div>
                    <div style="font-size:0.75rem; color:var(--text-muted);">{{ Str::limit($contact->subject, 45) }}</div>
                </div>
                <div style="display:flex; align-items:center; gap:0.5rem; flex-shrink:0;">
                    @if(!$contact->is_read)
                        <span class="adm-badge adm-badge-danger">Baru</span>
                    @endif
                    <span style="font-size:0.7rem; color:var(--text-muted);">{{ $contact->created_at->diffForHumans() }}</span>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div style="padding:2.5rem; text-align:center; color:var(--text-muted);">
            <i class="fas fa-inbox" style="font-size:1.75rem; opacity:0.25; margin-bottom:0.625rem; display:block;"></i>
            Belum ada pesan masuk
        </div>
        @endif
    </div>

    {{-- Recent Articles --}}
    <div class="adm-card">
        <div class="adm-card-header">
            <i class="fas fa-newspaper" style="color:var(--oak);"></i>
            <span class="adm-card-title">Artikel Terbaru</span>
            <a href="{{ route('admin.articles.index') }}" class="adm-btn adm-btn-ghost adm-btn-sm" style="margin-left:auto;">
                Lihat Semua
            </a>
        </div>
        @if($recent_articles->count() > 0)
        <div>
            @foreach($recent_articles as $article)
            <a href="{{ route('admin.articles.edit', $article) }}"
                style="display:flex; align-items:center; justify-content:space-between; padding:0.875rem 1.25rem; border-bottom:1px solid rgba(36,40,68,0.05); text-decoration:none; transition:background 0.2s ease;"
                onmouseover="this.style.background='rgba(184,154,114,0.03)'" onmouseout="this.style.background=''">
                <div>
                    <div style="font-weight:600; font-size:0.83rem; color:var(--comet);">{{ Str::limit($article->title, 48) }}</div>
                    <div style="font-size:0.75rem; color:var(--text-muted);">{{ $article->category ?? 'Umum' }}</div>
                </div>
                @if($article->is_published)
                    <span class="adm-badge adm-badge-success" style="flex-shrink:0;">Published</span>
                @else
                    <span class="adm-badge adm-badge-warning" style="flex-shrink:0;">Draf</span>
                @endif
            </a>
            @endforeach
        </div>
        @else
        <div style="padding:2.5rem; text-align:center; color:var(--text-muted);">
            <i class="fas fa-newspaper" style="font-size:1.75rem; opacity:0.25; margin-bottom:0.625rem; display:block;"></i>
            Belum ada artikel
        </div>
        @endif
    </div>
</div>
@endsection
