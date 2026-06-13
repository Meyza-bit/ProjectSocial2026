@extends('layouts.app')
@section('title','Mari Berbagi — Bersama Kita Bisa')
@section('styles')
<style>
    /* Earthy & Minimalist Color Palette Variables */
    :root {
        --primary-brown: #5C4033;      /* Deep Warm Brown */
        --accent-amber: #A0522D;       /* Sienna / Warm Terracotta */
        --bg-cream: #FAF7F2;           /* Soft Linen/Cream Background */
        --border-soft: #EAE3D8;        /* Subtle Warm Gray/Brown Border */
        --text-dark: #2F221A;          /* Very Dark Charcoal Brown */
        --text-muted: #8C7A6B;         /* Soft Muted Earthy Brown */
        --cream-light: #F4EFE6;        /* Light Cream for Hover & Cards */
        --white-pure: #FFFFFF;
    }

    body {
        background-color: var(--bg-cream);
        color: var(--text-dark);
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* --- HERO SECTION --- */
    .hero {
        min-height: calc(100vh - 72px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5rem 5%;
        position: relative;
        overflow: hidden;
        text-align: center;
        background-color: var(--bg-cream);
    }

    .hero::before {
        content: '';
        position: absolute;
        inset: 0;
        /* Gradasi lembut bernuansa cokelat hangat, bukan lagi teal */
        background: radial-gradient(ellipse 80% 60% at 50% 40%, rgba(92, 64, 51, 0.05) 0%, transparent 70%);
        pointer-events: none;
    }

    .hero-inner {
        max-width: 750px;
        margin: 0 auto;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        background: var(--cream-light);
        color: var(--accent-amber);
        padding: .5rem 1.2rem;
        border-radius: 50px;
        font-size: .78rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .05em;
        margin-bottom: 2rem;
        border: 1px solid var(--border-soft);
        animation: fadeUp .5s ease both;
    }

    .hero-title {
        font-family: 'Fraunces', serif;
        font-size: clamp(2.8rem, 6vw, 4.2rem);
        font-weight: 900;
        line-height: 1.1;
        letter-spacing: -.02em;
        margin-bottom: 1.5rem;
        color: var(--text-dark);
        animation: fadeUp .6s .1s ease both;
    }

    .hero-title .accent {
        color: var(--primary-brown);
        font-style: italic;
    }

    .hero-title .warm {
        color: var(--accent-amber);
    }

    .hero-desc {
        color: var(--text-muted);
        font-size: 1.05rem;
        line-height: 1.8;
        max-width: 560px;
        margin: 0 auto 2.5rem;
        animation: fadeUp .6s .2s ease both;
    }

    /* --- BUTTONS --- */
    .hero-btns {
        display: flex;
        gap: 1.2rem;
        justify-content: center;
        flex-wrap: wrap;
        animation: fadeUp .6s .3s ease both;
    }

    .btn-brown-primary {
        background: var(--primary-brown);
        color: var(--white-pure);
        padding: 0.9rem 2rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.95rem;
        text-decoration: none;
        transition: all 0.2s ease;
        border: none;
        box-shadow: 0 4px 12px rgba(92, 64, 51, 0.15);
    }

    .btn-brown-primary:hover {
        background: var(--accent-amber);
        transform: translateY(-2px);
    }

    .btn-brown-outline {
        background: transparent;
        color: var(--primary-brown);
        padding: 0.9rem 2rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.95rem;
        text-decoration: none;
        border: 2px solid var(--primary-brown);
        transition: all 0.2s ease;
    }

    .btn-brown-outline:hover {
        background: var(--cream-light);
        transform: translateY(-2px);
    }

    /* --- HERO STATS --- */
    .hero-stats {
        display: flex;
        gap: 3rem;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 4rem;
        padding-top: 3rem;
        border-top: 1px solid var(--border-soft);
        animation: fadeUp .6s .4s ease both;
    }

    .stat-i {
        text-align: center;
    }

    .stat-n {
        font-family: 'Fraunces', serif;
        font-size: 2.4rem;
        font-weight: 900;
        color: var(--primary-brown);
        line-height: 1;
        display: block;
    }

    .stat-l {
        font-size: .75rem;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: .06em;
        margin-top: .5rem;
        font-weight: 600;
    }

    /* --- STRIP SECTION --- */
    .strip {
        background: linear-gradient(135deg, var(--primary-brown), var(--accent-amber));
        padding: 2.5rem 5%;
        display: flex;
        justify-content: center;
        gap: 5rem;
        flex-wrap: wrap;
        box-shadow: inset 0 10px 20px rgba(0,0,0,0.05);
    }

    .strip-i {
        text-align: center;
        color: var(--white-pure);
    }

    .strip-n {
        font-family: 'Fraunces', serif;
        font-size: 2.2rem;
        font-weight: 900;
        display: block;
        letter-spacing: -0.01em;
    }

    .strip-l {
        font-size: .75rem;
        opacity: .85;
        text-transform: uppercase;
        letter-spacing: .08em;
        font-weight: 500;
        margin-top: 0.2rem;
    }

    /* --- QUICK NAVIGATION SECTION --- */
    .quick-nav {
        padding: 6rem 5%;
        background: var(--white-pure);
    }

    .qnav-title {
        text-align: center;
        font-family: 'Fraunces', serif;
        font-size: 2.2rem;
        font-weight: 900;
        margin-bottom: .6rem;
        color: var(--text-dark);
    }

    .qnav-sub {
        text-align: center;
        color: var(--text-muted);
        font-size: .95rem;
        margin-bottom: 3.5rem;
    }

    .qnav-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
        max-width: 1000px;
        margin: 0 auto;
    }

    .qnav-card {
        background: var(--bg-cream);
        border-radius: 24px;
        padding: 2.5rem 1.8rem;
        text-align: center;
        text-decoration: none;
        color: var(--text-dark);
        transition: all .3s cubic-bezier(0.16, 1, 0.3, 1);
        border: 1px solid var(--border-soft);
    }

    .qnav-card:hover {
        background: var(--white-pure);
        border-color: var(--accent-amber);
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(92, 64, 51, 0.06);
    }

    .qnav-icon {
        font-size: 2.8rem;
        margin-bottom: 1rem;
        display: block;
        transition: transform 0.3s ease;
    }

    .qnav-card:hover .qnav-icon {
        transform: scale(1.1);
    }

    .qnav-name {
        font-family: 'Fraunces', serif;
        font-size: 1.15rem;
        font-weight: 800;
        margin-bottom: .5rem;
        color: var(--text-dark);
    }

    .qnav-desc {
        font-size: .82rem;
        color: var(--text-muted);
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
            <a href="{{ route('donasi.create') }}" class="btn-brown-primary">🤎 Donasi Sekarang</a>
            <a href="{{ route('program.index') }}" class="btn-brown-outline">Lihat Program</a>
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