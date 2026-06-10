@extends('layouts.app')
@section('title','Mari Berbagi — Bersama Kita Bisa')
@section('styles')
<style>
.hero{min-height:calc(100vh - 72px);display:flex;align-items:center;justify-content:center;padding:4rem 5%;position:relative;overflow:hidden;text-align:center}
.hero::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 80% 60% at 50% 40%,rgba(13,110,110,.08) 0%,transparent 70%);pointer-events:none}
.hero-inner{max-width:700px;margin:0 auto}
.hero-badge{display:inline-flex;align-items:center;gap:.5rem;background:var(--teal-light);color:var(--teal);padding:.4rem 1rem;border-radius:50px;font-size:.78rem;font-weight:700;text-transform:uppercase;letter-spacing:.05em;margin-bottom:1.5rem;animation:fadeUp .5s ease both}
.hero-title{font-family:'Fraunces',serif;font-size:clamp(2.8rem,6vw,4.5rem);font-weight:900;line-height:1.05;letter-spacing:-.03em;margin-bottom:1.3rem;animation:fadeUp .6s .1s ease both}
.hero-title .accent{color:var(--teal);font-style:italic}
.hero-title .warm{color:var(--orange)}
.hero-desc{color:var(--muted);font-size:1.05rem;line-height:1.8;max-width:520px;margin:0 auto 2.5rem;animation:fadeUp .6s .2s ease both}
.hero-btns{display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;animation:fadeUp .6s .3s ease both}
.hero-stats{display:flex;gap:2.5rem;justify-content:center;flex-wrap:wrap;margin-top:3.5rem;padding-top:3rem;border-top:1px solid var(--border);animation:fadeUp .6s .4s ease both}
.stat-i{text-align:center}
.stat-n{font-family:'Fraunces',serif;font-size:2.2rem;font-weight:900;color:var(--teal);line-height:1;display:block}
.stat-l{font-size:.75rem;color:var(--muted);text-transform:uppercase;letter-spacing:.05em;margin-top:.3rem}

.strip{background:var(--teal);padding:2rem 5%;display:flex;justify-content:center;gap:4rem;flex-wrap:wrap}
.strip-i{text-align:center;color:var(--white)}
.strip-n{font-family:'Fraunces',serif;font-size:2rem;font-weight:900;display:block}
.strip-l{font-size:.75rem;opacity:.75;text-transform:uppercase;letter-spacing:.06em}

.quick-nav{padding:4rem 5%;background:var(--white)}
.qnav-title{text-align:center;font-family:'Fraunces',serif;font-size:1.8rem;font-weight:900;margin-bottom:.5rem}
.qnav-sub{text-align:center;color:var(--muted);font-size:.92rem;margin-bottom:2.5rem}
.qnav-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1.2rem;max-width:900px;margin:0 auto}
.qnav-card{background:var(--sand);border-radius:20px;padding:2rem 1.5rem;text-align:center;text-decoration:none;color:var(--ink);transition:all .25s;border:2px solid transparent}
.qnav-card:hover{background:var(--teal-light);border-color:var(--teal);transform:translateY(-4px)}
.qnav-icon{font-size:2.5rem;margin-bottom:.8rem;display:block}
.qnav-name{font-family:'Fraunces',serif;font-size:1.05rem;font-weight:700;margin-bottom:.4rem}
.qnav-desc{font-size:.78rem;color:var(--muted);line-height:1.6}
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