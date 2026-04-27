@extends('layouts.admin')
@section('title', 'Artikel')
@section('breadcrumb', 'Artikel')

@section('content')
<div class="adm-page-header">
    <div>
        <h1 class="adm-page-title">Artikel</h1>
        <p class="adm-page-subtitle">Kelola artikel dan wawasan hukum</p>
    </div>
    <a href="{{ route('admin.articles.create') }}" class="adm-btn adm-btn-primary">
        <i class="fas fa-plus"></i> Tulis Artikel
    </a>
</div>

{{-- Stats row --}}
<div class="adm-grid adm-grid-3" style="margin-bottom:1.25rem;">
    <div class="adm-stat">
        <div class="adm-stat-icon" style="background:rgba(16,185,129,0.1); color:#059669;"><i class="fas fa-check-circle"></i></div>
        <div class="adm-stat-value">{{ \App\Models\Article::where('is_published',true)->count() }}</div>
        <div class="adm-stat-label">Dipublikasikan</div>
        <i class="fas fa-newspaper adm-stat-bg"></i>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon" style="background:rgba(245,158,11,0.1); color:#d97706;"><i class="fas fa-pen"></i></div>
        <div class="adm-stat-value">{{ \App\Models\Article::where('is_published',false)->count() }}</div>
        <div class="adm-stat-label">Draf</div>
        <i class="fas fa-file-pen adm-stat-bg"></i>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon" style="background:rgba(99,102,241,0.1); color:#6366f1;"><i class="fas fa-eye"></i></div>
        <div class="adm-stat-value">{{ number_format(\App\Models\Article::sum('views')) }}</div>
        <div class="adm-stat-label">Total Dilihat</div>
        <i class="fas fa-chart-bar adm-stat-bg"></i>
    </div>
</div>

<div class="adm-card">
    <div class="adm-card-header">
        <i class="fas fa-newspaper" style="color:var(--oak);"></i>
        <span class="adm-card-title">Semua Artikel</span>
        <span class="adm-badge adm-badge-oak" style="margin-left:auto;">{{ $articles->total() }} total</span>
    </div>
    <div style="overflow-x:auto;">
        <table class="adm-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Dilihat</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $i => $article)
                <tr>
                    <td style="color:var(--text-muted); font-size:0.75rem;">{{ $articles->firstItem() + $i }}</td>
                    <td style="max-width:240px;">
                        <div style="font-weight:600; color:var(--comet); line-height:1.3;">{{ Str::limit($article->title, 55) }}</div>
                        <div style="font-size:0.72rem; color:var(--text-muted); margin-top:2px;">{{ $article->slug }}</div>
                    </td>
                    <td>
                        @if($article->category)
                            <span class="adm-badge adm-badge-oak">{{ $article->category }}</span>
                        @else
                            <span style="color:var(--text-muted); font-size:0.75rem;">—</span>
                        @endif
                    </td>
                    <td style="font-size:0.8rem; color:var(--text-muted);">
                        {{ $article->user->name ?? 'Admin' }}
                    </td>
                    <td>
                        <div style="display:flex; align-items:center; gap:0.3rem; font-size:0.78rem; color:var(--text-muted);">
                            <i class="fas fa-eye" style="font-size:0.62rem;"></i>
                            {{ number_format($article->views) }}
                        </div>
                    </td>
                    <td>
                        @if($article->is_published)
                            <span class="adm-badge adm-badge-success"><i class="fas fa-circle" style="font-size:0.45rem;"></i> Published</span>
                        @else
                            <span class="adm-badge adm-badge-warning"><i class="fas fa-clock" style="font-size:0.45rem;"></i> Draf</span>
                        @endif
                    </td>
                    <td style="font-size:0.75rem; color:var(--text-muted); white-space:nowrap;">
                        {{ $article->created_at->format('d M Y') }}
                    </td>
                    <td>
                        <div style="display:flex; gap:0.375rem;">
                            <a href="{{ route('admin.articles.edit', $article) }}" class="adm-btn adm-btn-outline adm-btn-sm" title="Edit">
                                <i class="fas fa-pen"></i>
                            </a>
                            <button type="button"
                                class="adm-btn adm-btn-danger adm-btn-sm"
                                onclick="confirmDelete('{{ route('admin.articles.destroy', $article) }}', '{{ addslashes($article->title) }}')"
                                title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align:center; padding:3rem; color:var(--text-muted);">
                        <i class="fas fa-newspaper" style="font-size:2rem; opacity:0.2; display:block; margin-bottom:0.75rem;"></i>
                        Belum ada artikel. <a href="{{ route('admin.articles.create') }}" style="color:var(--oak-dark);">Tulis sekarang</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($articles->hasPages())
    <div style="padding:1rem 1.25rem; border-top:1px solid rgba(36,40,68,0.06); display:flex; justify-content:flex-end;">
        <div class="adm-pagination">{{ $articles->links() }}</div>
    </div>
    @endif
</div>
@endsection
