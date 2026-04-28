@extends('layouts.admin')
@section('title', 'Edit Item Konten')
@section('breadcrumb', 'Konten Halaman / Edit')

@section('content')
<div class="adm-page-header">
    <div>
        <h1 class="adm-page-title">Edit Item Konten</h1>
        <p class="adm-page-subtitle">{{ $pageContent->label ?: $pageContent->key }}</p>
    </div>
    <a href="{{ route('admin.page-contents.index', ['page' => $pageContent->page]) }}" class="adm-btn adm-btn-ghost">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<form method="POST" action="{{ route('admin.page-contents.update', $pageContent) }}">
    @csrf @method('PUT')
    <div style="display:grid; grid-template-columns:1fr 300px; gap:1.25rem; align-items:start;">

        {{-- Main --}}
        <div class="adm-card">
            <div class="adm-card-header">
                <i class="fas fa-pen-to-square" style="color:var(--oak);"></i>
                <span class="adm-card-title">Nilai Konten</span>
            </div>
            <div class="adm-card-body">
                {{-- Key (readonly) --}}
                <div class="adm-form-group">
                    <label class="adm-label">Kunci (Key)</label>
                    <input type="text" class="adm-input" value="{{ $pageContent->key }}" readonly
                        style="background:var(--cream-alt); cursor:not-allowed; font-family:monospace; font-size:0.83rem;">
                    <input type="hidden" name="key" value="{{ $pageContent->key }}">
                    <div class="adm-form-hint">Key tidak dapat diubah setelah dibuat.</div>
                </div>

                {{-- Label --}}
                <div class="adm-form-group">
                    <label class="adm-label" for="label">Label Tampilan</label>
                    <input type="text" id="label" name="label" class="adm-input"
                        value="{{ old('label', $pageContent->label) }}"
                        placeholder="Nama yang terlihat di panel ini">
                    @error('label')<div class="adm-form-error">{{ $message }}</div>@enderror
                </div>

                {{-- Value --}}
                <div class="adm-form-group" style="margin-bottom:0;">
                    <label class="adm-label" for="value">Nilai Konten <span class="req">*</span></label>
                    @if($pageContent->type === 'textarea')
                        <textarea id="value" name="value" class="adm-textarea" style="min-height:180px;">{{ old('value', $pageContent->value) }}</textarea>
                    @else
                        <input type="text" id="value" name="value" class="adm-input"
                            value="{{ old('value', $pageContent->value) }}"
                            placeholder="Masukkan nilai konten...">
                    @endif
                    @error('value')<div class="adm-form-error">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div style="display:flex; flex-direction:column; gap:1.25rem;">
            <div class="adm-card">
                <div class="adm-card-header">
                    <i class="fas fa-sliders" style="color:var(--oak);"></i>
                    <span class="adm-card-title">Pengaturan</span>
                </div>
                <div class="adm-card-body">
                    <div class="adm-form-group">
                        <label class="adm-label" for="page">Halaman <span class="req">*</span></label>
                        <select id="page" name="page" class="adm-select" required>
                            @foreach (['home' => 'Beranda', 'services' => 'Layanan', 'about' => 'Tentang Kami', 'team' => 'Tim', 'articles' => 'Artikel', 'contact' => 'Kontak', 'footer' => 'Footer'] as $slug => $lbl)
                                <option value="{{ $slug }}" {{ old('page', $pageContent->page) == $slug ? 'selected' : '' }}>{{ $lbl }}</option>
                            @endforeach
                        </select>
                        @error('page')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>

                    <div class="adm-form-group">
                        <label class="adm-label" for="section">Seksi / Section</label>
                        <input type="text" id="section" name="section" class="adm-input"
                            value="{{ old('section', $pageContent->section) }}"
                            placeholder="cth. hero, services, cta">
                        @error('section')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>

                    <div class="adm-form-group">
                        <label class="adm-label" for="type">Tipe Konten</label>
                        <select id="type" name="type" class="adm-select">
                            <option value="text"     {{ old('type', $pageContent->type) == 'text'     ? 'selected' : '' }}>Teks Pendek</option>
                            <option value="textarea" {{ old('type', $pageContent->type) == 'textarea' ? 'selected' : '' }}>Teks Panjang</option>
                            <option value="image"    {{ old('type', $pageContent->type) == 'image'    ? 'selected' : '' }}>URL Gambar</option>
                            <option value="number"   {{ old('type', $pageContent->type) == 'number'   ? 'selected' : '' }}>Angka</option>
                        </select>
                    </div>

                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label" for="order">Urutan</label>
                        <input type="number" id="order" name="order" class="adm-input"
                            value="{{ old('order', $pageContent->order) }}" min="0">
                    </div>
                </div>
            </div>

            <div class="adm-card">
                <div class="adm-card-body" style="font-size:0.78rem; color:var(--text-muted);">
                    <div>Dibuat: {{ $pageContent->created_at->format('d M Y') }}</div>
                    <div>Diperbarui: {{ $pageContent->updated_at->format('d M Y') }}</div>
                </div>
            </div>

            <div style="display:flex; flex-direction:column; gap:0.625rem;">
                <button type="submit" class="adm-btn adm-btn-primary" style="width:100%; justify-content:center; padding:0.75rem;">
                    <i class="fas fa-floppy-disk"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.page-contents.index', ['page' => $pageContent->page]) }}"
                   class="adm-btn adm-btn-ghost" style="width:100%; justify-content:center;">Batal</a>
                <button type="button"
                    onclick="confirmDelete('{{ route('admin.page-contents.destroy', $pageContent) }}','{{ addslashes($pageContent->label ?: $pageContent->key) }}')"
                    class="adm-btn adm-btn-danger" style="width:100%; justify-content:center;">
                    <i class="fas fa-trash"></i> Hapus Item
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
