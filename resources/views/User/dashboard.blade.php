@extends('layout.app')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:8px;">
        <div>
            <h1 style="font-size:22px;font-weight:700;color:#111827;margin:0 0 4px;">
                Dashboard
            </h1>

            <p style="font-size:14px;color:#9CA3AF;margin:0;">
                Hi, {{ auth()->user()?->name ?? 'Pengguna' }}
                — selamat datang di website Sistem Perpustakaan Digital
            </p>
        </div>

        <div style="font-size:13px;color:#9CA3AF;padding-top:4px;">
            {{ now()->translatedFormat('d F Y') }}
        </div>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        {{-- Total Buku --}}
        <div style="background:white;border-radius:12px;padding:22px 24px;border:1px solid #E5E7EB;">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
                <span style="font-size:13px;color:#6B7280;font-weight:500;">Total Buku</span>

                <div style="width:34px;height:34px;border-radius:8px;background:#EFF6FF;display:flex;align-items:center;justify-content:center;">
                    <svg width="17" height="17" fill="none" stroke="#2563EB" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                    </svg>
                </div>
            </div>

            <p style="font-size:28px;font-weight:700;color:#111827;margin:0 0 4px;">
                {{ $totalBuku ?? 0 }}
            </p>

            <p style="font-size:12px;color:#9CA3AF;margin:0;">
                Koleksi tersedia
            </p>
        </div>

        {{-- Sedang Dipinjam --}}
        <div style="background:white;border-radius:12px;padding:22px 24px;border:1px solid #E5E7EB;">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
                <span style="font-size:13px;color:#6B7280;font-weight:500;">
                    Sedang Dipinjam
                </span>

                <div style="width:34px;height:34px;border-radius:8px;background:#FFFBEB;display:flex;align-items:center;justify-content:center;">
                    <svg width="17" height="17" fill="none" stroke="#D97706" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                </div>
            </div>

            <p style="font-size:28px;font-weight:700;color:#111827;margin:0 0 4px;">
                {{ $dipinjam ?? 0 }}
            </p>

            <p style="font-size:12px;color:#9CA3AF;margin:0;">
                Buku aktif dipinjam
            </p>
        </div>

        {{-- Riwayat --}}
        <div style="background:white;border-radius:12px;padding:22px 24px;border:1px solid #E5E7EB;">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
                <span style="font-size:13px;color:#6B7280;font-weight:500;">
                    Riwayat Peminjaman
                </span>

                <div style="width:34px;height:34px;border-radius:8px;background:#F0FDF4;display:flex;align-items:center;justify-content:center;">
                    <svg width="17" height="17" fill="none" stroke="#16A34A" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <polyline points="9 11 12 14 22 4"/>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
                    </svg>
                </div>
            </div>

            <p style="font-size:28px;font-weight:700;color:#111827;margin:0 0 4px;">
                {{ $riwayat ?? 0 }}
            </p>

            <p style="font-size:12px;color:#9CA3AF;margin:0;">
                Total transaksi
            </p>
        </div>

    </div>

  {{-- Akses Cepat --}}
  <div style="background:white;border-radius:12px;border:1px solid #E5E7EB;overflow:hidden;">
    <div style="padding:16px 24px;border-bottom:1px solid #F3F4F6;">
      <h2 style="font-size:14.5px;font-weight:600;color:#111827;margin:0;">Akses Cepat</h2>
    </div>
    <div style="padding:16px 24px;display:flex;flex-direction:column;gap:2px;">

      <a href="/buku" style="
        display:flex;align-items:center;gap:14px;
        padding:14px 16px;border-radius:10px;
        text-decoration:none;color:inherit;
        transition:background 0.15s;
      "
      onmouseover="this.style.background='#F9FAFB'"
      onmouseout="this.style.background='transparent'">
        <div style="width:38px;height:38px;border-radius:9px;background:#EFF6FF;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <svg width="18" height="18" fill="none" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
          </svg>
        </div>
        <div style="flex:1;">
          <p style="font-size:14px;font-weight:500;color:#111827;margin:0 0 2px;">Daftar Buku</p>
          <p style="font-size:12.5px;color:#9CA3AF;margin:0;">Cari dan lihat buku yang tersedia</p>
        </div>
        <svg width="15" height="15" fill="none" stroke="#D1D5DB" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
          <polyline points="9 18 15 12 9 6"/>
        </svg>
      </a>

      <div style="height:1px;background:#F3F4F6;margin:0 16px;"></div>

      <a href="{{ route('user.riwayat') }}" style="
        display:flex;align-items:center;gap:14px;
        padding:14px 16px;border-radius:10px;
        text-decoration:none;color:inherit;
        transition:background 0.15s;
      "
      onmouseover="this.style.background='#F9FAFB'"
      onmouseout="this.style.background='transparent'">
        <div style="width:38px;height:38px;border-radius:9px;background:#F0FDF4;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <svg width="18" height="18" fill="none" stroke="#16A34A" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>
          </svg>
        </div>
        <div style="flex:1;">
          <p style="font-size:14px;font-weight:500;color:#111827;margin:0 0 2px;">Riwayat Peminjaman</p>
          <p style="font-size:12.5px;color:#9CA3AF;margin:0;">Lihat semua riwayat peminjaman kamu</p>
        </div>
        <svg width="15" height="15" fill="none" stroke="#D1D5DB" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
          <polyline points="9 18 15 12 9 6"/>
        </svg>
      </a>

    </div>
  </div>

  {{-- Informasi Perpustakaan --}}
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    <div style="background:white;border-radius:12px;border:1px solid #E5E7EB;overflow:hidden;">
      <div style="padding:16px 24px;border-bottom:1px solid #F3F4F6;">
        <h2 style="font-size:14.5px;font-weight:600;color:#111827;margin:0;">Aturan Peminjaman</h2>
      </div>
      <div style="padding:20px 24px;display:flex;flex-direction:column;gap:12px;">
        <div style="display:flex;align-items:flex-start;gap:10px;">
          <div style="width:20px;height:20px;border-radius:50%;background:#EFF6FF;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px;">
            <svg width="10" height="10" fill="none" stroke="#2563EB" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
          <p style="font-size:13.5px;color:#374151;margin:0;">Maksimal <strong>3 buku</strong> dipinjam sekaligus</p>
        </div>
        <div style="display:flex;align-items:flex-start;gap:10px;">
          <div style="width:20px;height:20px;border-radius:50%;background:#EFF6FF;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px;">
            <svg width="10" height="10" fill="none" stroke="#2563EB" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
          <p style="font-size:13.5px;color:#374151;margin:0;">Masa pinjam <strong>7 hari</strong></p>
        </div>
        <div style="display:flex;align-items:flex-start;gap:10px;">
          <div style="width:20px;height:20px;border-radius:50%;background:#EFF6FF;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px;">
            <svg width="10" height="10" fill="none" stroke="#2563EB" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
          <p style="font-size:13.5px;color:#374151;margin:0;">Dapat diperpanjang sebelum jatuh tempo</p>
        </div>
        <div style="display:flex;align-items:flex-start;gap:10px;">
          <div style="width:20px;height:20px;border-radius:50%;background:#FEF3C7;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px;">
            <svg width="10" height="10" fill="none" stroke="#D97706" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
          </div>
          <p style="font-size:13.5px;color:#374151;margin:0;">Keterlambatan dikenakan <strong>denda</strong></p>
        </div>
      </div>
    </div>

    <div style="background:white;border-radius:12px;border:1px solid #E5E7EB;overflow:hidden;">
      <div style="padding:16px 24px;border-bottom:1px solid #F3F4F6;">
        <h2 style="font-size:14.5px;font-weight:600;color:#111827;margin:0;">Jam Operasional</h2>
      </div>
      <div style="padding:20px 24px;display:flex;flex-direction:column;gap:12px;">
        <div style="display:flex;justify-content:space-between;align-items:center;padding:10px 14px;background:#F9FAFB;border-radius:8px;">
          <span style="font-size:13.5px;color:#374151;">Senin – Jumat</span>
          <span style="font-size:13px;font-weight:600;color:#16A34A;">08.00 – 17.00</span>
        </div>
        <div style="display:flex;justify-content:space-between;align-items:center;padding:10px 14px;background:#F9FAFB;border-radius:8px;">
          <span style="font-size:13.5px;color:#374151;">Sabtu</span>
          <span style="font-size:13px;font-weight:600;color:#D97706;">08.00 – 12.00</span>
        </div>
        <div style="display:flex;justify-content:space-between;align-items:center;padding:10px 14px;background:#F9FAFB;border-radius:8px;">
          <span style="font-size:13.5px;color:#374151;">Minggu</span>
          <span style="font-size:13px;font-weight:600;color:#DC2626;">Tutup</span>
        </div>
      </div>
    </div>

  </div>


</div>

@endsection