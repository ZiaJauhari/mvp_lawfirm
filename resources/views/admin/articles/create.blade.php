@extends('layouts.admin')
@section('title', 'Tulis Artikel')
@section('breadcrumb', 'Artikel / Tulis')

@section('content')
<div class="adm-page-header">
    <div>
        <h1 class="adm-page-title">Tulis Artikel</h1>
        <p class="adm-page-subtitle">Buat artikel wawasan hukum baru</p>
    </div>
    <a href="{{ route('admin.articles.index') }}" class="adm-btn adm-btn-ghost">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="display:grid; grid-template-columns:1fr 320px; gap:1.25rem; align-items:start;">

        {{-- Main --}}
        <div style="display:flex; flex-direction:column; gap:1.25rem;">
            <div class="adm-card">
                <div class="adm-card-header">
                    <i class="fas fa-pen-nib" style="color:var(--oak);"></i>
                    <span class="adm-card-title">Konten Artikel</span>
                </div>
                <div class="adm-card-body">
                    <div class="adm-form-group">
                        <label class="adm-label" for="title">Judul Artikel <span class="req">*</span></label>
                        <input type="text" id="title" name="title" class="adm-input"
                            value="{{ old('title') }}"
                            placeholder="Masukkan judul artikel yang menarik..."
                            required style="font-size:1rem; padding:0.75rem 1rem;">
                        @error('title')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>

                    <div class="adm-form-group">
                        <label class="adm-label" for="excerpt">Ringkasan / Excerpt</label>
                        <textarea id="excerpt" name="excerpt" class="adm-textarea" style="min-height:80px;"
                            placeholder="Ringkasan singkat artikel yang akan ditampilkan di halaman daftar artikel...">{{ old('excerpt') }}</textarea>
                        <div class="adm-form-hint">Maks 500 karakter. Jika kosong akan diambil dari konten.</div>
                        @error('excerpt')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>

                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label" for="content">Isi Artikel <span class="req">*</span></label>
                        <textarea id="content" name="content" class="adm-textarea" style="min-height:320px;"
                            placeholder="Tulis isi artikel di sini...">{{ old('content') }}</textarea>
                        @error('content')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            {{-- SEO --}}
            <div class="adm-card">
                <div class="adm-card-header">
                    <i class="fas fa-magnifying-glass" style="color:var(--oak);"></i>
                    <span class="adm-card-title">SEO</span>
                    <span style="margin-left:auto; font-size:0.72rem; color:var(--text-muted);">Opsional</span>
                </div>
                <div class="adm-card-body">
                    <div class="adm-form-group">
                        <label class="adm-label" for="meta_description">Meta Description</label>
                        <textarea id="meta_description" name="meta_description" class="adm-textarea" style="min-height:80px;"
                            placeholder="Deskripsi untuk mesin pencari (maks 160 karakter)..." maxlength="160">{{ old('meta_description') }}</textarea>
                    </div>
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label" for="meta_keywords">Kata Kunci</label>
                        <input type="text" id="meta_keywords" name="meta_keywords" class="adm-input"
                            value="{{ old('meta_keywords') }}" placeholder="cth. hukum korporasi, pengacara jakarta">
                        <div class="adm-form-hint">Pisahkan dengan koma</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div style="display:flex; flex-direction:column; gap:1.25rem;">

            {{-- Publish --}}
            <div class="adm-card">
                <div class="adm-card-header">
                    <i class="fas fa-paper-plane" style="color:var(--oak);"></i>
                    <span class="adm-card-title">Publikasi</span>
                </div>
                <div class="adm-card-body">
                    <div class="adm-form-group">
                        <div class="adm-toggle-wrap">
                            <input type="hidden" name="is_published" value="0">
                            <input type="checkbox" class="adm-toggle-input" id="is_published" name="is_published" value="1"
                                {{ old('is_published') ? 'checked' : '' }}>
                            <label class="adm-toggle" for="is_published"></label>
                            <span style="font-size:0.8rem;">Publikasikan Sekarang</span>
                        </div>
                        <div class="adm-form-hint" style="margin-top:0.75rem;">Jika tidak dicentang, disimpan sebagai draf.</div>
                    </div>
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label" for="published_at">Tanggal Publikasi</label>
                        <input type="datetime-local" id="published_at" name="published_at" class="adm-input"
                            value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}">
                    </div>
                </div>
            </div>

            {{-- Meta --}}
            <div class="adm-card">
                <div class="adm-card-header">
                    <i class="fas fa-tag" style="color:var(--oak);"></i>
                    <span class="adm-card-title">Kategori & Penulis</span>
                </div>
                <div class="adm-card-body">
                    <div class="adm-form-group">
                        <label class="adm-label" for="category">Kategori</label>
                        <select id="category" name="category" class="adm-select">
                            <option value="">— Pilih Kategori —</option>
                            @foreach (['Hukum Korporasi','Hukum Keluarga','Hukum Pidana','Real Estat','Hukum Ketenagakerjaan','Hukum Imigrasi','Hukum Perdata','Berita Hukum'] as $cat)
                            <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                        @error('category')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label" for="user_id">Penulis</label>
                        <select id="user_id" name="user_id" class="adm-select">
                            @foreach (\App\Models\User::all() as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', auth()->id()) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            {{-- Featured image --}}
            <div class="adm-card">
                <div class="adm-card-header">
                    <i class="fas fa-image" style="color:var(--oak);"></i>
                    <span class="adm-card-title">Gambar Unggulan</span>
                </div>
                <div class="adm-card-body">
                    <div class="adm-img-preview" id="photo-preview-wrap">
                        <img id="photo-preview-img" src="" style="display:none;" alt="featured image preview">
                        <i class="fas fa-image ph" id="photo-preview-ph"></i>
                    </div>
                    <div class="adm-form-group" style="margin-top:0.75rem; margin-bottom:0;">
                        <label class="adm-label" for="photo-input">Upload Gambar</label>
                        <input type="file" id="photo-input" name="featured_image" class="adm-input"
                            accept="image/jpeg,image/png,image/webp" style="padding:0.4rem;">
                        <div class="adm-form-hint">JPG, PNG, WebP. Maks 5MB.</div>
                        @error('featured_image')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            <div style="display:flex; flex-direction:column; gap:0.625rem;">
                <button type="submit" class="adm-btn adm-btn-primary" style="width:100%; justify-content:center; padding:0.75rem;">
                    <i class="fas fa-floppy-disk"></i> Simpan Artikel
                </button>
                <a href="{{ route('admin.articles.index') }}" class="adm-btn adm-btn-ghost" style="width:100%; justify-content:center;">
                    Batal
                </a>
            </div>
        </div>
    </div>
</form>
@endsection
