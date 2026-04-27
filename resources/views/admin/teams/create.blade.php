@extends('layouts.admin')
@section('title', 'Tambah Anggota Tim')
@section('breadcrumb', 'Tim / Tambah')

@section('content')
<div class="adm-page-header">
    <div>
        <h1 class="adm-page-title">Tambah Anggota Tim</h1>
        <p class="adm-page-subtitle">Tambahkan pengacara atau staf baru</p>
    </div>
    <a href="{{ route('admin.teams.index') }}" class="adm-btn adm-btn-ghost">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="display:grid; grid-template-columns:1fr 320px; gap:1.25rem; align-items:start;">

        {{-- Main --}}
        <div class="adm-card">
            <div class="adm-card-header">
                <i class="fas fa-user-tie" style="color:var(--oak);"></i>
                <span class="adm-card-title">Informasi Anggota</span>
            </div>
            <div class="adm-card-body">
                <div class="adm-grid adm-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label" for="name">Nama Lengkap <span class="req">*</span></label>
                        <input type="text" id="name" name="name" class="adm-input"
                            value="{{ old('name') }}" placeholder="cth. Dr. Ahmad Fauzi, S.H., M.H." required>
                        @error('name')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label" for="position">Jabatan <span class="req">*</span></label>
                        <input type="text" id="position" name="position" class="adm-input"
                            value="{{ old('position') }}" placeholder="cth. Partner Senior" required>
                        @error('position')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label" for="specialization">Spesialisasi</label>
                    <input type="text" id="specialization" name="specialization" class="adm-input"
                        value="{{ old('specialization') }}" placeholder="cth. Hukum Korporasi, Hukum Kontrak">
                    <div class="adm-form-hint">Pisahkan dengan koma untuk beberapa spesialisasi</div>
                    @error('specialization')<div class="adm-form-error">{{ $message }}</div>@enderror
                </div>

                <div class="adm-form-group">
                    <label class="adm-label" for="bio">Biografi</label>
                    <textarea id="bio" name="bio" class="adm-textarea" placeholder="Ceritakan latar belakang, pengalaman, dan keahlian anggota ini...">{{ old('bio') }}</textarea>
                    @error('bio')<div class="adm-form-error">{{ $message }}</div>@enderror
                </div>

                <div class="adm-grid adm-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="adm-input"
                            value="{{ old('email') }}" placeholder="nama@mvplaw.id">
                        @error('email')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label" for="phone">Telepon</label>
                        <input type="text" id="phone" name="phone" class="adm-input"
                            value="{{ old('phone') }}" placeholder="+62 812 xxxx xxxx">
                        @error('phone')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div style="display:flex; flex-direction:column; gap:1.25rem;">

            {{-- Photo upload --}}
            <div class="adm-card">
                <div class="adm-card-header">
                    <i class="fas fa-image" style="color:var(--oak);"></i>
                    <span class="adm-card-title">Foto</span>
                </div>
                <div class="adm-card-body">
                    <div class="adm-img-preview" id="photo-preview-wrap">
                        <img id="photo-preview-img" src="" style="display:none;" alt="preview">
                        <i class="fas fa-user ph" id="photo-preview-ph"></i>
                    </div>
                    <div class="adm-form-group" style="margin-top:0.75rem; margin-bottom:0;">
                        <label class="adm-label" for="photo-input">Upload Foto</label>
                        <input type="file" id="photo-input" name="photo" class="adm-input"
                            accept="image/jpeg,image/png,image/webp" style="padding:0.4rem;">
                        <div class="adm-form-hint">JPG, PNG, WebP. Maks 2MB. Rasio 1:1 disarankan.</div>
                        @error('photo')<div class="adm-form-error">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            {{-- Settings --}}
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
                    <i class="fas fa-floppy-disk"></i> Simpan Anggota
                </button>
                <a href="{{ route('admin.teams.index') }}" class="adm-btn adm-btn-ghost" style="width:100%; justify-content:center;">
                    Batal
                </a>
            </div>
        </div>
    </div>
</form>
@endsection
