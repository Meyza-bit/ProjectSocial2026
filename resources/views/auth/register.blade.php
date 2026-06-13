@extends('layouts.app')
@section('title','Daftar — Mari Berbagi')
@section('styles')
<style>
/* Jalankan integrasi Font Inter */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

:root {
    /* Palet Warna Matcha Konsisten */
    --matcha-dark: #2d4a22;       /* Matcha pekat untuk header & tombol */
    --matcha-main: #557c43;       /* Matcha alami untuk aksen/hover */
    --matcha-light: #e8eedf;      /* Matcha soft */
    --matcha-soft: #f4f7f0;       
    --ink: #1c2816;               /* Teks utama gelap */
    --muted: #6b7c65;             /* Teks sekunder */
    --white: #ffffff;
    --border: #dee5d8;            /* Border abu-hijau khas layout utama */
    --shadow: 0 4px 20px rgba(45, 74, 34, 0.06);
}

/* Terapkan Font Inter secara global di halaman ini */
.auth-wrap, .auth-card, .auth-logo, .form-label, .form-control, .btn {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif !important;
}

.auth-wrap {
    min-height: calc(100vh - 70px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 3rem 5%;
    background: var(--white);
}

.auth-card {
    background: var(--white);
    border-radius: 24px;
    box-shadow: var(--shadow);
    width: 100%;
    max-width: 480px; /* Sedikit lebih lebar untuk menampung row-2 */
    overflow: hidden;
    border: 1px solid var(--border);
}

/* Header Card: Gradasi Matcha Premium */
.auth-top {
    background: linear-gradient(135deg, var(--matcha-dark), var(--matcha-main));
    padding: 2.5rem 2.5rem 2rem;
    text-align: center;
}

.auth-logo {
    font-weight: 800;
    font-size: 1.6rem;
    color: var(--white);
    margin-bottom: .3rem;
    letter-spacing: -0.02em;
}

.auth-logo span {
    color: var(--white);
}

.auth-subtitle {
    color: rgba(255, 255, 255, 0.85);
    font-size: .88rem;
}

.auth-body {
    padding: 2.5rem;
}

/* Form Group & Input Styling */
.form-group {
    margin-bottom: 1.25rem;
}

.form-label {
    display: block;
    font-size: .85rem;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: .4rem;
}

.form-control {
    width: 100%;
    padding: .65rem 1rem;
    border: 2px solid var(--border);
    border-radius: 10px;
    font-size: .9rem;
    outline: none;
    transition: all .2s;
    color: var(--ink);
}

.form-control:focus {
    border-color: var(--matcha-main);
    box-shadow: 0 0 0 3px rgba(85, 124, 67, 0.15);
}

/* Row Khusus Password Berdampingan */
.row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

/* Tombol Submit Utama */
.auth-body .btn-primary {
    background: var(--matcha-dark) !important;
    border-color: var(--matcha-dark) !important;
    color: var(--white) !important;
    font-weight: 600;
    padding: .75rem 1rem;
    border-radius: 10px;
    font-size: .9rem;
    transition: all 0.2s;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
}

.auth-body .btn-primary:hover {
    background: var(--matcha-main) !important;
    border-color: var(--matcha-main) !important;
}

.auth-footer {
    text-align: center;
    margin-top: 1.5rem;
    font-size: .85rem;
    color: var(--muted);
}

.auth-footer a {
    color: var(--matcha-main);
    font-weight: 700;
    text-decoration: none;
    transition: color .2s;
}

.auth-footer a:hover {
    color: var(--matcha-dark);
    text-decoration: underline;
}

/* Integrasi Error State Laravel */
.is-invalid {
    border-color: #d32f2f !important;
}
.invalid-feedback {
    color: #d32f2f;
    font-size: .78rem;
    margin-top: .25rem;
}
</style>
@endsection

@section('content')
<div class="auth-wrap fade-in">
    <div class="auth-card">
        <div class="auth-top">
            <div class="auth-logo"><span>🍵</span> Mari Berbagi</div>
            <div class="auth-subtitle">Bergabung dan mulai berbagi kebaikan</div>
        </div>
        <div class="auth-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Nama kamu" value="{{ old('name') }}" required autofocus>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="email@kamu.com" value="{{ old('email') }}" required>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">No. HP</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                        placeholder="08xxxxxxxxxx" value="{{ old('phone') }}">
                    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="row-2">
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Min. 8 karakter" required>
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;margin-top:.5rem">Daftar Sekarang →</button>
            </form>
            <div class="auth-footer">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </div>
        </div>
    </div>
</div>
@endsection