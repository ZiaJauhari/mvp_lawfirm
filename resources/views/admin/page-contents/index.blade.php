@extends('layouts.admin')
@section('title', 'Konten Halaman')
@section('breadcrumb', 'Konten Halaman')

@section('content')
<div class="adm-page-header">
    <div>
        <h1 class="adm-page-title">Konten Halaman</h1>
        <p class="adm-page-subtitle">Edit teks dan konten yang tampil di website</p>
    </div>
</div>

{{-- Page Tabs --}}
<div style="display:flex; gap:0.375rem; flex-wrap:wrap; margin-bottom:1.5rem;">
    @foreach (['home' => 'Beranda', 'services' => 'Layanan', 'about' => 'Tentang Kami', 'team' => 'Tim', 'articles' => 'Artikel', 'contact' => 'Kontak', 'footer' => 'Footer'] as $slug => $label)
    <a href="{{ route('admin.page-contents.index', ['page' => $slug]) }}"
       class="adm-btn {{ $page === $slug ? 'adm-btn-primary' : 'adm-btn-ghost' }}"
       style="font-size:0.78rem; padding:0.45rem 0.9rem;">
        {{ $label }}
        @php $count = \App\Models\PageContent::where('page',$slug)->count(); @endphp
        @if($count > 0)
        <span style="font-size:0.6rem; opacity:0.7; margin-left:2px;">({{ $count }})</span>
        @endif
    </a>
    @endforeach
</div>

{{-- Bulk-save form --}}
@if($contents->count() > 0)
<form action="{{ route('admin.page-contents.updateMultiple') }}" method="POST" id="bulk-form">
    @csrf

    {{-- Group by section --}}
    @foreach($contents->groupBy('section') as $section => $items)
    <div class="adm-card" style="margin-bottom:1.25rem;">
        <div class="adm-card-header" style="background:rgba(184,154,114,0.04);">
            <i class="fas fa-layer-group" style="color:var(--oak);"></i>
            <span class="adm-card-title" style="text-transform:capitalize;">
                {{ $section ?: 'Umum' }}
            </span>
            <span class="adm-badge adm-badge-oak" style="margin-left:auto;">{{ $items->count() }} item</span>
        </div>
        <div class="adm-card-body" style="padding:0;">
            @foreach($items as $idx => $item)
            <div style="padding:1rem 1.25rem; {{ !$loop->last ? 'border-bottom:1px solid rgba(36,40,68,0.06);' : '' }} display:grid; grid-template-columns:200px 1fr auto; gap:1rem; align-items:start;">
                {{-- Label & key --}}
                <div>
                    <div style="font-weight:600; font-size:0.82rem; color:var(--comet);">
                        {{ $item->label ?: $item->key }}
                    </div>
                    <code style="font-size:0.68rem; color:var(--text-muted); background:var(--cream-alt); padding:1px 5px; border-radius:3px; display:inline-block; margin-top:2px;">{{ $item->key }}</code>
                    <div style="font-size:0.68rem; color:rgba(184,154,114,0.8); margin-top:3px; text-transform:uppercase; letter-spacing:0.05em;">{{ $item->type }}</div>
                </div>

                {{-- Value field --}}
                <div>
                    @if($item->type === 'textarea' || strlen($item->value ?? '') > 120)
                        <textarea name="contents[{{ $item->id }}][value]"
                            class="adm-textarea"
                            style="min-height:80px; font-size:0.82rem;"
                            placeholder="Kosongkan untuk menggunakan nilai default...">{{ $item->value }}</textarea>
                    @else
                        <input type="text"
                            name="contents[{{ $item->id }}][value]"
                            class="adm-input"
                            style="font-size:0.82rem;"
                            value="{{ $item->value }}"
                            placeholder="Kosongkan untuk nilai default...">
                    @endif
                </div>

                {{-- Actions --}}
                <div style="display:flex; gap:0.375rem; padding-top:0.25rem;">
                    <a href="{{ route('admin.page-contents.edit', $item) }}"
                       class="adm-btn adm-btn-ghost adm-btn-sm" title="Edit detail">
                        <i class="fas fa-pen"></i>
                    </a>
                    <button type="button"
                        class="adm-btn adm-btn-danger adm-btn-sm"
                        onclick="confirmDelete('{{ route('admin.page-contents.destroy', $item) }}', '{{ addslashes($item->label ?: $item->key) }}')"
                        title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach

    {{-- Save all button --}}
    <div style="display:flex; justify-content:flex-end; gap:0.75rem; position:sticky; bottom:1.25rem; z-index:10;">
        <div style="background:rgba(253,251,252,0.95); backdrop-filter:blur(8px); border:1px solid rgba(184,154,114,0.2); border-radius:0.75rem; padding:0.75rem 1rem; display:flex; gap:0.625rem; box-shadow:0 8px 24px rgba(36,40,68,0.12);">
            <span style="font-size:0.78rem; color:var(--text-muted); align-self:center;">
                <i class="fas fa-circle-info" style="color:var(--oak); margin-right:4px;"></i>
                Edit nilai lalu klik Simpan Semua
            </span>
            <button type="submit" class="adm-btn adm-btn-primary">
                <i class="fas fa-floppy-disk"></i> Simpan Semua Perubahan
            </button>
        </div>
    </div>
</form>

@else
{{-- Empty state --}}
<div class="adm-card">
    <div class="adm-card-body" style="text-align:center; padding:3rem;">
        <div style="width:64px;height:64px; border-radius:50%; background:rgba(184,154,114,0.1); border:1.5px solid rgba(184,154,114,0.2); display:flex; align-items:center; justify-content:center; margin:0 auto 1rem;">
            <i class="fas fa-file-pen" style="color:var(--oak); font-size:1.5rem;"></i>
        </div>
        <h3 style="font-family:'Playfair Display',serif; color:var(--comet); margin-bottom:0.5rem;">Belum ada konten untuk halaman ini</h3>
        <p style="font-size:0.83rem; color:var(--text-muted); margin-bottom:1.5rem;">
            Tambahkan item konten untuk mengisi teks dinamis pada halaman <strong>{{ $page }}</strong>.
        </p>
        <a href="{{ route('admin.page-contents.create', ['page' => $page]) }}" class="adm-btn adm-btn-primary">
            <i class="fas fa-plus"></i> Tambah Item Konten
        </a>
    </div>
</div>
@endif
@endsection
