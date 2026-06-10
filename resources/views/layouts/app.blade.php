<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Mari Berbagi — Bersama Kita Bisa')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,400;0,700;0,900;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --teal: #0D6E6E; --teal-dark: #084F4F; --teal-light: #E6F4F4;
            --orange: #E8622A; --sand: #FAF6F0; --ink: #1C1C1C;
            --muted: #6B7B7B; --white: #FFFFFF;
            --border: rgba(13,110,110,0.15);
            --shadow: 0 8px 40px rgba(13,110,110,0.12);
            --red: #DC2626; --green: #16A34A;
        }
        html { scroll-behavior: smooth; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--sand); color: var(--ink); overflow-x: hidden; min-height: 100vh; display: flex; flex-direction: column; }

        /* NAVBAR */
        .navbar { position: fixed; top: 0; left: 0; right: 0; z-index: 200; display: flex; align-items: center; justify-content: space-between; padding: 1.1rem 5%; background: rgba(250,246,240,0.95); backdrop-filter: blur(16px); border-bottom: 1px solid var(--border); transition: box-shadow 0.3s; }
        .navbar.scrolled { box-shadow: 0 4px 24px rgba(13,110,110,0.10); }
        .nav-brand { display: flex; align-items: center; gap: 0.5rem; font-family: 'Fraunces', serif; font-weight: 900; font-size: 1.45rem; color: var(--teal); text-decoration: none; letter-spacing: -0.02em; }
        .nav-brand .heart { color: var(--orange); }
        .nav-links { display: flex; align-items: center; gap: 1.8rem; list-style: none; }
        .nav-links a { color: var(--muted); text-decoration: none; font-size: 0.88rem; font-weight: 500; transition: color 0.2s; padding-bottom: 3px; border-bottom: 2px solid transparent; }
        .nav-links a:hover { color: var(--teal); }
        .nav-links a.active { color: var(--teal); font-weight: 600; border-bottom-color: var(--teal); }
        .nav-right { display: flex; align-items: center; gap: 0.8rem; }
        .btn-nav-ghost { padding: 0.5rem 1.2rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600; text-decoration: none; border: 2px solid var(--teal); color: var(--teal); transition: all 0.2s; }
        .btn-nav-ghost:hover { background: var(--teal); color: var(--white); }
        .btn-nav-solid { padding: 0.5rem 1.2rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600; text-decoration: none; background: var(--teal); color: var(--white); border: 2px solid var(--teal); transition: all 0.2s; }
        .btn-nav-solid:hover { background: var(--teal-dark); }
        .btn-nav-orange { padding: 0.55rem 1.3rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600; text-decoration: none; background: var(--orange); color: var(--white); border: 2px solid var(--orange); transition: all 0.2s; }
        .btn-nav-orange:hover { background: #c9521f; transform: translateY(-1px); }
        .nav-user { display: flex; align-items: center; gap: 0.7rem; }
        .nav-avatar { width: 34px; height: 34px; border-radius: 50%; background: var(--teal); color: var(--white); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.85rem; flex-shrink: 0; }
        .nav-name { font-size: 0.87rem; font-weight: 600; color: var(--ink); }
        .btn-logout { background: none; border: none; color: var(--muted); font-size: 0.8rem; cursor: pointer; font-family: 'Plus Jakarta Sans', sans-serif; transition: color 0.2s; }
        .btn-logout:hover { color: var(--red); }

        /* PAGE */
        .page-wrap { padding-top: 72px; flex: 1; }

        /* FLASH */
        .flash { margin: 1rem 5%; padding: 0.9rem 1.4rem; border-radius: 12px; font-size: 0.88rem; font-weight: 500; }
        .flash-success { background: #DCFCE7; color: var(--green); border: 1px solid #86EFAC; }
        .flash-error   { background: #FEE2E2; color: var(--red);   border: 1px solid #FCA5A5; }

        /* BUTTONS */
        .btn { display: inline-flex; align-items: center; gap: 0.45rem; padding: 0.8rem 1.8rem; border-radius: 50px; font-weight: 600; font-size: 0.92rem; text-decoration: none; border: none; cursor: pointer; font-family: 'Plus Jakarta Sans', sans-serif; transition: all 0.2s; }
        .btn-primary { background: var(--teal); color: var(--white); box-shadow: 0 4px 16px rgba(13,110,110,0.2); }
        .btn-primary:hover { background: var(--teal-dark); transform: translateY(-1px); }
        .btn-outline { background: transparent; color: var(--teal); border: 2px solid var(--teal); }
        .btn-outline:hover { background: var(--teal); color: var(--white); }
        .btn-orange { background: var(--orange); color: var(--white); }
        .btn-orange:hover { background: #c9521f; }
        .btn-sm { padding: 0.5rem 1.2rem; font-size: 0.82rem; }

        /* FORM */
        .form-group { margin-bottom: 1.2rem; }
        .form-label { display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 0.45rem; color: var(--ink); }
        .form-control { width: 100%; padding: 0.8rem 1rem; border: 2px solid var(--border); border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.9rem; color: var(--ink); background: var(--white); outline: none; transition: border-color 0.2s; }
        .form-control:focus { border-color: var(--teal); }
        .form-control.is-invalid { border-color: var(--red); }
        .invalid-feedback { color: var(--red); font-size: 0.78rem; margin-top: 0.3rem; display: block; }
        select.form-control { cursor: pointer; }
        textarea.form-control { resize: vertical; }

        /* CARD */
        .card { background: var(--white); border-radius: 20px; box-shadow: var(--shadow); overflow: hidden; margin-bottom: 1.5rem; }
        .card-body { padding: 2rem; }
        .card-header { padding: 1.4rem 2rem; border-bottom: 1px solid var(--border); }

        /* PAGE HEADER */
        .page-header { background: linear-gradient(135deg, var(--teal-dark), var(--teal)); padding: 3.5rem 5% 3rem; color: var(--white); }
        .page-header .sec-lbl { display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(255,255,255,0.15); color: var(--white); padding: 0.3rem 0.9rem; border-radius: 50px; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 0.8rem; }
        .page-header h1 { font-family: 'Fraunces', serif; font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 900; line-height: 1.15; margin-bottom: 0.6rem; }
        .page-header p { font-size: 0.95rem; opacity: 0.85; max-width: 520px; line-height: 1.7; }

        /* SECTION */
        .section { padding: 4rem 5%; }
        .sec-title { font-family: 'Fraunces', serif; font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 900; margin-bottom: 0.5rem; }
        .sec-sub { color: var(--muted); font-size: 0.92rem; line-height: 1.7; }

        /* FOOTER */
        .footer { background: var(--teal-dark); color: rgba(255,255,255,0.75); padding: 2.5rem 5% 1.5rem; margin-top: auto; }
        .footer-top { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 2rem; padding-bottom: 1.5rem; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .footer-brand { font-family: 'Fraunces', serif; font-weight: 900; font-size: 1.3rem; color: var(--white); margin-bottom: 0.5rem; }
        .footer-desc { font-size: 0.83rem; max-width: 280px; line-height: 1.65; }
        .footer-nav-title { color: var(--white); font-weight: 600; font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.8rem; }
        .footer-links { display: flex; flex-direction: column; gap: 0.5rem; }
        .footer-links a { color: rgba(255,255,255,0.6); text-decoration: none; font-size: 0.84rem; transition: color 0.2s; }
        .footer-links a:hover { color: var(--white); }
        .footer-copy { text-align: center; margin-top: 1.5rem; font-size: 0.78rem; }

        @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .fade-in { animation: fadeUp 0.5s ease both; }

        @media (max-width: 768px) { .nav-links { display: none; } .navbar { padding: 1rem 4%; } }
    </style>
    @yield('styles')
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar" id="mainNav">
    <a href="{{ route('home') }}" class="nav-brand">
        <span class="heart">♥</span> Mari Berbagi
    </a>
    <ul class="nav-links">
        <li><a href="{{ route('home') }}"           class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
        <li><a href="{{ route('program.index') }}"  class="{{ request()->routeIs('program*') ? 'active' : '' }}">Program</a></li>
        <li><a href="{{ route('donasi.create') }}"  class="{{ request()->routeIs('donasi*') ? 'active' : '' }}">Donasi Dana</a></li>
        <li><a href="{{ route('barang.create') }}"  class="{{ request()->routeIs('barang*') ? 'active' : '' }}">Kirim Barang</a></li>
        <li><a href="{{ route('transparansi') }}"   class="{{ request()->routeIs('transparansi') ? 'active' : '' }}">Transparansi</a></li>
        <li><a href="{{ route('feedback.index') }}" class="{{ request()->routeIs('feedback*') ? 'active' : '' }}">Ulasan</a></li>
    </ul>
    <div class="nav-right">
        @auth
        <div class="nav-user">
            <div class="nav-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            <span class="nav-name">{{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn-logout">Keluar</button>
            </form>
        </div>
        @else
        <a href="{{ route('login') }}"    class="btn-nav-ghost">Masuk</a>
        <a href="{{ route('register') }}" class="btn-nav-solid">Daftar</a>
        @endauth
        <a href="{{ route('donasi.create') }}" class="btn-nav-orange">♥ Donasi</a>
    </div>
</nav>

<!-- CONTENT -->
<div class="page-wrap">
    @if(session('success'))
        <div class="flash flash-success">✅ {{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="flash flash-error">❌ {{ session('error') }}</div>
    @endif

    @yield('content')
</div>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-top">
        <div>
            <div class="footer-brand">♥ Mari Berbagi</div>
            <p class="footer-desc">Platform donasi bencana terpercaya untuk mewujudkan kebaikan bersama di seluruh Indonesia.</p>
        </div>
        <div>
            <div class="footer-nav-title">Halaman</div>
            <div class="footer-links">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('program.index') }}">Program Donasi</a>
                <a href="{{ route('donasi.create') }}">Donasi Dana</a>
                <a href="{{ route('barang.create') }}">Kirim Barang</a>
            </div>
        </div>
        <div>
            <div class="footer-nav-title">Info</div>
            <div class="footer-links">
                <a href="{{ route('transparansi') }}">Transparansi</a>
                <a href="{{ route('feedback.index') }}">Ulasan</a>
            </div>
        </div>
        <div>
            <div class="footer-nav-title">Kontak</div>
            <div class="footer-links">
                <span style="color:rgba(255,255,255,0.6);font-size:.84rem">info@mariberbagi.id</span>
                <span style="color:rgba(255,255,255,0.6);font-size:.84rem">+62 812-3456-7890</span>
            </div>
        </div>
    </div>
    <div class="footer-copy">© {{ date('Y') }} Mari Berbagi — Dibuat dengan ♥ menggunakan Laravel.</div>
</footer>

<script>
    const nav = document.getElementById('mainNav');
    window.addEventListener('scroll', () => nav.classList.toggle('scrolled', window.scrollY > 60));
</script>
@yield('scripts')
</body>
</html>