@extends('layouts.admin')
@section('title', 'Pesan Masuk')
@section('breadcrumb', 'Pesan Masuk')

@section('content')
<div class="adm-page-header">
    <div>
        <h1 class="adm-page-title">Pesan Masuk</h1>
        <p class="adm-page-subtitle">Pesan konsultasi dari calon klien</p>
    </div>
    @php $unread = $contacts->where('is_read', false)->count(); @endphp
    @if($unread > 0)
    <span class="adm-badge adm-badge-danger" style="font-size:0.78rem; padding:0.3rem 0.8rem;">
        <i class="fas fa-circle" style="font-size:0.45rem;"></i> {{ $unread }} belum dibaca
    </span>
    @endif
</div>

<div class="adm-card">
    <div class="adm-card-header">
        <i class="fas fa-envelope" style="color:var(--oak);"></i>
        <span class="adm-card-title">Semua Pesan</span>
        <span class="adm-badge adm-badge-oak" style="margin-left:auto;">{{ $contacts->total() }} total</span>
    </div>
    <div style="overflow-x:auto;">
        <table class="adm-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pengirim</th>
                    <th>Subjek</th>
                    <th>Pesan</th>
                    <th>Status</th>
                    <th>Diterima</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $i => $contact)
                <tr style="{{ !$contact->is_read ? 'background:rgba(184,154,114,0.04);' : '' }}">
                    <td style="color:var(--text-muted); font-size:0.75rem;">{{ $contacts->firstItem() + $i }}</td>
                    <td>
                        <div style="display:flex; align-items:center; gap:0.625rem;">
                            <div style="width:36px;height:36px; border-radius:50%; background:linear-gradient(135deg,#242844,#2d3050); display:flex; align-items:center; justify-content:center; font-family:'Playfair Display',serif; font-size:0.85rem; font-weight:700; color:#d4b896; flex-shrink:0;">
                                {{ strtoupper(substr($contact->name, 0, 1)) }}
                            </div>
                            <div>
                                <div style="font-weight:{{ !$contact->is_read ? '700' : '500' }}; font-size:0.83rem; color:var(--comet);">
                                    {{ $contact->name }}
                                </div>
                                <a href="mailto:{{ $contact->email }}" style="font-size:0.72rem; color:var(--text-muted); text-decoration:none;">
                                    {{ $contact->email }}
                                </a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span style="font-size:0.82rem; font-weight:{{ !$contact->is_read ? '600' : '400' }}; color:var(--comet);">
                            {{ Str::limit($contact->subject, 45) }}
                        </span>
                    </td>
                    <td style="max-width:220px;">
                        <span style="font-size:0.76rem; color:var(--text-muted);">
                            {{ Str::limit($contact->message, 60) }}
                        </span>
                    </td>
                    <td>
                        @if($contact->is_read)
                            <span class="adm-badge adm-badge-success">Dibaca</span>
                        @else
                            <span class="adm-badge adm-badge-danger">
                                <i class="fas fa-circle" style="font-size:0.4rem;"></i> Baru
                            </span>
                        @endif
                    </td>
                    <td style="font-size:0.75rem; color:var(--text-muted); white-space:nowrap;">
                        {{ $contact->created_at->format('d M Y') }}<br>
                        <span style="font-size:0.68rem;">{{ $contact->created_at->format('H:i') }}</span>
                    </td>
                    <td>
                        <div style="display:flex; gap:0.375rem;">
                            <a href="{{ route('admin.contacts.show', $contact) }}"
                               class="adm-btn adm-btn-outline adm-btn-sm" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <button type="button"
                                class="adm-btn adm-btn-danger adm-btn-sm"
                                onclick="confirmDelete('{{ route('admin.contacts.destroy', $contact) }}', 'pesan dari {{ addslashes($contact->name) }}')"
                                title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align:center; padding:3rem; color:var(--text-muted);">
                        <i class="fas fa-inbox" style="font-size:2rem; opacity:0.2; display:block; margin-bottom:0.75rem;"></i>
                        Belum ada pesan masuk
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($contacts->hasPages())
    <div style="padding:1rem 1.25rem; border-top:1px solid rgba(36,40,68,0.06); display:flex; justify-content:flex-end;">
        <div class="adm-pagination">{{ $contacts->links() }}</div>
    </div>
    @endif
</div>
@endsection
