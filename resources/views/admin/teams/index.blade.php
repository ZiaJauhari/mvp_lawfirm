@extends('layouts.admin')
@section('title', 'Tim')
@section('breadcrumb', 'Tim')

@section('content')
<div class="adm-page-header">
    <div>
        <h1 class="adm-page-title">Tim</h1>
        <p class="adm-page-subtitle">Kelola anggota tim yang ditampilkan di website</p>
    </div>
    <a href="{{ route('admin.teams.create') }}" class="adm-btn adm-btn-primary">
        <i class="fas fa-plus"></i> Tambah Anggota
    </a>
</div>

<div class="adm-card">
    <div class="adm-card-header">
        <i class="fas fa-users" style="color:var(--oak);"></i>
        <span class="adm-card-title">Daftar Anggota Tim</span>
        <span class="adm-badge adm-badge-oak" style="margin-left:auto;">{{ $teams->total() }} total</span>
    </div>
    <div style="overflow-x:auto;">
        <table class="adm-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Anggota</th>
                    <th>Posisi</th>
                    <th>Spesialisasi</th>
                    <th>Kontak</th>
                    <th>Urutan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teams as $i => $team)
                <tr>
                    <td style="color:var(--text-muted); font-size:0.75rem;">{{ $teams->firstItem() + $i }}</td>
                    <td>
                        <div style="display:flex; align-items:center; gap:0.625rem;">
                            @if(!empty($team->photo))
                                <img src="{{ asset('storage/'.$team->photo) }}" alt="{{ $team->name }}"
                                    style="width:36px;height:36px; border-radius:50%; object-fit:cover; border:2px solid rgba(184,154,114,0.2);">
                            @else
                                <div style="width:36px;height:36px; border-radius:50%; background:linear-gradient(135deg,#242844,#363a5c); display:flex; align-items:center; justify-content:center; font-family:'Playfair Display',serif; font-size:0.85rem; font-weight:700; color:#d4b896; flex-shrink:0;">
                                    {{ strtoupper(substr($team->name,0,1)) }}{{ strtoupper(substr(explode(' ',$team->name)[1]??'',0,1)) }}
                                </div>
                            @endif
                            <div>
                                <div style="font-weight:600; color:var(--comet);">{{ $team->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td style="font-size:0.8rem; color:var(--text-muted);">{{ $team->position }}</td>
                    <td style="max-width:160px;">
                        @if($team->specialization)
                            @foreach(array_slice(explode(',',$team->specialization), 0, 2) as $spec)
                                <span class="adm-badge adm-badge-oak" style="margin:1px;">{{ trim($spec) }}</span>
                            @endforeach
                        @else
                            <span style="color:var(--text-muted); font-size:0.75rem;">—</span>
                        @endif
                    </td>
                    <td>
                        @if($team->email)
                            <div style="font-size:0.75rem; color:var(--text-muted);">{{ $team->email }}</div>
                        @endif
                        @if($team->phone)
                            <div style="font-size:0.75rem; color:var(--text-muted);">{{ $team->phone }}</div>
                        @endif
                    </td>
                    <td><span class="adm-badge adm-badge-oak">{{ $team->order }}</span></td>
                    <td>
                        @if($team->is_active)
                            <span class="adm-badge adm-badge-success"><i class="fas fa-circle" style="font-size:0.45rem;"></i> Aktif</span>
                        @else
                            <span class="adm-badge adm-badge-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex; gap:0.375rem;">
                            <a href="{{ route('admin.teams.edit', $team) }}" class="adm-btn adm-btn-outline adm-btn-sm" title="Edit">
                                <i class="fas fa-pen"></i>
                            </a>
                            <button type="button"
                                class="adm-btn adm-btn-danger adm-btn-sm"
                                onclick="confirmDelete('{{ route('admin.teams.destroy', $team) }}', '{{ addslashes($team->name) }}')"
                                title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align:center; padding:3rem; color:var(--text-muted);">
                        <i class="fas fa-users" style="font-size:2rem; opacity:0.2; display:block; margin-bottom:0.75rem;"></i>
                        Belum ada anggota tim. <a href="{{ route('admin.teams.create') }}" style="color:var(--oak-dark);">Tambah sekarang</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($teams->hasPages())
    <div style="padding:1rem 1.25rem; border-top:1px solid rgba(36,40,68,0.06); display:flex; justify-content:flex-end;">
        <div class="adm-pagination">{{ $teams->links() }}</div>
    </div>
    @endif
</div>
@endsection
