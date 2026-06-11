<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login — Perpustakaan Digital</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html { color-scheme: light only; }

    :root {
      --blue-primary: #3B6EF8;
      --blue-hover:   #2B5CE6;
      --blue-glow:    rgba(59, 110, 248, 0.15);
      --bg-page:      #FFFFFF;
      --bg-card:      #FFFFFF;
      --text-heading: #1A1D2E;
      --text-label:   #5A607A;
      --text-muted:   #9399B2;
      --text-link:    #3B6EF8;
      --border:       #E8ECF4;
      --border-focus: #3B6EF8;
      --input-bg:     #F7F9FF;
      --shadow-card:  0 8px 40px rgba(30, 40, 100, 0.08), 0 2px 8px rgba(30, 40, 100, 0.04);
      --shadow-btn:   0 4px 18px rgba(59, 110, 248, 0.40);
    }

    body {
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      background: #FFFFFF !important;
      color: #1A1D2E !important;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
    }

    .card {
      background: #FFFFFF !important;
      border-radius: 20px;
      padding: 36px 32px 32px;
      width: 100%;
      max-width: 380px;
      box-shadow: var(--shadow-card);
      border: 1px solid #E8ECF4;
      position: relative;
      animation: slideUp 0.4s cubic-bezier(.22,1,.36,1) both;
    }

    .card::before {
      content: '';
      position: absolute;
      top: 0; left: 32px; right: 32px;
      height: 3px;
      background: linear-gradient(90deg, #3B6EF8 0%, #6B9BFF 100%);
      border-radius: 0 0 4px 4px;
    }

    @keyframes slideUp {
      from { opacity: 0; transform: translateY(22px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .card-header { text-align: center; margin-bottom: 28px; }

    .logo-mark {
      width: 46px; height: 46px;
      background: linear-gradient(135deg, #3B6EF8, #6B9BFF);
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
      box-shadow: 0 6px 20px rgba(59, 110, 248, 0.30);
    }

    .logo-mark svg {
      width: 26px; height: 26px;
      fill: none; stroke: #fff;
      stroke-width: 2.2;
      stroke-linecap: round; stroke-linejoin: round;
    }

    h1 {
      font-size: 22px; font-weight: 700;
      color: var(--text-heading);
      letter-spacing: -0.5px; margin-bottom: 4px;
    }

    .subtitle { font-size: 13px; color: var(--text-muted); }

    .form-group { margin-bottom: 14px; }

    label {
      display: block; font-size: 13px;
      font-weight: 600; color: var(--text-label);
      margin-bottom: 8px;
    }

    .input-wrapper { position: relative; }

    .input-icon {
      position: absolute; left: 14px; top: 50%;
      transform: translateY(-50%);
      color: var(--text-muted);
      display: flex; align-items: center;
      pointer-events: none; transition: color 0.2s;
    }

    .input-icon svg {
      width: 17px; height: 17px;
      stroke: currentColor; fill: none;
      stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;
    }

    input[type="email"],
    input[type="password"],
    input[type="text"] {
      width: 100%;
      padding: 12px 14px 12px 42px;
      font-size: 14.5px;
      font-family: 'Inter', sans-serif;
      color: #1A1D2E !important;
      background: #F7F9FF !important;
      border: 1.5px solid var(--border);
      border-radius: 12px;
      outline: none;
      transition: border-color 0.2s, background 0.2s, box-shadow 0.2s;
    }

    input::placeholder { color: var(--text-muted); }

    input:focus {
      border-color: var(--border-focus);
      background: #FFFFFF !important;
      box-shadow: 0 0 0 4px var(--blue-glow);
    }

    .input-wrapper:focus-within .input-icon { color: var(--blue-primary); }

    .eye-toggle {
      position: absolute; right: 14px; top: 50%;
      transform: translateY(-50%);
      background: none; border: none; cursor: pointer;
      padding: 4px; color: var(--text-muted);
      display: flex; align-items: center; transition: color 0.2s;
    }
    .eye-toggle:hover { color: var(--blue-primary); }
    .eye-toggle svg {
      width: 17px; height: 17px;
      stroke: currentColor; fill: none;
      stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;
    }

    .row-options {
      display: flex; align-items: center;
      justify-content: space-between;
      margin-bottom: 20px; margin-top: 4px;
    }

    .checkbox-label {
      display: flex; align-items: center; gap: 8px;
      cursor: pointer; font-size: 13.5px;
      color: var(--text-label); user-select: none;
    }

    .checkbox-label input[type="checkbox"] {
      appearance: none; -webkit-appearance: none;
      width: 18px; height: 18px;
      border: 1.5px solid var(--border);
      border-radius: 5px; background: var(--input-bg);
      cursor: pointer; display: grid; place-items: center;
      padding: 0; margin: 0; flex-shrink: 0;
      transition: border-color 0.2s, background 0.2s;
    }

    .checkbox-label input[type="checkbox"]:checked {
      background: var(--blue-primary);
      border-color: var(--blue-primary);
    }

    .checkbox-label input[type="checkbox"]:checked::after {
      content: '';
      display: block; width: 5px; height: 9px;
      border: 2px solid #fff;
      border-top: none; border-left: none;
      transform: rotate(45deg) translateY(-1px);
    }

    .forgot-link {
      font-size: 13px; font-weight: 500;
      color: var(--blue-primary); text-decoration: none;
    }
    .forgot-link:hover { text-decoration: underline; }

    /* Alert error dari Laravel */
    .alert-error {
      background: #FEE8E8;
      color: #C0392B;
      border: 1px solid #F5C6C6;
      border-radius: 10px;
      padding: 10px 14px;
      font-size: 13.5px;
      margin-bottom: 16px;
      text-align: center;
    }

    .btn-login {
      width: 100%; padding: 13.5px;
      background: linear-gradient(135deg, #3B6EF8 0%, #5585FF 100%);
      color: #fff; font-size: 15px; font-weight: 600;
      font-family: 'Inter', sans-serif;
      border: none; border-radius: 12px; cursor: pointer;
      box-shadow: var(--shadow-btn);
      transition: transform 0.15s, box-shadow 0.15s, filter 0.15s;
    }

    .btn-login:hover {
      filter: brightness(1.07);
      box-shadow: 0 6px 24px rgba(59, 110, 248, 0.50);
      transform: translateY(-1px);
    }

    .btn-login:active { transform: translateY(0); }

    .divider {
      display: flex; align-items: center;
      gap: 12px; margin: 24px 0;
    }
    .divider span { font-size: 12px; color: var(--text-muted); white-space: nowrap; }
    .divider::before, .divider::after {
      content: ''; flex: 1; height: 1px; background: var(--border);
    }

    .register-row { text-align: center; font-size: 14px; color: var(--text-muted); }
    .register-row a { color: var(--blue-primary); font-weight: 600; text-decoration: none; }
    .register-row a:hover { text-decoration: underline; }
  </style>
</head>
<body>

  <div class="card" onkeydown="if(event.key==='Enter') document.getElementById('loginForm').submit()">
    <div class="card-header">
      <div class="logo-mark">
        <svg viewBox="0 0 24 24">
          <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
          <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
        </svg>
      </div>
      <h1>Selamat Datang</h1>
      <p class="subtitle">Masuk ke akun Anda untuk melanjutkan</p>
    </div>

    {{-- Tampilkan error validasi dari Laravel --}}
    @if ($errors->any())
      <div class="alert-error">
        {{ $errors->first() }}
      </div>
    @endif

    {{-- Tampilkan pesan session error  --}}
    @if (session('error'))
      <div class="alert-error">
        {{ session('error') }}
      </div>
    @endif

    <form id="loginForm" method="POST" action="{{ route('login') }}">
      @csrf

      <div class="form-group">
        <label for="email">Email</label>
        <div class="input-wrapper">
          <span class="input-icon">
            <svg viewBox="0 0 24 24">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
              <polyline points="22,6 12,13 2,6"/>
            </svg>
          </span>
          <input type="email" id="email" name="email"
            placeholder="Masukkan email"
            value="{{ old('email') }}"
            autocomplete="email" required/>
        </div>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <div class="input-wrapper">
          <span class="input-icon">
            <svg viewBox="0 0 24 24">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
          </span>
          <input type="password" id="password" name="password"
            placeholder="Masukkan password"
            autocomplete="current-password" required/>
          <button class="eye-toggle" onclick="togglePassword()" type="button" aria-label="Tampilkan password">
            <svg viewBox="0 0 24 24" id="eyeIcon">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
              <circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
        </div>
      </div>

      <div class="row-options">
        <label class="checkbox-label">
          <input type="checkbox" name="remember" id="rememberMe" {{ old('remember') ? 'checked' : '' }}/>
          Ingat saya
        </label>
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="forgot-link">Lupa password?</a>
        @endif
      </div>

      <button type="submit" class="btn-login">Login</button>
    </form>

  </div>

  <script>
    function togglePassword() {
      const input = document.getElementById('password');
      const icon  = document.getElementById('eyeIcon');
      const isHidden = input.type === 'password';
      input.type = isHidden ? 'text' : 'password';
      icon.innerHTML = isHidden
        ? `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
           <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
           <line x1="1" y1="1" x2="23" y2="23"/>`
        : `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
           <circle cx="12" cy="12" r="3"/>`;
    }
  </script>

</body>
</html>