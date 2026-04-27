@extends('layouts.admin')
@section('title', 'Tambah Layanan')
@section('breadcrumb', 'Layanan / Tambah')

@section('content')
<div class="adm-page-header">
    <div>
        <h1 class="adm-page-title">Tambah Layanan</h1>
        <p class="adm-page-subtitle">Tambahkan bidang praktik hukum baru</p>
    </div>
    <a href="{{ route('admin.services.index') }}" class="adm-btn adm-btn-ghost">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<form action="{{ route('admin.services.store') }}" method="POST">
    @csrf
    <div style="display:grid; grid-template-columns:1fr 320px; gap:1.25rem; align-items:start;">

        {{-- Main --}}
        <div class="adm-card">
            <div class="adm-card-header">
                <i class="fas fa-pen-to-square" style="color:var(--oak);"></i>
                <span class="adm-card-title">Informasi Layanan</span>
            </div>
            <div class="adm-card-body">
                <div class="adm-form-group">
                    <label class="adm-label" for="title">Judul Layanan <span class="req">*</span></label>
                    <input type="text" id="title" name="title" class="adm-input"
                        value="{{ old('title') }}" placeholder="cth. Hukum Korporasi" required>
                    @error('title')<div class="adm-form-error">{{ $message }}</div>@enderror
                </div>

                <div class="adm-form-group">
                    <label class="adm-label" for="icon-input">Ikon Font Awesome</label>
                    <input type="text" id="icon-input" name="icon" class="adm-input"
                        value="{{ old('icon', 'fa-briefcase') }}" placeholder="cth. fa-briefcase">
                    <div class="adm-icon-preview">
                        <div class="icon-box">
                            <i id="icon-preview-box" class="fas {{ old('icon', 'fa-briefcase') }}"></i>
                        </div>
                        <span style="font-size:0.75rem; color:var(--text-muted);">Pratinjau ikon</span>
                    </div>
                    <div class="adm-form-hint">Gunakan class Font Awesome tanpa "fas", cth: <code>fa-briefcase</code>, <code>fa-scale-balanced</code>, <code>fa-gavel</code></div>
                    @error('icon')<div class="adm-form-error">{{ $message }}</div>@enderror
                </div>

                <div class="adm-form-group">
                    <label class="adm-label" for="short_description">Deskripsi Singkat</label>
                    <input type="text" id="short_description" name="short_description" class="adm-input"
                        value="{{ old('short_description') }}" placeholder="Deskripsi singkat (maks 500 karakter)" maxlength="500">
                    @error('short_description')<div class="adm-form-error">{{ $message }}</div>@enderror
                </div>

                <div class="adm-form-group">
                    <label class="adm-label" for="description">Deskripsi Lengkap</label>
                    <textarea id="description" name="description" class="adm-textarea" style="min-height:160px;"
                        placeholder="Jelaskan layanan ini secara detail...">{{ old('description') }}</textarea>
                    @error('description')<div class="adm-form-error">{{ $message }}</div>@enderror
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
                        <label class="adm-label" for="order">Urutan Tampil</label>
                        <input type="number" id="order" name="order" class="adm-input"
                            value="{{ old('order', 0) }}" min="0" max="999">
                        <div class="adm-form-hint">Angka lebih kecil = tampil lebih awal</div>
                    </div>

                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label">Status</label>
                        <div class="adm-toggle-wrap">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" class="adm-toggle-input" id="is_active" name="is_active" value="1"
                                {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="adm-toggle" for="is_active"></label>
                            <span style="font-size:0.8rem; color:var(--comet);">Aktif / Tampil di Website</span>
                        </div>
                    </div>
                </div>
            </div>

            <div style="display:flex; flex-direction:column; gap:0.625rem;">
                <button type="submit" class="adm-btn adm-btn-primary" style="width:100%; justify-content:center; padding:0.75rem;">
                    <i class="fas fa-floppy-disk"></i> Simpan Layanan
                </button>
                <a href="{{ route('admin.services.index') }}" class="adm-btn adm-btn-ghost" style="width:100%; justify-content:center;">
                    Batal
                </a>
            </div>
        </div>
    </div>
</form>
@endsection
