@extends('layouts.app')
@section('title','Mari Berbagi — Bersama Kita Bisa')
@section('styles')
<style>
/* Import Font yang Sederhana, Bersih, dan Mudah Dibaca */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

:root {
    /* Palet Warna Hijau Matcha */
    --matcha-dark: #2d4a22;       /* Matcha pekat untuk teks utama & tombol */
    --matcha-main: #557c43;       /* Matcha standar untuk aksen & strip */
    --matcha-light: #e8eedf;      /* Matcha muda lembut untuk badge & hover */
    --matcha-soft: #f4f7f0;       /* Latar belakang halaman yang teduh */
    --ink: #1c2816;               /* Warna teks gelap */
    --muted: #6b7c65;             /* Warna teks sekunder */
    --white: #ffffff;
    --border: #dee5d8;
}

/* Terapkan font sederhana ke seluruh elemen */
body, button, input, select, textarea {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
}

.hero {
    min-height: calc(100vh - 72px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 4rem 5%;
    position: relative;
    overflow: hidden;
    text-align: center;
    background-color: var(--white);
}

.hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 80% 60% at 50% 40%, rgba(85, 124, 67, 0.06) 0%, transparent 70%);
    pointer-events: none;
}

.hero-inner {
    max-width: 700px;
    margin: 0 auto;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: .5rem;
    background: var(--matcha-light);
    color: var(--matcha-dark);
    padding: .5rem 1.2rem;
    border-radius: 50px;
    font-size: .8rem;
    font-weight: 700;
    letter-spacing: .02em;
    margin-bottom: 1.5rem;
    animation: fadeUp .5s ease both;
}

.hero-title {
    font-size: clamp(2.5rem, 5.5vw, 4rem);
    font-weight: 800;
    line-height: 1.15;
    letter-spacing: -.02em;
    color: var(--ink);
    margin-bottom: 1.5rem;
    animation: fadeUp .6s .1s ease both;
}

.hero-title .accent {
    color: var(--matcha-main);
    font-style: normal;
}

.hero-title .warm {
    color: var(--matcha-dark);
    text-decoration: underline;
    text-decoration-color: var(--matcha-light);
    text-underline-offset: 4px;
}

.hero-desc {
    color: var(--muted);
    font-size: 1.05rem;
    line-height: 1.7;
    max-width: 540px;
    margin: 0 auto 2.5rem;
    animation: fadeUp .6s .2s ease both;
}

.hero-btns {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    animation: fadeUp .6s .3s ease both;
}

/* Menyelaraskan komponen tombol bootstrap/custom agar senada */
.hero-btns .btn-primary {
    background: var(--matcha-dark) !important;
    border-color: var(--matcha-dark) !important;
    color: var(--white) !important;
    padding: .8rem 2rem;
    border-radius: 12px;
    font-weight: 600;
    transition: all .2s;
}

.hero-btns .btn-primary:hover {
    background: var(--matcha-main) !important;
    border-color: var(--matcha-main) !important;
    transform: translateY(-2px);
}

.hero-btns .btn-outline {
    background: transparent !important;
    border: 2px solid var(--matcha-dark) !important;
    color: var(--matcha-dark) !important;
    padding: .8rem 2rem;
    border-radius: 12px;
    font-weight: 600;
    transition: all .2s;
}

.hero-btns .btn-outline:hover {
    background: var(--matcha-light) !important;
    transform: translateY(-2px);
}

.hero-stats {
    display: flex;
    gap: 2.5rem;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 4rem;
    padding-top: 3rem;
    border-top: 1px solid var(--border);
    animation: fadeUp .6s .4s ease both;
}

.stat-i {
    text-align: center;
}

.stat-n {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--matcha-dark);
    line-height: 1;
    display: block;
}

.stat-l {
    font-size: .78rem;
    color: var(--muted);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: .05em;
    margin-top: .5rem;
}

.strip {
    background: var(--matcha-main);
    padding: 2.5rem 5%;
    display: flex;
    justify-content: center;
    gap: 4rem;
    flex-wrap: wrap;
}

.strip-i {
    text-align: center;
    color: var(--white);
}

.strip-n {
    font-size: 2rem;
    font-weight: 800;
    display: block;
}

.strip-l {
    font-size: .78rem;
    opacity: .9;
    text-transform: uppercase;
    letter-spacing: .06em;
}

.quick-nav {
    padding: 5rem 5%;
    background: var(--matcha-soft);
}

.qnav-title {
    text-align: center;
    font-size: 2rem;
    font-weight: 800;
    color: var(--ink);
    margin-bottom: .5rem;
}

.qnav-sub {
    text-align: center;
    color: var(--muted);
    font-size: .95rem;
    margin-bottom: 3rem;
}

.qnav-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
    max-width: 1000px;
    margin: 0 auto;
}

.qnav-card {
    background: var(--white);
    border-radius: 16px;
    padding: 2.5rem 1.5rem;
    text-align: center;
    text-decoration: none;
    color: var(--ink);
    transition: all .3s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid var(--border);
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
}

.qnav-card:hover {
    background: var(--white);
    border-color: var(--matcha-main);
    transform: translateY(-6px);
    box-shadow: 0 12px 20px -8px rgba(85, 124, 67, 0.25);
}

.qnav-icon {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    display: block;
    transition: transform 0.3s;
}

.qnav-card:hover .qnav-icon {
    transform: scale(1.1);
}

.qnav-name {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--matcha-dark);
    margin-bottom: .5rem;
}

.qnav-desc {
    font-size: .85rem;
    color: var(--muted);
    line-height: 1.6;
}
</style>
@endsection

@section('content')

{{-- HERO --}}
<section class="hero">
    <div class="hero-inner fade-in">
        <div class="hero-badge">✦ Platform Donasi Bencana Terpercaya</div>
        <h1 class="hero-title">
            Satu Aksi,<br>
            <span class="accent">Ribuan</span> <span class="warm">Harapan</span>
        </h1>
        <p class="hero-desc">
            Mari Berbagi menghubungkan donatur dengan korban bencana secara langsung, transparan, dan terpercaya di seluruh Indonesia.
        </p>
        <div class="hero-btns">
            <a href="{{ route('donasi.create') }}" class="btn btn-primary">♥ Donasi Sekarang</a>
            <a href="{{ route('program.index') }}" class="btn btn-outline">Lihat Program</a>
        </div>
        <div class="hero-stats">
            <div class="stat-i"><span class="stat-n">12K+</span><span class="stat-l">Donatur Aktif</span></div>
            <div class="stat-i"><span class="stat-n">Rp 4,8M</span><span class="stat-l">Terkumpul</span></div>
            <div class="stat-i"><span class="stat-n">340+</span><span class="stat-l">Program Aktif</span></div>
            <div class="stat-i"><span class="stat-n">98%</span><span class="stat-l">Tepat Sasaran</span></div>
        </div>
    </div>
</section>

{{-- STATS STRIP --}}
<div class="strip">
    <div class="strip-i"><span class="strip-n">Rp 4,8M+</span><span class="strip-l">Dana Tersalurkan</span></div>
    <div class="strip-i"><span class="strip-n">12.400+</span><span class="strip-l">Donatur Bergabung</span></div>
    <div class="strip-i"><span class="strip-n">340+</span><span class="strip-l">Program Berhasil</span></div>
    <div class="strip-i"><span class="strip-n">98%</span><span class="strip-l">Tingkat Kepuasan</span></div>
</div>

{{-- QUICK NAV --}}
<section class="quick-nav">
    <h2 class="qnav-title">Mau Ngapain Hari Ini?</h2>
    <p class="qnav-sub">Pilih fitur yang kamu butuhkan</p>
    <div class="qnav-grid">
        <a href="{{ route('program.index') }}" class="qnav-card">
            <span class="qnav-icon">📋</span>
            <div class="qnav-name">Lihat Program</div>
            <div class="qnav-desc">Katalog program bencana yang butuh bantuan</div>
        </a>
        <a href="{{ route('donasi.create') }}" class="qnav-card">
            <span class="qnav-icon">💳</span>
            <div class="qnav-name">Donasi Dana</div>
            <div class="qnav-desc">Kirim bantuan uang via transfer atau e-wallet</div>
        </a>
        <a href="{{ route('barang.create') }}" class="qnav-card">
            <span class="qnav-icon">📦</span>
            <div class="qnav-name">Kirim Barang</div>
            <div class="qnav-desc">Input data barang logistik untuk dikirim</div>
        </a>
        <a href="{{ route('transparansi') }}" class="qnav-card">
            <span class="qnav-icon">📊</span>
            <div class="qnav-name">Transparansi</div>
            <div class="qnav-desc">Lihat riwayat donasi secara publik</div>
        </a>
        <a href="{{ route('feedback.index') }}" class="qnav-card">
            <span class="qnav-icon">⭐</span>
            <div class="qnav-name">Ulasan</div>
            <div class="qnav-desc">Baca & tulis ulasan dari donatur lain</div>
        </a>
    </div>
</section>

@endsection

