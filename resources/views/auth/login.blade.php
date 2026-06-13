@extends('layouts.app')
@section('title','Masuk — Mari Berbagi')
@section('styles')
<style>
/* Import Font Inter agar Seragam dan Clean */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

:root {
    /* Palet Warna Tema Hijau Matcha Terintegrasi */
    --matcha-dark: #2d4a22;       /* Matcha pekat untuk header & tombol utama */
    --matcha-main: #557c43;       /* Matcha standar untuk link & aksen */
    --matcha-light: #e8eedf;      /* Matcha soft untuk latar/hover */
    --matcha-soft: #f4f7f0;       /* Matcha sangat lembut */
    --ink: #1c2816;               /* Teks utama gelap */
    --muted: #6b7c65;             /* Teks sekunder */
    --white: #ffffff;
    --border: #dee5d8;            /* Border abu-hijau tipis */
    --shadow: 0 4px 20px rgba(45, 74, 34, 0.06);
}

/* Pastikan Font Menggunakan Inter */
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
    max-width: 440px;
    overflow: hidden;
    border: 1px solid var(--border);
}

/* Header Card: Diubah ke Gradasi Matcha Premium */
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

/* Warna hati diubah jadi putih agar menyatu bersih */
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

/* Form Styles */
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

/* Tombol Masuk Diarahkan ke Matcha Dark */
.auth-body .btn-primary {
    background: var(--matcha-dark) !important;
    border-color: var(--matcha-dark) !important;
    color: var(--white) !important;
    font-weight: 600;
    padding: .7rem 1rem;
    border-radius: 10px;
    font-size: .9rem;
    transition: all 0.2s;
    cursor: pointer;
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

.divider {
    display: flex;
    align-items: center;
    gap: .8rem;
    margin: 1.5rem 0;
    color: var(--muted);
    font-size: .8rem;
}

.divider::before, .divider::after {
    content: '';
    flex: 1;
    height: 1px;
    background: var(--border);
}

/* Style Input Error khusus Laravel */
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
            <div class="auth-subtitle">Masuk untuk mulai berdonasi</div>
        </div>
        <div class="auth-body">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="email@kamu.com" value="{{ old('email') }}" required autofocus>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="••••••••" required>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem">
                    <label style="display:flex;align-items:center;gap:.5rem;font-size:.84rem;color:var(--muted);cursor:pointer">
                        <input type="checkbox" name="remember" style="accent-color: var(--matcha-main)"> Ingat saya
                    </label>
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center">Masuk →</button>
            </form>
            <div class="auth-footer">
                Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
            </div>
        </div>
    </div>
</div>
@endsection