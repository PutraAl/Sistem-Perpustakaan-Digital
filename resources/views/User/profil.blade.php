@extends('layout.app')

@section('content')

<div class="max-w-2xl mx-auto px-4 py-6 space-y-5">

  {{-- Header --}}
  <div>
    <h1 style="font-size:22px;font-weight:700;color:#111827;margin:0 0 4px;">Edit Profil</h1>
    <p style="font-size:14px;color:#9CA3AF;margin:0;">Perbarui informasi akun dan password kamu</p>
  </div>

  {{-- Success Alert --}}
  @if(session('success'))
    <div style="
      display:flex;align-items:center;gap:10px;
      background:#F0FDF4;border:1px solid #BBF7D0;
      border-radius:10px;padding:12px 16px;
    ">
      <div style="width:20px;height:20px;border-radius:50%;background:#16A34A;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
        <svg width="11" height="11" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <p style="font-size:13.5px;color:#15803D;margin:0;">{{ session('success') }}</p>
    </div>
  @endif

  {{-- Form Card --}}
  <div style="background:white;border-radius:14px;border:1px solid #E5E7EB;overflow:hidden;">

    {{-- Section: Informasi Akun --}}
    <div style="padding:16px 24px;border-bottom:1px solid #F3F4F6;">
      <h2 style="font-size:13.5px;font-weight:600;color:#111827;margin:0;">Informasi Akun</h2>
    </div>

    <form action="" method="POST">
      @csrf
      @method('PUT')

      <div style="padding:24px;display:flex;flex-direction:column;gap:18px;">

        {{-- Nama Lengkap --}}
        <div>
          <label style="display:block;font-size:13px;font-weight:500;color:#374151;margin-bottom:6px;">
            Nama Lengkap
          </label>
          <input type="text" name="name" value="{{ auth()->user()->name ?? 'Peter' }}"
            style="
              width:100%;padding:10px 14px;
              border:1px solid #E5E7EB;border-radius:9px;
              font-size:14px;color:#111827;background:#FAFAFA;
              outline:none;box-sizing:border-box;
              transition:border-color 0.15s,box-shadow 0.15s;
            "
            onfocus="this.style.borderColor='#2563EB';this.style.boxShadow='0 0 0 3px rgba(37,99,235,0.10)';this.style.background='white'"
            onblur="this.style.borderColor='#E5E7EB';this.style.boxShadow='none';this.style.background='#FAFAFA'"/>
          @error('name')
            <p style="font-size:12px;color:#DC2626;margin:5px 0 0;">{{ $message }}</p>
          @enderror
        </div>

        {{-- NIM --}}
        <div>
          <label style="display:block;font-size:13px;font-weight:500;color:#374151;margin-bottom:6px;">
            NIM
          </label>
          <input type="number" name="nim" value="{{ auth()->user()->nim ?? '3312511127' }}"
            style="
              width:100%;padding:10px 14px;
              border:1px solid #E5E7EB;border-radius:9px;
              font-size:14px;color:#111827;background:#FAFAFA;
              outline:none;box-sizing:border-box;
              transition:border-color 0.15s,box-shadow 0.15s;
            "
            onfocus="this.style.borderColor='#2563EB';this.style.boxShadow='0 0 0 3px rgba(37,99,235,0.10)';this.style.background='white'"
            onblur="this.style.borderColor='#E5E7EB';this.style.boxShadow='none';this.style.background='#FAFAFA'"/>
          @error('nim')
            <p style="font-size:12px;color:#DC2626;margin:5px 0 0;">{{ $message }}</p>
          @enderror
        </div>

        {{-- Email --}}
        <div>
          <label style="display:block;font-size:13px;font-weight:500;color:#374151;margin-bottom:6px;">
            Email
          </label>
          <input type="email" name="email" value="{{ auth()->user()->email ?? 'palamsyah120@gmail.com' }}"
            style="
              width:100%;padding:10px 14px;
              border:1px solid #E5E7EB;border-radius:9px;
              font-size:14px;color:#111827;background:#FAFAFA;
              outline:none;box-sizing:border-box;
              transition:border-color 0.15s,box-shadow 0.15s;
            "
            onfocus="this.style.borderColor='#2563EB';this.style.boxShadow='0 0 0 3px rgba(37,99,235,0.10)';this.style.background='white'"
            onblur="this.style.borderColor='#E5E7EB';this.style.boxShadow='none';this.style.background='#FAFAFA'"/>
          @error('email')
            <p style="font-size:12px;color:#DC2626;margin:5px 0 0;">{{ $message }}</p>
          @enderror
        </div>

      </div>

      {{-- Section: Ganti Password --}}
      <div style="padding:16px 24px;border-top:1px solid #F3F4F6;border-bottom:1px solid #F3F4F6;">
        <h2 style="font-size:13.5px;font-weight:600;color:#111827;margin:0 0 2px;">Ganti Password</h2>
        <p style="font-size:12.5px;color:#9CA3AF;margin:0;">Kosongkan jika tidak ingin mengubah password</p>
      </div>

      <div style="padding:24px;display:flex;flex-direction:column;gap:18px;">

        {{-- Password Baru --}}
        <div>
          <label style="display:block;font-size:13px;font-weight:500;color:#374151;margin-bottom:6px;">
            Password Baru
          </label>
          <div style="position:relative;">
            <input type="password" name="password" id="pw_new"
              placeholder="Masukkan password baru"
              style="
                width:100%;padding:10px 42px 10px 14px;
                border:1px solid #E5E7EB;border-radius:9px;
                font-size:14px;color:#111827;background:#FAFAFA;
                outline:none;box-sizing:border-box;
                transition:border-color 0.15s,box-shadow 0.15s;
              "
              onfocus="this.style.borderColor='#2563EB';this.style.boxShadow='0 0 0 3px rgba(37,99,235,0.10)';this.style.background='white'"
              onblur="this.style.borderColor='#E5E7EB';this.style.boxShadow='none';this.style.background='#FAFAFA'"/>
            <button type="button" onclick="togglePw('pw_new','eye1')"
              style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;padding:4px;color:#9CA3AF;">
              <svg id="eye1" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
              </svg>
            </button>
          </div>
          @error('password')
            <p style="font-size:12px;color:#DC2626;margin:5px 0 0;">{{ $message }}</p>
          @enderror
        </div>

        {{-- Konfirmasi Password --}}
        <div>
          <label style="display:block;font-size:13px;font-weight:500;color:#374151;margin-bottom:6px;">
            Konfirmasi Password
          </label>
          <div style="position:relative;">
            <input type="password" name="password_confirmation" id="pw_confirm"
              placeholder="Ulangi password baru"
              style="
                width:100%;padding:10px 42px 10px 14px;
                border:1px solid #E5E7EB;border-radius:9px;
                font-size:14px;color:#111827;background:#FAFAFA;
                outline:none;box-sizing:border-box;
                transition:border-color 0.15s,box-shadow 0.15s;
              "
              onfocus="this.style.borderColor='#2563EB';this.style.boxShadow='0 0 0 3px rgba(37,99,235,0.10)';this.style.background='white'"
              onblur="this.style.borderColor='#E5E7EB';this.style.boxShadow='none';this.style.background='#FAFAFA'"/>
            <button type="button" onclick="togglePw('pw_confirm','eye2')"
              style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;padding:4px;color:#9CA3AF;">
              <svg id="eye2" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
              </svg>
            </button>
          </div>
        </div>

      </div>

      {{-- Footer Tombol --}}
      <div style="
        padding:16px 24px;border-top:1px solid #F3F4F6;
        display:flex;justify-content:flex-end;gap:10px;
      ">
        <a href="{{ url()->previous() }}" style="
          display:inline-flex;align-items:center;
          padding:9px 18px;border-radius:9px;
          border:1px solid #E5E7EB;background:white;
          font-size:13.5px;font-weight:500;color:#374151;
          text-decoration:none;transition:background 0.15s;
        "
        onmouseover="this.style.background='#F9FAFB'"
        onmouseout="this.style.background='white'">
          Batal
        </a>
        <button type="submit" style="
          display:inline-flex;align-items:center;gap:7px;
          padding:9px 20px;border-radius:9px;
          background:#2563EB;border:none;
          font-size:13.5px;font-weight:600;color:white;
          cursor:pointer;transition:background 0.15s;
        "
        onmouseover="this.style.background='#1D4ED8'"
        onmouseout="this.style.background='#2563EB'">
          <svg width="14" height="14" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
            <polyline points="20 6 9 17 4 12"/>
          </svg>
          Simpan Perubahan
        </button>
      </div>

    </form>
  </div>

</div>

<script>
  function togglePw(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon  = document.getElementById(iconId);
    const isHidden = input.type === 'password';
    input.type = isHidden ? 'text' : 'password';
    icon.innerHTML = isHidden
      ? `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
         <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
         <line x1="1" y1="1" x2="23" y2="23"/>`
      : `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
  }
</script>

@endsection

