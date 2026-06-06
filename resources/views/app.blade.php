<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Mari Berbagi — Bersama Kita Bisa')</title>
    <meta name="description" content="@yield('meta_description', 'Platform donasi dan berbagi kebaikan untuk sesama. Bersama kita wujudkan Indonesia yang lebih baik.')">
 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,400;0,700;0,900;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
 
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --teal:      #0D6E6E;
            --teal-dark: #084F4F;
            --teal-light:#E6F4F4;
            --orange:    #E8622A;
            --sand:      #FAF6F0;
            --ink:       #1C1C1C;
            --muted:     #6B7B7B;
            --white:     #FFFFFF;
            --border:    rgba(13,110,110,0.15);
            --shadow:    0 8px 40px rgba(13,110,110,0.12);
        }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--sand);
            color: var(--ink);
            overflow-x: hidden;
        }
 
        /* NAVBAR */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 200;
            display: flex; align-items: center; justify-content: space-between;
            padding: 1.1rem 5%;
            background: rgba(250,246,240,0.92);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
            transition: box-shadow 0.3s;
        }
        .navbar.scrolled { box-shadow: 0 4px 24px rgba(13,110,110,0.10); }
        .nav-brand {
            display: flex; align-items: center; gap: 0.6rem;
            font-family: 'Fraunces', serif; font-weight: 900; font-size: 1.45rem;
            color: var(--teal); text-decoration: none; letter-spacing: -0.02em;
        }
        .nav-brand .heart { color: var(--orange); font-style: normal; }
        .nav-links { display: flex; align-items: center; gap: 2rem; list-style: none; }
        .nav-links a {
            color: var(--muted); text-decoration: none;
            font-size: 0.88rem; font-weight: 500; letter-spacing: 0.02em;
            transition: color 0.2s;
        }
        .nav-links a:hover { color: var(--teal); }
        .btn-nav {
            background: var(--teal); color: var(--white) !important;
            padding: 0.55rem 1.3rem; border-radius: 50px;
            font-weight: 600 !important; transition: background 0.2s, transform 0.15s !important;
        }
        .btn-nav:hover { background: var(--orange) !important; transform: translateY(-1px); }
 
        @yield('styles')
    </style>
</head>
<body>
 
<nav class="navbar" id="mainNav">
    <a href="{{ url('/') }}" class="nav-brand">
        <i class="heart">♥</i> Mari Berbagi
    </a>
    <ul class="nav-links">
        <li><a href="#beranda">Beranda</a></li>
        <li><a href="#campaign">Kampanye</a></li>
        <li><a href="#cara-kerja">Cara Kerja</a></li>
        <li><a href="#dampak">Dampak</a></li>
        <li><a href="{{ url('/donasi') }}" class="btn-nav">Donasi Sekarang</a></li>
    </ul>
</nav>
 
@yield('content')
 
<!-- FOOTER -->
<footer style="background:var(--teal-dark);color:rgba(255,255,255,0.8);padding:3rem 5% 2rem;">
    <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1.5rem;margin-bottom:2rem;padding-bottom:2rem;border-bottom:1px solid rgba(255,255,255,0.15);">
        <div>
            <div style="font-family:'Fraunces',serif;font-weight:900;font-size:1.4rem;color:#fff;margin-bottom:0.4rem;">♥ Mari Berbagi</div>
            <p style="font-size:0.85rem;max-width:300px;line-height:1.6;">Platform donasi terpercaya untuk mewujudkan kebaikan bersama di seluruh Indonesia.</p>
        </div>
        <div style="display:flex;gap:3rem;flex-wrap:wrap;">
            <div>
                <div style="color:#fff;font-weight:600;font-size:0.85rem;margin-bottom:0.8rem;letter-spacing:0.05em;text-transform:uppercase;">Navigasi</div>
                <div style="display:flex;flex-direction:column;gap:0.5rem;font-size:0.85rem;">
                    <a href="#campaign" style="color:rgba(255,255,255,0.7);text-decoration:none;">Kampanye</a>
                    <a href="#cara-kerja" style="color:rgba(255,255,255,0.7);text-decoration:none;">Cara Kerja</a>
                    <a href="#dampak" style="color:rgba(255,255,255,0.7);text-decoration:none;">Dampak Kami</a>
                </div>
            </div>
            <div>
                <div style="color:#fff;font-weight:600;font-size:0.85rem;margin-bottom:0.8rem;letter-spacing:0.05em;text-transform:uppercase;">Kontak</div>
                <div style="display:flex;flex-direction:column;gap:0.5rem;font-size:0.85rem;">
                    <span>info@mariberbagi.id</span>
                    <span>+62 812-3456-7890</span>
                </div>
            </div>
        </div>
    </div>
    <p style="text-align:center;font-size:0.8rem;">© {{ date('Y') }} Mari Berbagi. Dibuat dengan ♥ menggunakan <strong style="color:#fff;">Laravel</strong>.</p>
</footer>
 
<script>
    const nav = document.getElementById('mainNav');
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 60);
    });
</script>
@yield('scripts')
</body>
</html>