<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Login — MVP Law Firm</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --comet:      #242844;
            --comet-dark: #1a1c2e;
            --oak:        #B89A72;
            --oak-light:  #d4b896;
            --oak-dark:   #8a7048;
            --cream:      #FDFBFC;
            --cream-alt:  #F5F3F4;
            --text-muted: #5a5e7a;
        }

        html, body {
            height: 100%;
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
            background: var(--cream-alt);
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        /* ── CARD ── */
        .login-card {
            background: var(--cream);
            border-radius: 1.25rem;
            border: 1px solid rgba(184,154,114,0.12);
            box-shadow: 0 8px 40px rgba(36,40,68,0.08), 0 1px 4px rgba(36,40,68,0.04);
            width: 100%;
            max-width: 420px;
            padding: 2.5rem 2.25rem;
        }

        /* Header */
        .login-header { margin-bottom: 2rem; }

        .welcome {
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            color: var(--oak);
            margin-bottom: 0.625rem;
        }

        .login-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--comet);
            line-height: 1.2;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            font-size: 0.83rem;
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* Form */
        .form-group { margin-bottom: 1.25rem; }

        .form-label {
            display: block;
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--comet);
            margin-bottom: 0.4rem;
        }

        .input-wrap { position: relative; }

        .input-icon {
            position: absolute;
            left: 0.85rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.78rem;
            pointer-events: none;
            transition: color 0.2s;
        }

        .form-input {
            width: 100%;
            padding: 0.72rem 0.875rem 0.72rem 2.4rem;
            border-radius: 0.625rem;
            border: 1.5px solid rgba(184,154,114,0.22);
            background: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 0.875rem;
            color: var(--comet);
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--oak);
            box-shadow: 0 0 0 3px rgba(184,154,114,0.13);
        }

        .form-input:focus ~ .input-icon { color: var(--oak-dark); }

        .form-input.is-invalid {
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220,38,38,0.08);
        }

        /* Password toggle */
        .pwd-toggle {
            position: absolute;
            right: 0.85rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-muted);
            font-size: 0.8rem;
            padding: 4px;
            transition: color 0.2s;
            line-height: 1;
        }
        .pwd-toggle:hover { color: var(--comet); }

        /* Error alert */
        .login-alert {
            display: flex;
            align-items: flex-start;
            gap: 0.625rem;
            padding: 0.8rem 1rem;
            border-radius: 0.5rem;
            background: rgba(239,68,68,0.07);
            border: 1px solid rgba(239,68,68,0.18);
            margin-bottom: 1.25rem;
            font-size: 0.8rem;
            color: #b91c1c;
            line-height: 1.5;
        }

        /* Remember row */
        .remember-row {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .custom-checkbox {
            width: 16px; height: 16px;
            border-radius: 4px;
            border: 1.5px solid rgba(184,154,114,0.35);
            appearance: none;
            -webkit-appearance: none;
            cursor: pointer;
            position: relative;
            flex-shrink: 0;
            transition: all 0.18s;
        }
        .custom-checkbox:checked {
            background: var(--oak);
            border-color: var(--oak);
        }
        .custom-checkbox:checked::after {
            content: '';
            position: absolute;
            left: 4px; top: 1px;
            width: 5px; height: 9px;
            border: 2px solid #fff;
            border-top: none; border-left: none;
            transform: rotate(45deg);
        }

        .checkbox-label {
            font-size: 0.78rem;
            color: var(--text-muted);
            cursor: pointer;
            user-select: none;
        }

        /* Submit button */
        .btn-login {
            width: 100%;
            padding: 0.85rem;
            border-radius: 0.625rem;
            background: var(--comet);
            color: #FDFBFC;
            font-family: 'Inter', sans-serif;
            font-size: 0.875rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background 0.25s, transform 0.2s, box-shadow 0.25s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        .btn-login:hover {
            background: #2d3158;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(36,40,68,0.2);
        }
        .btn-login:active { transform: translateY(0); }

        /* Loading */
        .btn-login.loading { pointer-events: none; opacity: 0.75; }
        .spinner {
            display: none;
            width: 16px; height: 16px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
        }
        .btn-login.loading .spinner { display: block; }
        .btn-login.loading .btn-text { display: none; }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* Notice */
        .login-notice {
            text-align: center;
            margin-top: 1.25rem;
            font-size: 0.71rem;
            color: var(--text-muted);
        }

        .login-notice a { color: var(--oak-dark); text-decoration: none; }
        .login-notice a:hover { text-decoration: underline; }

        /* Back link */
        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.375rem;
            font-size: 0.75rem;
            color: var(--text-muted);
            text-decoration: none;
            margin-top: 1.25rem;
            transition: color 0.2s;
        }
        .back-link:hover { color: var(--comet); }
    </style>
</head>
<body>

<div class="login-card">

    {{-- Header --}}
    <div class="login-header">
        <div class="welcome">Selamat Datang Kembali</div>
        <h1>Masuk ke<br>Admin Panel</h1>
        <p>Silakan masukkan kredensial Anda untuk mengakses panel manajemen.</p>
    </div>

    {{-- Error alert --}}
    @if ($errors->any() || session('error'))
    <div class="login-alert">
        <i class="fas fa-triangle-exclamation" style="margin-top:1px; flex-shrink:0;"></i>
        <span>
            @if(session('error'))
                {{ session('error') }}
            @else
                Email atau password tidak valid. Silakan coba lagi.
            @endif
        </span>
    </div>
    @endif

    {{-- Form --}}
    <form method="POST" action="{{ route('admin.login') }}" id="login-form">
        @csrf

        {{-- Email --}}
        <div class="form-group">
            <label class="form-label" for="email">Alamat Email</label>
            <div class="input-wrap">
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    value="{{ old('email') }}"
                    placeholder="admin@mvplaw.id"
                    required
                    autofocus
                    autocomplete="email">
                <i class="fas fa-envelope input-icon"></i>
            </div>
        </div>

        {{-- Password --}}
        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <div class="input-wrap">
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                    placeholder="••••••••"
                    required
                    autocomplete="current-password">
                <i class="fas fa-lock input-icon"></i>
                <button type="button" class="pwd-toggle" id="pwd-toggle" aria-label="Tampilkan/Sembunyikan">
                    <i class="fas fa-eye" id="pwd-icon"></i>
                </button>
            </div>
        </div>

        {{-- Remember --}}
        <div class="remember-row">
            <input type="checkbox" id="remember" name="remember"
                class="custom-checkbox" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember" class="checkbox-label">Ingat saya</label>
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn-login" id="login-btn">
            <div class="spinner"></div>
            <span class="btn-text">
                <i class="fas fa-right-to-bracket"></i>
                Masuk ke Panel
            </span>
        </button>
    </form>

    {{-- Notice --}}
    <p class="login-notice">
        <i class="fas fa-shield-halved" style="color:var(--oak); margin-right:3px;"></i>
        Akses terbatas —
        <a href="{{ url('/') }}">hanya untuk administrator yang berwenang.</a>
    </p>

    {{-- Back --}}
    <a href="{{ url('/') }}" class="back-link">
        <i class="fas fa-arrow-left" style="font-size:0.65rem;"></i>
        Kembali ke Website
    </a>

</div>

<script>
// Password toggle
var pwdInput  = document.getElementById('password');
var pwdToggle = document.getElementById('pwd-toggle');
var pwdIcon   = document.getElementById('pwd-icon');

pwdToggle.addEventListener('click', function () {
    var show = pwdInput.type === 'password';
    pwdInput.type       = show ? 'text' : 'password';
    pwdIcon.className   = show ? 'fas fa-eye-slash' : 'fas fa-eye';
});

// Icon color on focus
document.querySelectorAll('.form-input').forEach(function (el) {
    el.addEventListener('focus',  function () { this.previousElementSibling && (this.previousElementSibling.style.color = 'var(--oak-dark)'); });
    el.addEventListener('blur',   function () { this.previousElementSibling && (this.previousElementSibling.style.color = ''); });
});

// Loading spinner on submit
document.getElementById('login-form').addEventListener('submit', function () {
    document.getElementById('login-btn').classList.add('loading');
});
</script>
</body>
</html>
