@extends('layouts.admin')
@section('title', 'Testimoni')
@section('breadcrumb', 'Testimoni')

@section('content')
<div class="adm-page-header">
    <div>
        <h1 class="adm-page-title">Testimoni</h1>
        <p class="adm-page-subtitle">Kelola ulasan dan testimoni klien</p>
    </div>
    <a href="{{ route('admin.testimonials.create') }}" class="adm-btn adm-btn-primary">
        <i class="fas fa-plus"></i> Tambah Testimoni
    </a>
</div>

<div class="adm-card">
    <div class="adm-card-header">
        <i class="fas fa-quote-left" style="color:var(--oak);"></i>
        <span class="adm-card-title">Daftar Testimoni</span>
        <span class="adm-badge adm-badge-oak" style="margin-left:auto;">{{ $testimonials->total() }} total</span>
    </div>
    <div style="overflow-x:auto;">
        <table class="adm-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Klien</th>
                    <th>Jabatan</th>
                    <th>Testimoni</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $i => $testimonial)
                <tr>
                    <td style="color:var(--text-muted); font-size:0.75rem;">{{ $testimonials->firstItem() + $i }}</td>
                    <td>
                        <div style="display:flex; align-items:center; gap:0.625rem;">
                            @if($testimonial->client_photo)
                                <img src="{{ asset('storage/'.$testimonial->client_photo) }}"
                                    alt="{{ $testimonial->client_name }}"
                                    style="width:36px;height:36px; border-radius:50%; object-fit:cover; border:2px solid rgba(184,154,114,0.2); flex-shrink:0;">
                            @else
                                <div style="width:36px;height:36px; border-radius:50%; background:linear-gradient(135deg,#242844,#363a5c); display:flex; align-items:center; justify-content:center; font-family:'Playfair Display',serif; font-size:0.8rem; font-weight:700; color:#d4b896; flex-shrink:0;">
                                    {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
                                </div>
                            @endif
                            <div style="font-weight:600; font-size:0.83rem; color:var(--comet);">{{ $testimonial->client_name }}</div>
                        </div>
                    </td>
                    <td style="font-size:0.8rem; color:var(--text-muted);">{{ $testimonial->client_position ?? '—' }}</td>
                    <td style="max-width:240px;">
                        <span style="font-size:0.78rem; color:var(--text-muted); font-style:italic;">"{{ Str::limit($testimonial->testimonial, 70) }}"</span>
                    </td>
                    <td>
                        <div style="display:flex; gap:1px; color:#f59e0b; font-size:0.7rem;">
                            @for($r = 1; $r <= 5; $r++)
                                <i class="fas fa-star{{ $r <= ($testimonial->rating ?? 5) ? '' : '-half-alt' }}"
                                   style="color:{{ $r <= ($testimonial->rating ?? 5) ? '#f59e0b' : 'rgba(245,158,11,0.25)' }};"></i>
                            @endfor
                        </div>
                    </td>
                    <td>
                        @if($testimonial->is_active)
                            <span class="adm-badge adm-badge-success"><i class="fas fa-circle" style="font-size:0.45rem;"></i> Aktif</span>
                        @else
                            <span class="adm-badge adm-badge-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex; gap:0.375rem;">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                               class="adm-btn adm-btn-outline adm-btn-sm" title="Edit">
                                <i class="fas fa-pen"></i>
                            </a>
                            <button type="button"
                                class="adm-btn adm-btn-danger adm-btn-sm"
                                onclick="confirmDelete('{{ route('admin.testimonials.destroy', $testimonial) }}', '{{ addslashes($testimonial->client_name) }}')"
                                title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align:center; padding:3rem; color:var(--text-muted);">
                        <i class="fas fa-quote-left" style="font-size:2rem; opacity:0.2; display:block; margin-bottom:0.75rem;"></i>
                        Belum ada testimoni. <a href="{{ route('admin.testimonials.create') }}" style="color:var(--oak-dark);">Tambah sekarang</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($testimonials->hasPages())
    <div style="padding:1rem 1.25rem; border-top:1px solid rgba(36,40,68,0.06); display:flex; justify-content:flex-end;">
        <div class="adm-pagination">{{ $testimonials->links() }}</div>
    </div>
    @endif
</div>
@endsection
