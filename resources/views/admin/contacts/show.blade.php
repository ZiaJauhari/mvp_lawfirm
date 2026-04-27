@extends('layouts.admin')
@section('title', 'Detail Pesan')
@section('breadcrumb', 'Pesan Masuk / Detail')

@section('content')
<div class="adm-page-header">
    <div>
        <h1 class="adm-page-title">Detail Pesan</h1>
        <p class="adm-page-subtitle">Dari {{ $contact->name }}</p>
    </div>
    <a href="{{ route('admin.contacts.index') }}" class="adm-btn adm-btn-ghost">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div style="display:grid; grid-template-columns:1fr 280px; gap:1.25rem; align-items:start;">

    {{-- Message body --}}
    <div class="adm-card">
        <div class="adm-card-header">
            <i class="fas fa-envelope-open" style="color:var(--oak);"></i>
            <span class="adm-card-title">{{ $contact->subject }}</span>
            @if($contact->is_read)
                <span class="adm-badge adm-badge-success" style="margin-left:auto;">Dibaca</span>
            @else
                <span class="adm-badge adm-badge-danger" style="margin-left:auto;">Belum Dibaca</span>
            @endif
        </div>
        <div class="adm-card-body">
            {{-- Sender info --}}
            <div style="display:flex; align-items:center; gap:0.875rem; padding:1rem; border-radius:0.75rem; background:var(--cream-alt); margin-bottom:1.5rem;">
                <div style="width:48px;height:48px; border-radius:50%; background:linear-gradient(135deg,#242844,#2d3050); display:flex; align-items:center; justify-content:center; font-family:'Playfair Display',serif; font-size:1.1rem; font-weight:700; color:#d4b896; flex-shrink:0;">
                    {{ strtoupper(substr($contact->name, 0, 1)) }}
                </div>
                <div style="flex:1;">
                    <div style="font-weight:700; font-size:0.95rem; color:var(--comet);">{{ $contact->name }}</div>
                    <a href="mailto:{{ $contact->email }}" style="font-size:0.8rem; color:var(--oak-dark); text-decoration:none;">
                        <i class="fas fa-envelope" style="font-size:0.7rem;"></i> {{ $contact->email }}
                    </a>
                    @if($contact->phone)
                    <span style="margin-left:0.75rem; font-size:0.8rem; color:var(--text-muted);">
                        <i class="fas fa-phone" style="font-size:0.7rem;"></i> {{ $contact->phone }}
                    </span>
                    @endif
                </div>
                <div style="text-align:right; font-size:0.75rem; color:var(--text-muted);">
                    {{ $contact->created_at->format('d M Y') }}<br>
                    {{ $contact->created_at->format('H:i') }}
                </div>
            </div>

            {{-- Message --}}
            <div style="background:var(--cream-alt); border-radius:0.75rem; padding:1.25rem; border-left:3px solid var(--oak); line-height:1.8; font-size:0.88rem; color:var(--comet); white-space:pre-wrap;">{{ $contact->message }}</div>
        </div>
    </div>

    {{-- Actions sidebar --}}
    <div style="display:flex; flex-direction:column; gap:1.25rem;">
        <div class="adm-card">
            <div class="adm-card-header">
                <i class="fas fa-bolt" style="color:var(--oak);"></i>
                <span class="adm-card-title">Tindakan</span>
            </div>
            <div class="adm-card-body" style="display:flex; flex-direction:column; gap:0.625rem;">
                {{-- Reply --}}
                <a href="mailto:{{ $contact->email }}?subject=Re: {{ rawurlencode($contact->subject) }}"
                   class="adm-btn adm-btn-primary" style="justify-content:center;">
                    <i class="fas fa-reply"></i> Balas via Email
                </a>

                {{-- Mark read --}}
                @if(!$contact->is_read)
                <form action="{{ route('admin.contacts.markRead', $contact) }}" method="POST">
                    @csrf
                    <button type="submit" class="adm-btn adm-btn-outline" style="width:100%; justify-content:center;">
                        <i class="fas fa-check"></i> Tandai Sudah Dibaca
                    </button>
                </form>
                @endif

                {{-- Delete --}}
                <button type="button"
                    onclick="confirmDelete('{{ route('admin.contacts.destroy', $contact) }}', 'pesan dari {{ addslashes($contact->name) }}')"
                    class="adm-btn adm-btn-danger" style="justify-content:center;">
                    <i class="fas fa-trash"></i> Hapus Pesan
                </button>
            </div>
        </div>

        <div class="adm-card">
            <div class="adm-card-header">
                <i class="fas fa-circle-info" style="color:var(--oak);"></i>
                <span class="adm-card-title">Informasi</span>
            </div>
            <div class="adm-card-body" style="font-size:0.8rem; line-height:1.9; color:var(--text-muted);">
                <div><span style="font-weight:600; color:var(--comet);">Diterima:</span><br>{{ $contact->created_at->format('d M Y, H:i') }}</div>
                <div style="margin-top:0.5rem;"><span style="font-weight:600; color:var(--comet);">Status:</span><br>
                    @if($contact->is_read)
                        <span class="adm-badge adm-badge-success">Sudah dibaca</span>
                    @else
                        <span class="adm-badge adm-badge-danger">Belum dibaca</span>
                    @endif
                </div>
                @if($contact->phone)
                <div style="margin-top:0.5rem;">
                    <span style="font-weight:600; color:var(--comet);">Telepon:</span><br>
                    <a href="tel:{{ $contact->phone }}" style="color:var(--oak-dark); text-decoration:none;">{{ $contact->phone }}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
