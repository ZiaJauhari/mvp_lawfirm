<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — MVP Law Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=1.0">


    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --comet: #242844;
            --comet-dark: #1a1c2e;
            --comet-mid: #2d3050;
            --oak: #B89A72;
            --oak-dark: #8a7048;
            --oak-darker: #6b5639;
            --oak-light: #d4b896;
            --cream: #FDFBFC;
            --cream-alt: #F5F3F4;
            --text-muted: #5a5e7a;
            --sidebar-w: 260px;
            --header-h: 64px;
            --transition: all 0.25s cubic-bezier(0.4,0,0.2,1);
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--cream-alt);
            color: var(--comet);
            min-height: 100vh;
            font-size: 0.9rem;
            -webkit-font-smoothing: antialiased;
        }

        /* ── SIDEBAR ── */
        .adm-sidebar {
            position: fixed;
            top: 0; left: 0; bottom: 0;
            width: var(--sidebar-w);
            background: linear-gradient(180deg, var(--comet-dark) 0%, var(--comet) 100%);
            z-index: 50;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
        }

        .adm-sidebar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1.25rem 1.25rem 1rem;
            border-bottom: 1px solid rgba(184,154,114,0.12);
            text-decoration: none;
        }

        .adm-sidebar-brand-icon {
            width: 40px; height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--oak), var(--oak-light));
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .adm-sidebar-brand-icon i { color: var(--comet); font-size: 1.1rem; }

        .adm-sidebar-brand-text .name {
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            font-weight: 700;
            color: #FDFBFC;
            display: block;
            line-height: 1.2;
        }

        .adm-sidebar-brand-text .sub {
            font-size: 0.6rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--oak-light);
        }

        .adm-nav { flex: 1; overflow-y: auto; padding: 0.75rem; }

        .adm-nav-label {
            font-size: 0.6rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: rgba(253,251,252,0.35);
            padding: 0.75rem 0.75rem 0.35rem;
        }

        .adm-nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.7rem 0.875rem;
            border-radius: 0.625rem;
            color: rgba(253,251,252,0.7);
            text-decoration: none;
            font-size: 0.83rem;
            font-weight: 500;
            transition: var(--transition);
            margin-bottom: 2px;
            position: relative;
        }

        .adm-nav-link i { width: 18px; text-align: center; font-size: 0.9rem; flex-shrink: 0; }

        .adm-nav-link:hover {
            background: rgba(184,154,114,0.1);
            color: #FDFBFC;
        }

        .adm-nav-link.active {
            background: linear-gradient(135deg, rgba(184,154,114,0.2), rgba(212,184,150,0.1));
            color: var(--oak-light);
            border: 1px solid rgba(184,154,114,0.2);
        }

        .adm-nav-link.active::before {
            content: '';
            position: absolute;
            left: 0; top: 25%; bottom: 25%;
            width: 3px;
            border-radius: 0 2px 2px 0;
            background: var(--oak);
        }

        .adm-nav-badge {
            margin-left: auto;
            background: var(--oak);
            color: var(--comet);
            font-size: 0.6rem;
            font-weight: 800;
            padding: 1px 6px;
            border-radius: 9999px;
        }

        .adm-sidebar-footer {
            padding: 0.875rem;
            border-top: 1px solid rgba(184,154,114,0.1);
        }

        .adm-logout-btn {
            display: flex;
            align-items: center;
            gap: 0.625rem;
            width: 100%;
            padding: 0.65rem 0.875rem;
            border-radius: 0.5rem;
            background: rgba(220, 53, 69, 0.08);
            border: 1px solid rgba(220, 53, 69, 0.15);
            color: #f87171;
            font-size: 0.83rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .adm-logout-btn:hover {
            background: rgba(220, 53, 69, 0.18);
            color: #fca5a5;
        }

        /* ── MAIN ── */
        .adm-main {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── HEADER ── */
        .adm-header {
            height: var(--header-h);
            background: rgba(253,251,252,0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(184,154,114,0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.75rem;
            position: sticky;
            top: 0;
            z-index: 40;
            box-shadow: 0 2px 12px rgba(36,40,68,0.05);
        }

        .adm-breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .adm-breadcrumb .sep { opacity: 0.4; }
        .adm-breadcrumb .current { color: var(--comet); font-weight: 600; }

        .adm-header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .adm-user-pill {
            display: flex;
            align-items: center;
            gap: 0.625rem;
            padding: 0.375rem 0.875rem 0.375rem 0.375rem;
            border-radius: 9999px;
            background: var(--cream-alt);
            border: 1px solid rgba(184,154,114,0.15);
        }

        .adm-user-avatar {
            width: 32px; height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--oak), var(--oak-light));
            display: flex; align-items: center; justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--comet);
        }

        .adm-user-name { font-size: 0.8rem; font-weight: 600; color: var(--comet); }

        /* ── PAGE CONTENT ── */
        .adm-content { flex: 1; padding: 1.75rem; }

        /* ── PAGE HEADER ── */
        .adm-page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .adm-page-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--comet);
        }

        .adm-page-subtitle { font-size: 0.8rem; color: var(--text-muted); margin-top: 2px; }

        /* ── CARDS ── */
        .adm-card {
            background: #fff;
            border-radius: 1rem;
            border: 1px solid rgba(184,154,114,0.1);
            box-shadow: 0 2px 12px rgba(36,40,68,0.05);
            overflow: hidden;
        }

        .adm-card-header {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid rgba(36,40,68,0.06);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .adm-card-title {
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--comet);
        }

        .adm-card-body { padding: 1.25rem; }

        /* ── STAT CARDS ── */
        .adm-stat {
            background: #fff;
            border-radius: 1rem;
            border: 1px solid rgba(184,154,114,0.1);
            box-shadow: 0 2px 12px rgba(36,40,68,0.05);
            padding: 1.25rem;
            position: relative;
            overflow: hidden;
            transition: var(--transition);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .adm-stat:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(36,40,68,0.1); }

        .adm-stat-icon {
            width: 44px; height: 44px;
            border-radius: 0.625rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem;
            margin-bottom: 0.875rem;
        }

        .adm-stat-value {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--comet);
            line-height: 1;
        }

        .adm-stat-label { font-size: 0.78rem; color: var(--text-muted); margin-top: 0.25rem; font-weight: 500; }

        .adm-stat-bg {
            position: absolute;
            bottom: -10px; right: -10px;
            font-size: 4rem;
            opacity: 0.04;
            pointer-events: none;
        }

        /* ── TABLES ── */
        .adm-table { width: 100%; border-collapse: collapse; }

        .adm-table th {
            padding: 0.75rem 1rem;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--text-muted);
            background: var(--cream-alt);
            border-bottom: 1px solid rgba(184,154,114,0.1);
            white-space: nowrap;
        }

        .adm-table td {
            padding: 0.875rem 1rem;
            font-size: 0.83rem;
            color: var(--comet);
            border-bottom: 1px solid rgba(36,40,68,0.05);
            vertical-align: middle;
        }

        .adm-table tbody tr:hover { background: rgba(184,154,114,0.03); }
        .adm-table tbody tr:last-child td { border-bottom: none; }

        /* ── BADGES ── */
        .adm-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.2rem 0.6rem;
            border-radius: 9999px;
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .adm-badge-success { background: rgba(16,185,129,0.1); color: #059669; border: 1px solid rgba(16,185,129,0.2); }
        .adm-badge-secondary { background: rgba(107,114,128,0.1); color: #6b7280; border: 1px solid rgba(107,114,128,0.15); }
        .adm-badge-warning { background: rgba(245,158,11,0.1); color: #d97706; border: 1px solid rgba(245,158,11,0.2); }
        .adm-badge-danger { background: rgba(239,68,68,0.1); color: #dc2626; border: 1px solid rgba(239,68,68,0.15); }
        .adm-badge-oak { background: rgba(184,154,114,0.1); color: var(--oak-dark); border: 1px solid rgba(184,154,114,0.2); }

        /* ── BUTTONS ── */
        .adm-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.55rem 1.1rem;
            border-radius: 0.5rem;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            text-decoration: none;
            white-space: nowrap;
        }

        .adm-btn-primary {
            background: linear-gradient(135deg, var(--oak), var(--oak-light));
            color: var(--comet);
        }

        .adm-btn-primary:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(184,154,114,0.35); color: var(--comet); }

        .adm-btn-outline {
            background: transparent;
            color: var(--oak-dark);
            border: 1.5px solid rgba(184,154,114,0.4);
        }

        .adm-btn-outline:hover { background: rgba(184,154,114,0.08); color: var(--oak-dark); }

        .adm-btn-ghost {
            background: transparent;
            color: var(--text-muted);
            border: 1.5px solid rgba(36,40,68,0.1);
        }

        .adm-btn-ghost:hover { background: var(--cream-alt); color: var(--comet); }

        .adm-btn-danger { background: rgba(239,68,68,0.08); color: #dc2626; border: 1.5px solid rgba(239,68,68,0.15); }
        .adm-btn-danger:hover { background: rgba(239,68,68,0.15); color: #b91c1c; }

        .adm-btn-sm { padding: 0.35rem 0.75rem; font-size: 0.75rem; }

        /* ── FORMS ── */
        .adm-form-group { margin-bottom: 1.25rem; }

        .adm-label {
            display: block;
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--comet);
            margin-bottom: 0.375rem;
            letter-spacing: 0.01em;
        }

        .adm-label .req { color: #dc2626; margin-left: 2px; }

        .adm-input, .adm-select, .adm-textarea {
            width: 100%;
            padding: 0.65rem 0.875rem;
            border-radius: 0.5rem;
            border: 1.5px solid rgba(184,154,114,0.22);
            background: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 0.85rem;
            color: var(--comet);
            transition: var(--transition);
            appearance: none;
        }

        .adm-input:focus, .adm-select:focus, .adm-textarea:focus {
            outline: none;
            border-color: var(--oak);
            box-shadow: 0 0 0 3px rgba(184,154,114,0.12);
        }

        .adm-input::placeholder, .adm-textarea::placeholder { color: var(--text-muted); }
        .adm-textarea { min-height: 120px; resize: vertical; line-height: 1.6; }
        .adm-select {
            padding-right: 2.25rem;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%235a5e7a' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            cursor: pointer;
        }

        .adm-form-hint { font-size: 0.72rem; color: var(--text-muted); margin-top: 0.3rem; }

        .adm-form-error { font-size: 0.72rem; color: #dc2626; margin-top: 0.3rem; }

        .adm-toggle-wrap { display: flex; align-items: center; gap: 0.75rem; }

        .adm-toggle {
            width: 44px; height: 24px;
            background: rgba(184,154,114,0.2);
            border-radius: 12px;
            position: relative;
            cursor: pointer;
            transition: background 0.25s ease;
            border: none;
            flex-shrink: 0;
        }

        .adm-toggle::after {
            content: '';
            position: absolute;
            width: 18px; height: 18px;
            border-radius: 50%;
            background: #fff;
            top: 3px; left: 3px;
            transition: transform 0.25s ease;
            box-shadow: 0 1px 4px rgba(0,0,0,0.15);
        }

        input[type="checkbox"].adm-toggle-input:checked + .adm-toggle {
            background: var(--oak);
        }

        input[type="checkbox"].adm-toggle-input:checked + .adm-toggle::after {
            transform: translateX(20px);
        }

        input[type="checkbox"].adm-toggle-input { display: none; }

        /* ── ALERTS ── */
        .adm-alert {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 0.875rem 1rem;
            border-radius: 0.625rem;
            margin-bottom: 1.25rem;
            font-size: 0.82rem;
        }

        .adm-alert-success { background: rgba(16,185,129,0.08); border: 1px solid rgba(16,185,129,0.2); color: #047857; }
        .adm-alert-danger  { background: rgba(239,68,68,0.08);  border: 1px solid rgba(239,68,68,0.2);  color: #b91c1c; }

        .adm-alert-close { margin-left: auto; cursor: pointer; opacity: 0.6; background: none; border: none; font-size: 0.9rem; color: inherit; }
        .adm-alert-close:hover { opacity: 1; }

        /* ── GRID ── */
        .adm-grid { display: grid; gap: 1.25rem; }
        .adm-grid > a { display: block; height: 100%; text-decoration: none; }
        .adm-grid-2 { grid-template-columns: repeat(2, 1fr); }
        .adm-grid-3 { grid-template-columns: repeat(3, 1fr); }
        .adm-grid-4 { grid-template-columns: repeat(4, 1fr); }

        @media (max-width: 768px) {
            .adm-grid-2, .adm-grid-3 { grid-template-columns: 1fr; }
            .adm-grid-4 { grid-template-columns: repeat(2, 1fr); gap: 0.75rem; }
        }

        /* ── SEARCH BAR ── */
        .adm-search-wrap { position: relative; }
        .adm-search-wrap input { padding-left: 2.25rem; }
        .adm-search-wrap .search-icon {
            position: absolute;
            left: 0.75rem; top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.8rem;
            pointer-events: none;
        }

        /* ── IMAGE PREVIEW ── */
        .adm-img-preview {
            width: 100%; max-width: 200px;
            border-radius: 0.625rem;
            border: 1.5px dashed rgba(184,154,114,0.3);
            overflow: hidden;
            background: var(--cream-alt);
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 0.5rem;
        }

        .adm-img-preview img {
            width: 100%; height: 100%;
            object-fit: cover;
        }

        .adm-img-preview .ph { color: rgba(184,154,114,0.4); font-size: 2.5rem; }

        /* ── ICON PICKER ── */
        .adm-icon-preview {
            display: flex;
            align-items: center;
            gap: 0.625rem;
            margin-top: 0.375rem;
        }

        .adm-icon-preview .icon-box {
            width: 40px; height: 40px;
            border-radius: 0.5rem;
            background: linear-gradient(135deg, rgba(184,154,114,0.15), rgba(212,184,150,0.1));
            border: 1.5px solid rgba(184,154,114,0.2);
            display: flex; align-items: center; justify-content: center;
            color: var(--oak-dark);
            font-size: 1.1rem;
        }

        /* ── MOBILE ── */
        .adm-mob-toggle {
            display: none;
            position: fixed;
            top: 12px; left: 16px;
            z-index: 60;
            width: 40px; height: 40px;
            border-radius: 0.5rem;
            background: #fff;
            color: var(--comet);
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(184,154,114,0.25);
            box-shadow: 0 2px 8px rgba(36,40,68,0.05);
            cursor: pointer;
            transition: var(--transition);
        }

        .adm-mob-toggle:hover {
            background: var(--cream-alt);
        }

        .adm-mob-toggle.open {
            background: rgba(255,255,255,0.1);
            color: #fff;
            border-color: rgba(255,255,255,0.2);
            box-shadow: none;
        }

        .adm-overlay { display: none; }

        @media (max-width: 900px) {
            .adm-sidebar { transform: translateX(-100%); }
            .adm-sidebar.open { transform: translateX(0); }
            .adm-main { margin-left: 0; }
            .adm-mob-toggle { display: flex; }
            .adm-overlay.open {
                display: block;
                position: fixed; inset: 0;
                background: rgba(0,0,0,0.4);
                z-index: 45;
                backdrop-filter: blur(2px);
            }
            .adm-header { padding-left: 4.5rem; }
            .adm-sidebar-brand { padding-left: 4.5rem; }
        }

        @media (max-width: 600px) {
            .hidable-on-mob { display: none !important; }
            .adm-user-name { display: none !important; }
            .adm-user-pill { padding: 0.25rem !important; border-radius: 50% !important; }
            .adm-header-right { gap: 0.75rem !important; }
            .adm-breadcrumb { font-size: 0.75rem; gap: 0.35rem; }
            .adm-header { padding-right: 1.25rem; }
        }

        /* ── PAGINATION ── */
        .adm-pagination { display: flex; gap: 0.375rem; align-items: center; flex-wrap: wrap; }
        .adm-pagination a, .adm-pagination span {
            min-width: 36px; height: 36px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 0.5rem;
            font-size: 0.78rem;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
        }

        .adm-pagination a { border: 1.5px solid rgba(184,154,114,0.18); color: var(--text-muted); background: #fff; }
        .adm-pagination a:hover { background: rgba(184,154,114,0.08); color: var(--oak-dark); border-color: var(--oak); }
        .adm-pagination span[aria-current="page"] {
            background: linear-gradient(135deg,var(--oak),var(--oak-light));
            color: var(--comet);
            border: none;
        }

        /* ── DELETE CONFIRM MODAL ── */
        .adm-modal-bg {
            display: none;
            position: fixed; inset: 0;
            background: rgba(26,28,46,0.5);
            backdrop-filter: blur(4px);
            z-index: 200;
            align-items: center;
            justify-content: center;
        }
        .adm-modal-bg.open { display: flex; }

        .adm-modal {
            background: #fff;
            border-radius: 1.25rem;
            padding: 2rem;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 20px 60px rgba(36,40,68,0.2);
            text-align: center;
        }

        .adm-modal-icon {
            width: 56px; height: 56px;
            border-radius: 50%;
            background: rgba(239,68,68,0.1);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.4rem;
            color: #dc2626;
        }

        .adm-modal-title { font-family: 'Playfair Display', serif; font-size: 1.25rem; font-weight: 700; color: var(--comet); margin-bottom: 0.5rem; }
        .adm-modal-body { font-size: 0.83rem; color: var(--text-muted); margin-bottom: 1.5rem; }

        .adm-modal-actions { display: flex; gap: 0.75rem; justify-content: center; }
    </style>

    @yield('styles')
</head>
<body>

    {{-- Mobile overlay --}}
    <div class="adm-overlay" id="adm-overlay" onclick="closeSidebar()"></div>

    {{-- Mobile toggle --}}
    <button class="adm-mob-toggle" id="adm-mob-toggle" onclick="toggleSidebar()" aria-label="Toggle menu">
        <i class="fas fa-bars"></i>
    </button>

    {{-- Sidebar --}}
    <aside class="adm-sidebar" id="adm-sidebar">
        {{-- Brand --}}
        <a href="{{ route('admin.dashboard') }}" class="adm-sidebar-brand">
            <img src="{{ asset('logomvp.png') }}" alt="MVP Law Logo" style="height: 40px; width: auto; object-fit: contain;">
        </a>


        {{-- Navigation --}}
        <nav class="adm-nav">
            <div class="adm-nav-label">Utama</div>

            <a href="{{ route('admin.dashboard') }}"
               class="adm-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-gauge-high"></i> Dashboard
            </a>

            <div class="adm-nav-label" style="margin-top:0.75rem;">Konten</div>

            <a href="{{ route('admin.services.index') }}"
               class="adm-nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <i class="fas fa-briefcase"></i> Layanan
            </a>

            <a href="{{ route('admin.teams.index') }}"
               class="adm-nav-link {{ request()->routeIs('admin.teams.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Tim
            </a>

            <a href="{{ route('admin.articles.index') }}"
               class="adm-nav-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                <i class="fas fa-newspaper"></i> Artikel
            </a>

            <a href="{{ route('admin.testimonials.index') }}"
               class="adm-nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                <i class="fas fa-quote-left"></i> Testimoni
            </a>

            <div class="adm-nav-label" style="margin-top:0.75rem;">Lainnya</div>

            <a href="{{ route('admin.contacts.index') }}"
               class="adm-nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> Pesan Masuk
                {{-- Optionally show unread badge would need to inject $unreadCount globally --}}
            </a>

            <a href="{{ route('admin.page-contents.index') }}"
               class="adm-nav-link {{ request()->routeIs('admin.page-contents.*') ? 'active' : '' }}">
                <i class="fas fa-pen-to-square"></i> Konten Halaman
            </a>
        </nav>

        {{-- Footer / Logout --}}
        <div class="adm-sidebar-footer">
            <div style="display:flex; align-items:center; gap:0.625rem; padding:0.625rem 0.25rem; margin-bottom:0.625rem;">
                <div class="adm-user-avatar" style="width:32px;height:32px;">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div>
                    <div style="font-size:0.78rem; font-weight:600; color:#FDFBFC;">{{ auth()->user()->name ?? 'Admin' }}</div>
                    <div style="font-size:0.65rem; color:rgba(253,251,252,0.45);">Super Admin</div>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="adm-logout-btn">
                    <i class="fas fa-right-from-bracket"></i>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    {{-- Main --}}
    <div class="adm-main">

        {{-- Header --}}
        <header class="adm-header">
            <div class="adm-breadcrumb">
                <i class="fas fa-scale-balanced" style="color:var(--oak); font-size:0.85rem;"></i>
                <span class="sep hidable-on-mob">/</span>
                <span class="hidable-on-mob">Admin</span>
                @hasSection('breadcrumb')
                    <span class="sep">/</span>
                    <span class="current" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 120px;">@yield('breadcrumb')</span>
                @endif
            </div>
            <div class="adm-header-right">
                <a href="{{ url('/') }}" target="_blank" rel="noopener"
                   style="font-size:0.78rem; color:var(--text-muted); text-decoration:none; display:flex; align-items:center; gap:0.35rem;">
                    <i class="fas fa-arrow-up-right-from-square" style="font-size:0.75rem;"></i>
                    <span class="hidable-on-mob">Lihat Situs</span>
                </a>
                <div class="adm-user-pill">
                    <div class="adm-user-avatar">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <span class="adm-user-name">{{ auth()->user()->name ?? 'Admin' }}</span>
                </div>
            </div>
        </header>

        {{-- Alerts --}}
        <div style="padding:1rem 1.75rem 0;">
            @if (session('success'))
            <div class="adm-alert adm-alert-success" id="adm-flash">
                <i class="fas fa-check-circle" style="margin-top:1px; flex-shrink:0;"></i>
                <span>{{ session('success') }}</span>
                <button class="adm-alert-close" onclick="this.closest('.adm-alert').remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            @endif
            @if (session('error'))
            <div class="adm-alert adm-alert-danger">
                <i class="fas fa-triangle-exclamation" style="margin-top:1px; flex-shrink:0;"></i>
                <span>{{ session('error') }}</span>
                <button class="adm-alert-close" onclick="this.closest('.adm-alert').remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            @endif
            @if ($errors->any())
            <div class="adm-alert adm-alert-danger">
                <i class="fas fa-circle-xmark" style="margin-top:1px; flex-shrink:0;"></i>
                <div>
                    <strong>Harap perbaiki kesalahan berikut:</strong>
                    <ul style="margin:0.4rem 0 0 1.1rem; padding:0; font-size:0.78rem;">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>

        {{-- Page Content --}}
        <div class="adm-content">
            @yield('content')
        </div>

        {{-- Footer --}}
        <footer style="padding:1rem 1.75rem; border-top:1px solid rgba(184,154,114,0.1); display:flex; justify-content:space-between; align-items:center; font-size:0.72rem; color:var(--text-muted);">
            <span>&copy; {{ date('Y') }} MVP Law Firm — Admin Panel</span>
            <span style="color:rgba(184,154,114,0.6); font-family:'Playfair Display',serif;">MVP Law</span>
        </footer>
    </div>

    {{-- Delete Confirm Modal --}}
    <div class="adm-modal-bg" id="deleteModal">
        <div class="adm-modal">
            <div class="adm-modal-icon"><i class="fas fa-trash"></i></div>
            <div class="adm-modal-title">Konfirmasi Hapus</div>
            <div class="adm-modal-body" id="deleteModalBody">Apakah Anda yakin ingin menghapus item ini? Tindakan ini tidak dapat dibatalkan.</div>
            <div class="adm-modal-actions">
                <button class="adm-btn adm-btn-ghost" onclick="closeDeleteModal()">
                    <i class="fas fa-times"></i> Batal
                </button>
                <form id="deleteModalForm" method="POST" style="margin:0;">
                    @csrf @method('DELETE')
                    <button type="submit" class="adm-btn adm-btn-danger">
                        <i class="fas fa-trash"></i> Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
    // Sidebar mobile
    function toggleSidebar(){
        var sidebar = document.getElementById('adm-sidebar');
        var overlay = document.getElementById('adm-overlay');
        var toggleBtn = document.getElementById('adm-mob-toggle');
        
        var isOpen = sidebar.classList.contains('open');
        
        if (isOpen) {
            sidebar.classList.remove('open');
            overlay.classList.remove('open');
            toggleBtn.classList.remove('open');
            toggleBtn.innerHTML = '<i class="fas fa-bars"></i>';
        } else {
            sidebar.classList.add('open');
            overlay.classList.add('open');
            toggleBtn.classList.add('open');
            toggleBtn.innerHTML = '<i class="fas fa-times"></i>';
        }
    }
    
    function closeSidebar(){
        document.getElementById('adm-sidebar').classList.remove('open');
        document.getElementById('adm-overlay').classList.remove('open');
        var toggleBtn = document.getElementById('adm-mob-toggle');
        toggleBtn.classList.remove('open');
        toggleBtn.innerHTML = '<i class="fas fa-bars"></i>';
    }

    // Auto-dismiss flash after 5s
    var flash = document.getElementById('adm-flash');
    if(flash) setTimeout(function(){ flash.style.opacity='0'; flash.style.transition='opacity 0.5s ease'; setTimeout(function(){ flash.remove(); }, 500); }, 5000);

    // Delete modal
    function confirmDelete(action, label){
        var modal = document.getElementById('deleteModal');
        var body  = document.getElementById('deleteModalBody');
        var form  = document.getElementById('deleteModalForm');
        body.textContent = 'Apakah Anda yakin ingin menghapus "' + (label||'item') + '"? Tindakan ini tidak dapat dibatalkan.';
        form.action = action;
        modal.classList.add('open');
    }
    function closeDeleteModal(){
        document.getElementById('deleteModal').classList.remove('open');
    }
    document.getElementById('deleteModal').addEventListener('click', function(e){
        if(e.target===this) closeDeleteModal();
    });

    // Icon live preview
    var iconInput = document.getElementById('icon-input');
    if(iconInput){
        iconInput.addEventListener('input', function(){
            var box = document.getElementById('icon-preview-box');
            if(box){ box.className = 'fas ' + this.value.trim(); }
        });
    }

    // Image preview
    var photoInput = document.getElementById('photo-input');
    if(photoInput){
        photoInput.addEventListener('change', function(){
            var reader = new FileReader();
            reader.onload = function(e){
                var img = document.getElementById('photo-preview-img');
                var ph  = document.getElementById('photo-preview-ph');
                if(img){ img.src = e.target.result; img.style.display='block'; }
                if(ph){ ph.style.display='none'; }
            };
            reader.readAsDataURL(this.files[0]);
        });
    }
    </script>

    @yield('scripts')
</body>
</html>
