@extends('layouts.admin')
@section('title', 'Layanan')
@section('breadcrumb', 'Layanan')

@section('content')
<div class="adm-page-header">
    <div>
        <h1 class="adm-page-title">Layanan</h1>
        <p class="adm-page-subtitle">Kelola bidang praktik hukum yang ditampilkan di website</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="adm-btn adm-btn-primary">
        <i class="fas fa-plus"></i> Tambah Layanan
    </a>
</div>

<div class="adm-card">
    <div class="adm-card-header">
        <i class="fas fa-briefcase" style="color:var(--oak);"></i>
        <span class="adm-card-title">Daftar Layanan</span>
        <span class="adm-badge adm-badge-oak" style="margin-left:auto;">{{ $services->total() }} total</span>
    </div>
    <div style="overflow-x:auto;">
        <table class="adm-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Layanan</th>
                    <th>Ikon</th>
                    <th>Deskripsi Singkat</th>
                    <th>Urutan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $i => $service)
                <tr>
                    <td style="color:var(--text-muted); font-size:0.75rem;">{{ $services->firstItem() + $i }}</td>
                    <td>
                        <div style="font-weight:600; color:var(--comet);">{{ $service->title }}</div>
                        <div style="font-size:0.72rem; color:var(--text-muted);">{{ $service->slug }}</div>
                    </td>
                    <td>
                        <div style="display:flex; align-items:center; gap:0.5rem;">
                            <div style="width:32px;height:32px; border-radius:0.375rem; background:rgba(184,154,114,0.12); border:1px solid rgba(184,154,114,0.2); display:flex; align-items:center; justify-content:center;">
                                <i class="fas {{ $service->icon }}" style="color:var(--oak-dark); font-size:0.85rem;"></i>
                            </div>
                            <span style="font-size:0.72rem; color:var(--text-muted); font-family:monospace;">{{ $service->icon }}</span>
                        </div>
                    </td>
                    <td style="max-width:220px;">
                        <span style="font-size:0.78rem; color:var(--text-muted);">{{ Str::limit($service->short_description, 60) }}</span>
                    </td>
                    <td>
                        <span class="adm-badge adm-badge-oak">{{ $service->order }}</span>
                    </td>
                    <td>
                        @if($service->is_active)
                            <span class="adm-badge adm-badge-success"><i class="fas fa-circle" style="font-size:0.45rem;"></i> Aktif</span>
                        @else
                            <span class="adm-badge adm-badge-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex; gap:0.375rem;">
                            <a href="{{ route('admin.services.edit', $service) }}"
                               class="adm-btn adm-btn-outline adm-btn-sm" title="Edit">
                                <i class="fas fa-pen"></i>
                            </a>
                            <button type="button"
                                class="adm-btn adm-btn-danger adm-btn-sm"
                                onclick="confirmDelete('{{ route('admin.services.destroy', $service) }}', '{{ addslashes($service->title) }}')"
                                title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align:center; padding:3rem; color:var(--text-muted);">
                        <i class="fas fa-briefcase" style="font-size:2rem; opacity:0.2; display:block; margin-bottom:0.75rem;"></i>
                        Belum ada layanan. <a href="{{ route('admin.services.create') }}" style="color:var(--oak-dark);">Tambah sekarang</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($services->hasPages())
    <div style="padding:1rem 1.25rem; border-top:1px solid rgba(36,40,68,0.06); display:flex; justify-content:flex-end;">
        <div class="adm-pagination">{{ $services->links() }}</div>
    </div>
    @endif
</div>
@endsection
