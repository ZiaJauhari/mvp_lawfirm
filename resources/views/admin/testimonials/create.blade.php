@extends('layouts.admin')
@section('title', 'Tambah Testimoni')
@section('breadcrumb', 'Testimoni / Tambah')

@section('content')
<div class="adm-page-header">
    <div>
        <h1 class="adm-page-title">Tambah Testimoni</h1>
        <p class="adm-page-subtitle">Tambahkan ulasan klien baru</p>
    </div>
    <a href="{{ route('admin.testimonials.index') }}" class="adm-btn adm-btn-ghost">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
    @csrf
    <div style="display:grid; grid-template-columns:1fr 300px; gap:1.25rem; align-items:start;">

        {{-- Main --}}
        <div class="adm-card">
            <div class="adm-card-header">
                <i class="fas fa-quote-left" style="color:var(--oak);"></i>
                <span class="adm-card-title">Isi Testimoni</span>
            </div>
            <div class="adm-card-body">
                <div class="adm-grid adm-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label" for="client_name">Nama Klien <span class="req">*</span></label>
                        <input type="text" id="client_name" name="client_name" class="adm-input"
                            value="{{ old('client_name') }}" placeholder="cth. Budi Santoso" required>
                        @error('client_name')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label" for="client_position">Jabatan / Profesi</label>
                        <input type="text" id="client_position" name="client_position" class="adm-input"
                            value="{{ old('client_position') }}" placeholder="cth. Direktur PT. Maju">
                        @error('client_position')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="adm-form-group" style="margin-bottom:0;">
                    <label class="adm-label" for="testimonial">Isi Testimoni <span class="req">*</span></label>
                    <textarea id="testimonial" name="testimonial" class="adm-textarea" style="min-height:160px;" required
                        placeholder="Tuliskan apa yang dikatakan klien tentang layanan Anda...">{{ old('testimonial') }}</textarea>
                    @error('testimonial')<div class="adm-form-error">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div style="display:flex; flex-direction:column; gap:1.25rem;">

            {{-- Photo --}}
            <div class="adm-card">
                <div class="adm-card-header">
                    <i class="fas fa-image" style="color:var(--oak);"></i>
                    <span class="adm-card-title">Foto Klien</span>
                </div>
                <div class="adm-card-body">
                    <div class="adm-img-preview">
                        <img id="photo-preview-img" src="" style="display:none;" alt="preview">
                        <i class="fas fa-user ph" id="photo-preview-ph"></i>
                    </div>
                    <div class="adm-form-group" style="margin-top:0.75rem; margin-bottom:0;">
                        <label class="adm-label" for="photo-input">Upload Foto</label>
                        <input type="file" id="photo-input" name="client_photo" class="adm-input"
                            accept="image/jpeg,image/png,image/webp" style="padding:0.4rem;">
                        <div class="adm-form-hint">JPG, PNG, WebP. Rasio 1:1.</div>
                        @error('client_photo')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            {{-- Settings --}}
            <div class="adm-card">
                <div class="adm-card-header">
                    <i class="fas fa-star" style="color:var(--oak);"></i>
                    <span class="adm-card-title">Rating & Status</span>
                </div>
                <div class="adm-card-body">
                    <div class="adm-form-group">
                        <label class="adm-label" for="rating">Rating</label>
                        <select id="rating" name="rating" class="adm-select">
                            @for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" {{ old('rating', 5) == $i ? 'selected' : '' }}>
                                    {{ str_repeat('★', $i) }}{{ str_repeat('☆', 5-$i) }} — {{ $i }} Bintang
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label">Status</label>
                        <div class="adm-toggle-wrap">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" class="adm-toggle-input" id="is_active" name="is_active" value="1"
                                {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="adm-toggle" for="is_active"></label>
                            <span style="font-size:0.8rem;">Aktif / Tampil</span>
                        </div>
                    </div>
                </div>
            </div>

            <div style="display:flex; flex-direction:column; gap:0.625rem;">
                <button type="submit" class="adm-btn adm-btn-primary" style="width:100%; justify-content:center; padding:0.75rem;">
                    <i class="fas fa-floppy-disk"></i> Simpan Testimoni
                </button>
                <a href="{{ route('admin.testimonials.index') }}" class="adm-btn adm-btn-ghost" style="width:100%; justify-content:center;">
                    Batal
                </a>
            </div>
        </div>
    </div>
</form>
@endsection
