@extends('layouts.admin')
@section('title', 'Tambah Item Konten')
@section('breadcrumb', 'Konten Halaman / Tambah')

@section('content')
<div class="adm-page-header">
    <div>
        <h1 class="adm-page-title">Tambah Item Konten</h1>
        <p class="adm-page-subtitle">Buat item konten dinamis baru untuk halaman website</p>
    </div>
    <a href="{{ route('admin.page-contents.index', ['page' => $page]) }}" class="adm-btn adm-btn-ghost">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<form method="POST" action="{{ route('admin.page-contents.store') }}">
    @csrf
    <div style="display:grid; grid-template-columns:1fr 300px; gap:1.25rem; align-items:start;">

        {{-- Main --}}
        <div class="adm-card">
            <div class="adm-card-header">
                <i class="fas fa-pen-to-square" style="color:var(--oak);"></i>
                <span class="adm-card-title">Informasi Konten</span>
            </div>
            <div class="adm-card-body">
                {{-- Key --}}
                <div class="adm-form-group">
                    <label class="adm-label" for="key">Kunci (Key) <span class="req">*</span></label>
                    <input type="text" id="key" name="key" class="adm-input"
                        value="{{ old('key') }}"
                        placeholder="cth. hero_title, about_description, cta_button"
                        required pattern="[a-z_0-9]+" style="font-family:monospace;">
                    <div class="adm-form-hint">
                        Gunakan huruf kecil dan garis bawah (<code>_</code>). Key ini digunakan di dalam view Blade seperti <code>{{ '$contents[\'hero_title\']' }}</code>.
                    </div>
                    @error('key')<div class="adm-form-error">{{ $message }}</div>@enderror
                </div>

                {{-- Label --}}
                <div class="adm-form-group">
                    <label class="adm-label" for="label">Label Tampilan</label>
                    <input type="text" id="label" name="label" class="adm-input"
                        value="{{ old('label') }}" placeholder="cth. Judul Hero, Deskripsi Tentang Kami">
                    <div class="adm-form-hint">Nama yang tampil di panel admin. Jika kosong, key akan digunakan.</div>
                    @error('label')<div class="adm-form-error">{{ $message }}</div>@enderror
                </div>

                {{-- Value --}}
                <div class="adm-form-group" style="margin-bottom:0;">
                    <label class="adm-label" for="value">Nilai Konten <span class="req">*</span></label>
                    <textarea id="value" name="value" class="adm-textarea" style="min-height:140px;"
                        placeholder="Masukkan konten teks di sini...">{{ old('value') }}</textarea>
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
                            <option value="">— Pilih Halaman —</option>
                            @foreach (['home' => 'Beranda', 'services' => 'Layanan', 'about' => 'Tentang Kami', 'team' => 'Tim', 'articles' => 'Artikel', 'contact' => 'Kontak', 'footer' => 'Footer'] as $slug => $lbl)
                                <option value="{{ $slug }}" {{ old('page', $page) == $slug ? 'selected' : '' }}>{{ $lbl }}</option>
                            @endforeach
                        </select>
                        @error('page')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>

                    <div class="adm-form-group">
                        <label class="adm-label" for="section">Seksi / Section</label>
                        <input type="text" id="section" name="section" class="adm-input"
                            value="{{ old('section') }}"
                            placeholder="cth. hero, services, cta">
                        <div class="adm-form-hint">Digunakan untuk mengelompokkan item dalam halaman</div>
                        @error('section')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>

                    <div class="adm-form-group">
                        <label class="adm-label" for="type">Tipe Konten</label>
                        <select id="type" name="type" class="adm-select">
                            <option value="text"     {{ old('type') == 'text'     ? 'selected' : '' }}>Teks Pendek</option>
                            <option value="textarea" {{ old('type') == 'textarea' ? 'selected' : '' }}>Teks Panjang</option>
                            <option value="image"    {{ old('type') == 'image'    ? 'selected' : '' }}>URL Gambar</option>
                            <option value="number"   {{ old('type') == 'number'   ? 'selected' : '' }}>Angka</option>
                        </select>
                    </div>

                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label" for="order">Urutan</label>
                        <input type="number" id="order" name="order" class="adm-input"
                            value="{{ old('order', 0) }}" min="0">
                    </div>
                </div>
            </div>

            <div class="adm-card" style="border:1px solid rgba(184,154,114,0.2);">
                <div class="adm-card-body" style="font-size:0.78rem; color:var(--text-muted); line-height:1.7;">
                    <strong style="color:var(--comet); display:block; margin-bottom:0.375rem;">
                        <i class="fas fa-circle-info" style="color:var(--oak);"></i> Cara penggunaan
                    </strong>
                    Setelah disimpan, gunakan di Blade view:
                    <code style="display:block; margin-top:0.375rem; font-size:0.7rem; background:var(--cream-alt); padding:0.4rem 0.5rem; border-radius:0.375rem; word-break:break-all;">
                        {{ '$contents[\'your_key\'] ?? \'default\'' }}
                    </code>
                </div>
            </div>

            <div style="display:flex; flex-direction:column; gap:0.625rem;">
                <button type="submit" class="adm-btn adm-btn-primary" style="width:100%; justify-content:center; padding:0.75rem;">
                    <i class="fas fa-floppy-disk"></i> Simpan Item
                </button>
                <a href="{{ route('admin.page-contents.index', ['page' => $page]) }}"
                   class="adm-btn adm-btn-ghost" style="width:100%; justify-content:center;">Batal</a>
            </div>
        </div>
    </div>
</form>
@endsection
