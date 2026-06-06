<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mari Berbagi — Bersama Kita Bisa</title>
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
        }
        html { scroll-behavior: smooth; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--sand); color: var(--ink); overflow-x: hidden; }

        /* NAVBAR */
        .navbar { position: fixed; top: 0; left: 0; right: 0; z-index: 200; display: flex; align-items: center; justify-content: space-between; padding: 1.1rem 5%; background: rgba(250,246,240,0.92); backdrop-filter: blur(16px); border-bottom: 1px solid var(--border); transition: box-shadow 0.3s; }
        .navbar.scrolled { box-shadow: 0 4px 24px rgba(13,110,110,0.10); }
        .nav-brand { font-family: 'Fraunces', serif; font-weight: 900; font-size: 1.45rem; color: var(--teal); text-decoration: none; }
        .nav-brand .heart { color: var(--orange); }
        .nav-links { display: flex; align-items: center; gap: 2rem; list-style: none; }
        .nav-links a { color: var(--muted); text-decoration: none; font-size: 0.88rem; font-weight: 500; transition: color 0.2s; }
        .nav-links a:hover { color: var(--teal); }
        .btn-nav { background: var(--teal) !important; color: var(--white) !important; padding: 0.55rem 1.3rem; border-radius: 50px; font-weight: 600 !important; }
        .btn-nav:hover { background: var(--orange) !important; }

        /* HERO */
        .hero { min-height: 100vh; padding: 8rem 5% 5rem; display: grid; grid-template-columns: 1fr 1fr; align-items: center; gap: 4rem; position: relative; overflow: hidden; }
        .hero::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse 60% 80% at 80% 50%, rgba(13,110,110,0.08) 0%, transparent 70%), radial-gradient(ellipse 40% 40% at 20% 80%, rgba(232,98,42,0.06) 0%, transparent 60%); pointer-events: none; }
        .hero-badge { display: inline-flex; align-items: center; gap: 0.5rem; background: var(--teal-light); color: var(--teal); padding: 0.4rem 1rem; border-radius: 50px; font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 1.5rem; animation: fadeUp 0.6s ease both; }
        .hero-title { font-family: 'Fraunces', serif; font-size: clamp(2.6rem, 5vw, 4rem); font-weight: 900; line-height: 1.1; letter-spacing: -0.03em; margin-bottom: 1.5rem; animation: fadeUp 0.7s 0.1s ease both; }
        .hero-title .accent { color: var(--teal); font-style: italic; }
        .hero-title .warm { color: var(--orange); }
        .hero-desc { color: var(--muted); font-size: 1.05rem; line-height: 1.75; max-width: 480px; margin-bottom: 2.5rem; animation: fadeUp 0.7s 0.2s ease both; }
        .hero-actions { display: flex; gap: 1rem; flex-wrap: wrap; animation: fadeUp 0.7s 0.3s ease both; }
        .btn-primary { background: var(--teal); color: var(--white); padding: 0.9rem 2rem; border-radius: 50px; font-weight: 600; text-decoration: none; box-shadow: 0 6px 24px rgba(13,110,110,0.25); transition: all 0.2s; display: inline-flex; align-items: center; gap: 0.4rem; }
        .btn-primary:hover { background: var(--teal-dark); transform: translateY(-2px); }
        .btn-outline { background: transparent; color: var(--teal); padding: 0.9rem 2rem; border-radius: 50px; font-weight: 600; text-decoration: none; border: 2px solid var(--teal); transition: all 0.2s; }
        .btn-outline:hover { background: var(--teal); color: var(--white); }
        .hero-stats { display: flex; gap: 2rem; margin-top: 3rem; animation: fadeUp 0.7s 0.4s ease both; }
        .stat-item { display: flex; flex-direction: column; }
        .stat-num { font-family: 'Fraunces', serif; font-size: 2rem; font-weight: 900; color: var(--teal); line-height: 1; }
        .stat-label { font-size: 0.75rem; color: var(--muted); text-transform: uppercase; letter-spacing: 0.04em; margin-top: 0.2rem; }
        .stat-divider { border-left: 2px solid var(--border); padding-left: 2rem; }
        .hero-visual { position: relative; animation: fadeUp 0.8s 0.2s ease both; }
        .hero-card { background: var(--white); border-radius: 24px; overflow: hidden; box-shadow: var(--shadow); }
        .hero-card-img { width: 100%; aspect-ratio: 16/10; background: linear-gradient(135deg, var(--teal-light), rgba(13,110,110,0.2)); display: flex; align-items: center; justify-content: center; font-size: 5rem; }
        .hero-card-body { padding: 1.5rem; }
        .prog-label { display: flex; justify-content: space-between; font-size: 0.82rem; color: var(--muted); margin-bottom: 0.5rem; }
        .prog-bar-wrap { background: var(--teal-light); border-radius: 50px; height: 8px; overflow: hidden; margin-bottom: 1rem; }
        .prog-bar { background: linear-gradient(90deg, var(--teal), var(--teal-dark)); height: 100%; border-radius: 50px; }
        .card-meta { display: flex; justify-content: space-between; align-items: center; }
        .card-amount { font-family: 'Fraunces', serif; font-size: 1.3rem; font-weight: 700; color: var(--teal); }
        .card-tag { background: var(--teal-light); color: var(--teal); font-size: 0.75rem; font-weight: 600; padding: 0.3rem 0.7rem; border-radius: 50px; }
        .float-badge { position: absolute; background: var(--white); border-radius: 14px; box-shadow: 0 8px 30px rgba(0,0,0,0.12); padding: 0.8rem 1.1rem; display: flex; align-items: center; gap: 0.7rem; }
        .float-badge.top-right { top: -1.5rem; right: -1.5rem; animation: float 3s ease-in-out infinite; }
        .float-badge.bot-left  { bottom: -1.5rem; left: -1.5rem; animation: float 3s 1.5s ease-in-out infinite; }
        .badge-icon { font-size: 1.4rem; }
        .badge-main { font-weight: 700; font-size: 0.9rem; color: var(--ink); }
        .badge-sub  { font-size: 0.72rem; color: var(--muted); }

        /* STATS STRIP */
        .stats-strip { background: var(--teal); padding: 2.5rem 5%; display: flex; justify-content: center; gap: 5rem; flex-wrap: wrap; }
        .strip-item { text-align: center; color: var(--white); }
        .strip-num { font-family: 'Fraunces', serif; font-size: 2.4rem; font-weight: 900; display: block; }
        .strip-lbl { font-size: 0.8rem; opacity: 0.75; text-transform: uppercase; letter-spacing: 0.06em; }

        /* SECTION COMMON */
        .section { padding: 5rem 5%; }
        .sec-lbl { display: inline-flex; align-items: center; gap: 0.5rem; color: var(--teal); font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 0.8rem; }
        .sec-lbl::before { content: ''; width: 24px; height: 2px; background: var(--teal); display: block; }
        .sec-title { font-family: 'Fraunces', serif; font-size: clamp(1.8rem, 3vw, 2.6rem); font-weight: 900; line-height: 1.2; letter-spacing: -0.02em; margin-bottom: 0.8rem; }
        .sec-sub { color: var(--muted); font-size: 1rem; max-width: 500px; line-height: 1.7; }
        .sec-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 3rem; flex-wrap: wrap; gap: 1.5rem; }
        .btn-link { color: var(--teal); font-weight: 600; font-size: 0.9rem; text-decoration: none; }
        .btn-link:hover { color: var(--orange); }

        /* ─────────────────────────────────────────────────
           FITUR DONASI SECTION
        ───────────────────────────────────────────────── */
        .fitur-section { padding: 4rem 5%; background: var(--white); }
        .fitur-section-header { text-align: center; margin-bottom: 2.5rem; }
        .fitur-tabs { display: flex; justify-content: center; gap: 1rem; margin-bottom: 2.5rem; flex-wrap: wrap; }
        .fitur-tab { display: flex; align-items: center; gap: 0.6rem; padding: 0.75rem 1.6rem; border-radius: 50px; border: 2px solid var(--border); background: transparent; color: var(--muted); font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.9rem; font-weight: 600; cursor: pointer; transition: all 0.25s; }
        .fitur-tab:hover { border-color: var(--teal); color: var(--teal); }
        .fitur-tab.active { background: var(--teal); color: var(--white); border-color: var(--teal); box-shadow: 0 6px 20px rgba(13,110,110,0.25); }
        .fitur-tab .tab-icon { font-size: 1.1rem; }
        .fitur-panel { display: none; animation: fadeUp 0.4s ease; }
        .fitur-panel.active { display: block; }

        /* Panel 1 - Jenis Donasi */
        .donasi-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; max-width: 800px; margin: 0 auto; }
        .donasi-card { border: 2px solid var(--border); border-radius: 20px; padding: 2rem; cursor: pointer; transition: all 0.25s; text-align: center; position: relative; overflow: hidden; }
        .donasi-card:hover, .donasi-card.selected { border-color: var(--teal); background: var(--teal-light); transform: translateY(-3px); box-shadow: 0 8px 30px rgba(13,110,110,0.15); }
        .donasi-card.selected::after { content: '✓'; position: absolute; top: 1rem; right: 1rem; background: var(--teal); color: var(--white); width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 700; }
        .donasi-card-icon { font-size: 3rem; margin-bottom: 1rem; }
        .donasi-card-title { font-family: 'Fraunces', serif; font-size: 1.2rem; font-weight: 700; margin-bottom: 0.5rem; }
        .donasi-card-desc { color: var(--muted); font-size: 0.85rem; line-height: 1.6; }
        .donasi-methods { display: flex; flex-wrap: wrap; gap: 0.5rem; justify-content: center; margin-top: 1rem; }
        .method-tag { background: var(--white); border: 1px solid var(--border); color: var(--teal); font-size: 0.72rem; font-weight: 600; padding: 0.25rem 0.6rem; border-radius: 50px; }
        .donasi-cta { text-align: center; margin-top: 2rem; }

        /* Panel 2 - Target Penerima */
        .target-wrap { max-width: 860px; margin: 0 auto; }
        .target-search-row { display: flex; gap: 1rem; margin-bottom: 1.5rem; flex-wrap: wrap; }
        .target-search-input { flex: 1; padding: 0.85rem 1.2rem; border: 2px solid var(--border); border-radius: 50px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.9rem; color: var(--ink); outline: none; transition: border-color 0.2s; min-width: 200px; }
        .target-search-input:focus { border-color: var(--teal); }
        .target-select { padding: 0.85rem 1.2rem; border: 2px solid var(--border); border-radius: 50px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.9rem; color: var(--ink); outline: none; background: var(--white); cursor: pointer; }
        .target-select:focus { border-color: var(--teal); }
        .target-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 1rem; }
        .target-card { border: 2px solid var(--border); border-radius: 16px; padding: 1.2rem; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; gap: 1rem; }
        .target-card:hover, .target-card.selected { border-color: var(--teal); background: var(--teal-light); }
        .target-icon { width: 44px; height: 44px; border-radius: 12px; background: var(--teal-light); display: flex; align-items: center; justify-content: center; font-size: 1.4rem; flex-shrink: 0; }
        .target-card.selected .target-icon { background: var(--teal); }
        .target-name { font-weight: 600; font-size: 0.9rem; margin-bottom: 0.2rem; }
        .target-loc { font-size: 0.78rem; color: var(--muted); }
        .target-badge { margin-left: auto; font-size: 0.7rem; font-weight: 700; padding: 0.2rem 0.5rem; border-radius: 50px; white-space: nowrap; }
        .badge-butuh { background: rgba(232,98,42,0.1); color: var(--orange); }
        .badge-aman  { background: var(--teal-light); color: var(--teal); }

        /* Panel 3 - Ulasan & Transparansi */
        .ulasan-wrap { max-width: 860px; margin: 0 auto; }
        .ulasan-tabs { display: flex; border: 2px solid var(--border); border-radius: 50px; overflow: hidden; width: fit-content; }
        .ulasan-subtab { padding: 0.6rem 1.5rem; background: transparent; border: none; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.85rem; font-weight: 600; color: var(--muted); cursor: pointer; transition: all 0.2s; }
        .ulasan-subtab.active { background: var(--teal); color: var(--white); }
        .feedback-form { background: var(--sand); border-radius: 20px; padding: 1.5rem; margin-bottom: 1.5rem; }
        .feedback-form textarea { width: 100%; padding: 1rem; border: 2px solid var(--border); border-radius: 14px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.9rem; resize: none; outline: none; transition: border-color 0.2s; background: var(--white); }
        .feedback-form textarea:focus { border-color: var(--teal); }
        .feedback-row { display: flex; align-items: center; justify-content: space-between; margin-top: 1rem; flex-wrap: wrap; gap: 0.8rem; }
        .star-rating span { font-size: 1.5rem; cursor: pointer; transition: transform 0.15s; display: inline-block; }
        .star-rating span:hover { transform: scale(1.2); }
        .btn-submit { background: var(--teal); color: var(--white); padding: 0.6rem 1.5rem; border-radius: 50px; border: none; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600; font-size: 0.88rem; cursor: pointer; transition: background 0.2s; }
        .btn-submit:hover { background: var(--teal-dark); }
        .ulasan-list { display: flex; flex-direction: column; gap: 1rem; margin-bottom: 1.5rem; }
        .ulasan-card { background: var(--sand); border-radius: 16px; padding: 1.2rem; border-left: 4px solid var(--teal); }
        .ulasan-header { display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.6rem; }
        .ulasan-avatar { width: 38px; height: 38px; border-radius: 50%; background: var(--teal); color: var(--white); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.9rem; flex-shrink: 0; }
        .ulasan-name { font-weight: 600; font-size: 0.9rem; }
        .ulasan-time { font-size: 0.75rem; color: var(--muted); }
        .ulasan-stars { color: #F59E0B; font-size: 0.85rem; margin-left: auto; }
        .ulasan-text { color: var(--ink); font-size: 0.88rem; line-height: 1.65; }
        .log-filter-row { display: flex; gap: 0.8rem; margin-bottom: 1.2rem; flex-wrap: wrap; align-items: center; }
        .log-filter { padding: 0.5rem 1rem; border: 2px solid var(--border); border-radius: 50px; font-size: 0.82rem; font-weight: 600; color: var(--muted); background: transparent; cursor: pointer; transition: all 0.2s; }
        .log-filter.active { background: var(--teal); color: var(--white); border-color: var(--teal); }
        .log-table { width: 100%; border-collapse: collapse; font-size: 0.85rem; }
        .log-table th { text-align: left; padding: 0.7rem 1rem; background: var(--teal); color: var(--white); font-weight: 600; font-size: 0.8rem; letter-spacing: 0.03em; }
        .log-table th:first-child { border-radius: 12px 0 0 0; }
        .log-table th:last-child  { border-radius: 0 12px 0 0; }
        .log-table td { padding: 0.75rem 1rem; border-bottom: 1px solid var(--border); }
        .log-table tr:hover td { background: var(--teal-light); }
        .log-type-dana { background: rgba(13,110,110,0.1); color: var(--teal); font-size: 0.72rem; font-weight: 700; padding: 0.2rem 0.6rem; border-radius: 50px; }
        .log-type-logistik { background: rgba(232,98,42,0.1); color: var(--orange); font-size: 0.72rem; font-weight: 700; padding: 0.2rem 0.6rem; border-radius: 50px; }

        /* CAMPAIGN */
        .camp-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem; }
        .camp-card { background: var(--white); border-radius: 20px; overflow: hidden; box-shadow: 0 2px 16px rgba(13,110,110,0.08); text-decoration: none; color: inherit; display: block; transition: transform 0.25s, box-shadow 0.25s; }
        .camp-card:hover { transform: translateY(-6px); box-shadow: 0 12px 40px rgba(13,110,110,0.15); }
        .camp-img { width: 100%; aspect-ratio: 16/10; background: linear-gradient(135deg, var(--teal-light), rgba(232,98,42,0.12)); display: flex; align-items: center; justify-content: center; font-size: 3.5rem; position: relative; }
        .camp-cat { position: absolute; top: 1rem; left: 1rem; background: var(--white); color: var(--teal); font-size: 0.72rem; font-weight: 700; padding: 0.3rem 0.7rem; border-radius: 50px; text-transform: uppercase; }
        .camp-body { padding: 1.4rem; }
        .camp-org { font-size: 0.78rem; color: var(--muted); margin-bottom: 0.4rem; font-weight: 500; }
        .camp-title { font-family: 'Fraunces', serif; font-size: 1.1rem; font-weight: 700; line-height: 1.3; margin-bottom: 1rem; }
        .camp-prog-wrap { background: var(--teal-light); border-radius: 50px; height: 6px; margin-bottom: 0.8rem; overflow: hidden; }
        .camp-prog { background: linear-gradient(90deg, var(--teal), var(--orange)); height: 100%; border-radius: 50px; }
        .camp-footer { display: flex; justify-content: space-between; align-items: center; font-size: 0.82rem; }
        .camp-amount { font-weight: 700; color: var(--teal); }
        .camp-days { color: var(--muted); }

        /* CARA KERJA */
        .cara-kerja { padding: 5rem 5%; background: var(--sand); }
        .steps-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 2rem; margin-top: 3rem; }
        .step-card { background: var(--white); border-radius: 20px; padding: 2rem; position: relative; overflow: hidden; transition: transform 0.2s; box-shadow: 0 2px 12px rgba(13,110,110,0.06); }
        .step-card:hover { transform: translateY(-4px); }
        .step-num { position: absolute; top: -0.5rem; right: 1rem; font-family: 'Fraunces', serif; font-size: 5rem; font-weight: 900; color: var(--teal-light); line-height: 1; }
        .step-icon { font-size: 1.8rem; width: 50px; height: 50px; background: var(--teal-light); border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; }
        .step-title { font-family: 'Fraunces', serif; font-size: 1.1rem; font-weight: 700; margin-bottom: 0.5rem; }
        .step-desc { color: var(--muted); font-size: 0.87rem; line-height: 1.65; }

        /* DAMPAK */
        .dampak-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; }
        .dampak-visual { background: linear-gradient(135deg, var(--teal-light), rgba(13,110,110,0.15)); border-radius: 24px; aspect-ratio: 1; display: flex; align-items: center; justify-content: center; font-size: 8rem; position: relative; }
        .dampak-metric { position: absolute; bottom: -1rem; right: -1rem; background: var(--orange); color: var(--white); border-radius: 16px; padding: 1rem 1.5rem; text-align: center; box-shadow: 0 8px 24px rgba(232,98,42,0.35); }
        .metric-num { font-family: 'Fraunces', serif; font-size: 2rem; font-weight: 900; display: block; }
        .metric-lbl { font-size: 0.75rem; opacity: 0.9; }
        .impact-list { margin-top: 2rem; display: flex; flex-direction: column; gap: 1.2rem; }
        .impact-item { display: flex; gap: 1rem; }
        .impact-dot { width: 36px; height: 36px; border-radius: 10px; background: var(--teal-light); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .impact-t { font-weight: 600; font-size: 0.95rem; margin-bottom: 0.2rem; }
        .impact-d { color: var(--muted); font-size: 0.85rem; line-height: 1.6; }

        /* CTA */
        .cta-wrap { margin: 0 5% 5rem; }
        .cta-banner { background: linear-gradient(135deg, var(--teal-dark), var(--teal)); border-radius: 28px; padding: 4rem; display: flex; justify-content: space-between; align-items: center; gap: 2rem; flex-wrap: wrap; position: relative; overflow: hidden; }
        .cta-banner::after { content: '♥'; position: absolute; right: 3rem; top: 50%; transform: translateY(-50%); font-size: 12rem; color: rgba(255,255,255,0.05); pointer-events: none; font-family: 'Fraunces', serif; }
        .cta-title { font-family: 'Fraunces', serif; font-size: clamp(1.6rem, 3vw, 2.2rem); font-weight: 900; color: var(--white); line-height: 1.2; margin-bottom: 0.7rem; }
        .cta-desc { color: rgba(255,255,255,0.75); font-size: 0.95rem; max-width: 400px; line-height: 1.7; }
        .btn-white { background: var(--white); color: var(--teal); padding: 1rem 2rem; border-radius: 50px; font-weight: 700; text-decoration: none; white-space: nowrap; transition: transform 0.2s; box-shadow: 0 6px 20px rgba(0,0,0,0.2); display: inline-flex; align-items: center; gap: 0.4rem; }
        .btn-white:hover { transform: translateY(-2px); }

        /* FOOTER */
        .footer { background: var(--teal-dark); color: rgba(255,255,255,0.8); padding: 2rem 5%; text-align: center; font-size: 0.85rem; }

        /* ANIMATIONS */
        @keyframes fadeUp { from { opacity:0; transform:translateY(24px); } to { opacity:1; transform:translateY(0); } }
        @keyframes float { 0%,100% { transform:translateY(0); } 50% { transform:translateY(-8px); } }
        .reveal { opacity:0; transform:translateY(30px); transition: opacity 0.65s ease, transform 0.65s ease; }
        .reveal.visible { opacity:1; transform:translateY(0); }

        @media (max-width: 900px) {
            .hero { grid-template-columns: 1fr; text-align: center; }
            .hero-actions, .hero-stats { justify-content: center; }
            .hero-desc { margin: 0 auto 2rem; }
            .dampak-grid { grid-template-columns: 1fr; }
            .donasi-grid { grid-template-columns: 1fr; }
            .float-badge.top-right { top:-1rem; right:-0.5rem; }
            .float-badge.bot-left  { bottom:-1rem; left:-0.5rem; }
            .nav-links { display: none; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar" id="navbar">
    <a href="/" class="nav-brand"><span class="heart">♥</span> Mari Berbagi</a>
    <ul class="nav-links">
        <li><a href="#beranda">Beranda</a></li>
        <li><a href="#campaign">Kampanye</a></li>
        <li><a href="#cara-kerja">Cara Kerja</a></li>
        <li><a href="#dampak">Dampak</a></li>
        <li><a href="#" class="btn-nav">Donasi Sekarang</a></li>
    </ul>
</nav>

<!-- HERO -->
<section class="hero" id="beranda">
    <div>
        <div class="hero-badge">✦ Platform Donasi Terpercaya</div>
        <h1 class="hero-title">Satu Kebaikan,<br><span class="accent">Sejuta</span> <span class="warm">Senyuman</span></h1>
        <p class="hero-desc">Mari Berbagi menghubungkan para dermawan dengan mereka yang membutuhkan. Bersama-sama kita wujudkan perubahan nyata untuk Indonesia yang lebih baik.</p>
        <div class="hero-actions">
            <a href="#" class="btn-primary">♥ Mulai Berdonasi</a>
            <a href="#campaign" class="btn-outline">Lihat Kampanye</a>
        </div>
        <div class="hero-stats">
            <div class="stat-item"><span class="stat-num">12K+</span><span class="stat-label">Donatur Aktif</span></div>
            <div class="stat-item stat-divider"><span class="stat-num">Rp 4,8M</span><span class="stat-label">Terkumpul</span></div>
            <div class="stat-item stat-divider"><span class="stat-num">340+</span><span class="stat-label">Kampanye Aktif</span></div>
        </div>
    </div>
    <div class="hero-visual">
        <div class="hero-card">
            <div class="hero-card-img">🏫</div>
            <div class="hero-card-body">
                <p style="font-family:'Fraunces',serif;font-weight:700;margin-bottom:0.8rem;">Bantu Bangun Sekolah di Pelosok NTT</p>
                <div class="prog-label"><span>Terkumpul</span><span>72%</span></div>
                <div class="prog-bar-wrap"><div class="prog-bar" style="width:72%"></div></div>
                <div class="card-meta"><span class="card-amount">Rp 72.000.000</span><span class="card-tag">Pendidikan</span></div>
            </div>
        </div>
        <div class="float-badge top-right"><span class="badge-icon">🎉</span><div><div class="badge-main">Donasi Baru!</div><div class="badge-sub">Budi berdonasi Rp 100rb</div></div></div>
        <div class="float-badge bot-left"><span class="badge-icon">✅</span><div><div class="badge-main">Kampanye Selesai</div><div class="badge-sub">100% target tercapai</div></div></div>
    </div>
</section>

<!-- STATS STRIP -->
<div class="stats-strip">
    <div class="strip-item reveal"><span class="strip-num">Rp 4,8M+</span><span class="strip-lbl">Dana Tersalurkan</span></div>
    <div class="strip-item reveal"><span class="strip-num">12.400+</span><span class="strip-lbl">Donatur Bergabung</span></div>
    <div class="strip-item reveal"><span class="strip-num">340+</span><span class="strip-lbl">Kampanye Berhasil</span></div>
    <div class="strip-item reveal"><span class="strip-num">98%</span><span class="strip-lbl">Tingkat Kepuasan</span></div>
</div>

<!-- ═══════════════ FITUR DONASI ═══════════════ -->
<section class="fitur-section" id="fitur">
    <div class="fitur-section-header reveal">
        <div class="sec-lbl" style="justify-content:center;">Pilih Cara Berkontribusi</div>
        <h2 class="sec-title">Jenis Donasi</h2>
        <p class="sec-sub" style="margin:0 auto 0.5rem;">Pilih cara kontribusimu, tentukan penerima, dan pantau dampaknya secara transparan.</p>
    </div>
    <div class="fitur-tabs">
        <button class="fitur-tab active" onclick="switchTab('jenis')"><span class="tab-icon">💰</span> Jenis Donasi</button>
        <button class="fitur-tab" onclick="switchTab('target')"><span class="tab-icon">🎯</span> Target Penerima</button>
        <button class="fitur-tab" onclick="switchTab('ulasan')"><span class="tab-icon">⭐</span> Ulasan & Transparansi</button>
    </div>

    <!-- PANEL 1: JENIS DONASI -->
    <div class="fitur-panel active" id="panel-jenis">
        <div class="donasi-grid">
            <div class="donasi-card selected" onclick="selectDonasi(this)">
                <div class="donasi-card-icon">💳</div>
                <div class="donasi-card-title">Donasi Dana</div>
                <p class="donasi-card-desc">Kirim bantuan dalam bentuk uang. Dikelola langsung oleh pengelola kampanye secara transparan.</p>
                <div class="donasi-methods">
                    <span class="method-tag">Transfer Bank</span>
                    <span class="method-tag">E-Wallet</span>
                    <span class="method-tag">QRIS</span>
                </div>
            </div>
            <div class="donasi-card" onclick="selectDonasi(this)">
                <div class="donasi-card-icon">📦</div>
                <div class="donasi-card-title">Donasi Logistik</div>
                <p class="donasi-card-desc">Kirim bantuan berupa barang kebutuhan nyata ke lokasi yang membutuhkan.</p>
                <div class="donasi-methods">
                    <span class="method-tag">Pakaian</span>
                    <span class="method-tag">Sembako</span>
                    <span class="method-tag">Obat-obatan</span>
                </div>
            </div>
        </div>
        <div class="donasi-cta"><a href="#" class="btn-primary">♥ Lanjutkan Donasi</a></div>
    </div>

    <!-- PANEL 2: TARGET PENERIMA -->
    <div class="fitur-panel" id="panel-target">
        <div class="target-wrap">
            <div class="target-search-row">
                <input type="text" class="target-search-input" placeholder="🔍  Cari lokasi bencana, panti asuhan...">
                <select class="target-select"><option>Semua Kategori</option><option>Panti Asuhan</option><option>Korban Bencana</option><option>Daerah Terpencil</option></select>
                <select class="target-select"><option>Semua Provinsi</option><option>Jawa Tengah</option><option>NTT</option><option>Kalimantan Selatan</option><option>Sulawesi</option></select>
            </div>
            <div class="target-grid">
                <div class="target-card selected" onclick="selectTarget(this)">
                    <div class="target-icon">🏠</div>
                    <div><div class="target-name">Panti Asuhan Al-Ikhlas</div><div class="target-loc">📍 Semarang, Jawa Tengah</div></div>
                    <span class="target-badge badge-butuh">Butuh Bantuan</span>
                </div>
                <div class="target-card" onclick="selectTarget(this)">
                    <div class="target-icon">🌊</div>
                    <div><div class="target-name">Korban Banjir Kalsel</div><div class="target-loc">📍 Banjarmasin, Kalsel</div></div>
                    <span class="target-badge badge-butuh">Darurat</span>
                </div>
                <div class="target-card" onclick="selectTarget(this)">
                    <div class="target-icon">🏫</div>
                    <div><div class="target-name">SDN Pelosok NTT</div><div class="target-loc">📍 Kupang, NTT</div></div>
                    <span class="target-badge badge-aman">Aktif</span>
                </div>
                <div class="target-card" onclick="selectTarget(this)">
                    <div class="target-icon">👴</div>
                    <div><div class="target-name">Panti Jompo Sejahtera</div><div class="target-loc">📍 Yogyakarta, DIY</div></div>
                    <span class="target-badge badge-butuh">Butuh Bantuan</span>
                </div>
                <div class="target-card" onclick="selectTarget(this)">
                    <div class="target-icon">🔥</div>
                    <div><div class="target-name">Korban Kebakaran Makassar</div><div class="target-loc">📍 Makassar, Sulsel</div></div>
                    <span class="target-badge badge-butuh">Darurat</span>
                </div>
                <div class="target-card" onclick="selectTarget(this)">
                    <div class="target-icon">🌿</div>
                    <div><div class="target-name">Desa Terpencil Kaltim</div><div class="target-loc">📍 Kutai, Kaltim</div></div>
                    <span class="target-badge badge-aman">Aktif</span>
                </div>
            </div>
            <div class="donasi-cta" style="margin-top:1.5rem;"><a href="#" class="btn-primary">🎯 Donasi ke Target Ini</a></div>
        </div>
    </div>

    <!-- PANEL 3: ULASAN & TRANSPARANSI -->
    <div class="fitur-panel" id="panel-ulasan">
        <div class="ulasan-wrap">
            <div style="display:flex;justify-content:center;margin-bottom:1.5rem;">
                <div class="ulasan-tabs">
                    <button class="ulasan-subtab active" onclick="switchUlasan('feedback',this)">💬 Umpan Balik</button>
                    <button class="ulasan-subtab" onclick="switchUlasan('riwayat',this)">📋 Riwayat Donasi</button>
                </div>
            </div>
            <!-- FEEDBACK -->
            <div id="sub-feedback">
                <div class="feedback-form">
                    <p style="font-weight:600;margin-bottom:0.8rem;font-size:0.95rem;">Tulis ulasan, saran, atau pesan moral kamu 💬</p>
                    <textarea rows="4" placeholder="Tuliskan dukungan moralmu di sini..."></textarea>
                    <div class="feedback-row">
                        <div class="star-rating" id="starRating">
                            <span onclick="setRating(1)">⭐</span><span onclick="setRating(2)">⭐</span><span onclick="setRating(3)">⭐</span><span onclick="setRating(4)">⭐</span><span onclick="setRating(5)">⭐</span>
                        </div>
                        <button class="btn-submit">Kirim Ulasan</button>
                    </div>
                </div>
                <div class="ulasan-list">
                    <div class="ulasan-card">
                        <div class="ulasan-header"><div class="ulasan-avatar">B</div><div><div class="ulasan-name">Budi Santoso</div><div class="ulasan-time">2 jam lalu</div></div><div class="ulasan-stars">⭐⭐⭐⭐⭐</div></div>
                        <p class="ulasan-text">Semoga donasi ini benar-benar sampai ke yang membutuhkan. Platform yang sangat transparan dan mudah digunakan!</p>
                    </div>
                    <div class="ulasan-card">
                        <div class="ulasan-header"><div class="ulasan-avatar" style="background:var(--orange)">S</div><div><div class="ulasan-name">Siti Rahayu</div><div class="ulasan-time">1 hari lalu</div></div><div class="ulasan-stars">⭐⭐⭐⭐⭐</div></div>
                        <p class="ulasan-text">Alhamdulillah, bisa berbagi meski sedikit. Senang melihat perkembangan kampanye yang terbuka untuk publik.</p>
                    </div>
                    <div class="ulasan-card">
                        <div class="ulasan-header"><div class="ulasan-avatar" style="background:#6366F1">A</div><div><div class="ulasan-name">Ahmad Fauzi</div><div class="ulasan-time">3 hari lalu</div></div><div class="ulasan-stars">⭐⭐⭐⭐</div></div>
                        <p class="ulasan-text">Saran: tambahkan notifikasi saat kampanye yang saya dukung mencapai target. Overall sangat bagus!</p>
                    </div>
                </div>
            </div>
            <!-- RIWAYAT -->
            <div id="sub-riwayat" style="display:none;">
                <div class="log-filter-row">
                    <button class="log-filter active" onclick="filterLog(this)">Semua</button>
                    <button class="log-filter" onclick="filterLog(this)">💳 Dana</button>
                    <button class="log-filter" onclick="filterLog(this)">📦 Logistik</button>
                    <select class="target-select" style="padding:0.45rem 1rem;font-size:0.82rem;">
                        <option>Semua Panti/Bencana</option>
                        <option>Panti Asuhan Al-Ikhlas</option>
                        <option>Korban Banjir Kalsel</option>
                        <option>SDN Pelosok NTT</option>
                    </select>
                </div>
                <div style="overflow-x:auto;border-radius:12px;box-shadow:0 2px 12px rgba(13,110,110,0.08);">
                    <table class="log-table">
                        <thead><tr><th>Tanggal</th><th>Donatur</th><th>Tujuan</th><th>Jenis</th><th>Nominal / Barang</th></tr></thead>
                        <tbody>
                            <tr><td>06 Jun 2026</td><td>Budi S.</td><td>Panti Al-Ikhlas</td><td><span class="log-type-dana">Dana</span></td><td><strong>Rp 500.000</strong></td></tr>
                            <tr><td>05 Jun 2026</td><td>Anonim</td><td>Banjir Kalsel</td><td><span class="log-type-logistik">Logistik</span></td><td>5 kg Beras, Mie Instan</td></tr>
                            <tr><td>05 Jun 2026</td><td>Siti R.</td><td>SDN NTT</td><td><span class="log-type-dana">Dana</span></td><td><strong>Rp 150.000</strong></td></tr>
                            <tr><td>04 Jun 2026</td><td>Ahmad F.</td><td>Panti Al-Ikhlas</td><td><span class="log-type-logistik">Logistik</span></td><td>3 Dus Pakaian Layak Pakai</td></tr>
                            <tr><td>04 Jun 2026</td><td>Dewi K.</td><td>Banjir Kalsel</td><td><span class="log-type-dana">Dana</span></td><td><strong>Rp 1.000.000</strong></td></tr>
                            <tr><td>03 Jun 2026</td><td>Anonim</td><td>SDN NTT</td><td><span class="log-type-dana">Dana</span></td><td><strong>Rp 250.000</strong></td></tr>
                            <tr><td>03 Jun 2026</td><td>Rudi H.</td><td>Panti Al-Ikhlas</td><td><span class="log-type-logistik">Logistik</span></td><td>Obat-obatan (10 item)</td></tr>
                        </tbody>
                    </table>
                </div>
                <p style="text-align:center;color:var(--muted);font-size:0.82rem;margin-top:1rem;">Menampilkan 7 dari 1.240 riwayat donasi</p>
            </div>
        </div>
    </div>
</section>

<!-- KAMPANYE -->
<section class="section" id="campaign">
    <div class="sec-header">
        <div><div class="sec-lbl">Kampanye Pilihan</div><h2 class="sec-title">Bantu Mereka yang<br>Membutuhkan Hari Ini</h2><p class="sec-sub">Pilih kampanye yang menyentuh hatimu dan mulai berbagi kebaikan.</p></div>
        <a href="#" class="btn-link">Lihat Semua →</a>
    </div>
    <div class="camp-grid">
        <a href="#" class="camp-card reveal"><div class="camp-img">🏫<span class="camp-cat">Pendidikan</span></div><div class="camp-body"><div class="camp-org">Yayasan Cerdas Nusantara</div><div class="camp-title">Bangun Ruang Kelas di Pelosok NTT</div><div class="camp-prog-wrap"><div class="camp-prog" style="width:72%"></div></div><div class="camp-footer"><div><div class="camp-amount">Rp 72.000.000</div><div style="font-size:0.75rem;color:var(--muted)">dari Rp 100.000.000</div></div><div class="camp-days">14 hari lagi</div></div></div></a>
        <a href="#" class="camp-card reveal"><div class="camp-img">🏥<span class="camp-cat">Kesehatan</span></div><div class="camp-body"><div class="camp-org">Rumah Sehat Indonesia</div><div class="camp-title">Bantu Biaya Operasi Anak Kurang Mampu</div><div class="camp-prog-wrap"><div class="camp-prog" style="width:55%"></div></div><div class="camp-footer"><div><div class="camp-amount">Rp 27.500.000</div><div style="font-size:0.75rem;color:var(--muted)">dari Rp 50.000.000</div></div><div class="camp-days">21 hari lagi</div></div></div></a>
        <a href="#" class="camp-card reveal"><div class="camp-img">🌾<span class="camp-cat">Kemanusiaan</span></div><div class="camp-body"><div class="camp-org">Relawan Peduli Bangsa</div><div class="camp-title">Pangan untuk Korban Banjir Kalsel</div><div class="camp-prog-wrap"><div class="camp-prog" style="width:89%"></div></div><div class="camp-footer"><div><div class="camp-amount">Rp 89.000.000</div><div style="font-size:0.75rem;color:var(--muted)">dari Rp 100.000.000</div></div><div class="camp-days">5 hari lagi</div></div></div></a>
        <a href="#" class="camp-card reveal"><div class="camp-img">📚<span class="camp-cat">Pendidikan</span></div><div class="camp-body"><div class="camp-org">Beasiswa Pintar</div><div class="camp-title">Beasiswa untuk 50 Pelajar Berprestasi</div><div class="camp-prog-wrap"><div class="camp-prog" style="width:40%"></div></div><div class="camp-footer"><div><div class="camp-amount">Rp 40.000.000</div><div style="font-size:0.75rem;color:var(--muted)">dari Rp 100.000.000</div></div><div class="camp-days">30 hari lagi</div></div></div></a>
        <a href="#" class="camp-card reveal"><div class="camp-img">🌿<span class="camp-cat">Lingkungan</span></div><div class="camp-body"><div class="camp-org">Hijau Negeriku</div><div class="camp-title">Tanam 10.000 Pohon di Kalimantan</div><div class="camp-prog-wrap"><div class="camp-prog" style="width:63%"></div></div><div class="camp-footer"><div><div class="camp-amount">Rp 31.500.000</div><div style="font-size:0.75rem;color:var(--muted)">dari Rp 50.000.000</div></div><div class="camp-days">18 hari lagi</div></div></div></a>
        <a href="#" class="camp-card reveal"><div class="camp-img">👶<span class="camp-cat">Anak-Anak</span></div><div class="camp-body"><div class="camp-org">Sahabat Bocil</div><div class="camp-title">Gizi Baik untuk Anak-anak Stunting</div><div class="camp-prog-wrap"><div class="camp-prog" style="width:30%"></div></div><div class="camp-footer"><div><div class="camp-amount">Rp 15.000.000</div><div style="font-size:0.75rem;color:var(--muted)">dari Rp 50.000.000</div></div><div class="camp-days">45 hari lagi</div></div></div></a>
    </div>
</section>

<!-- CARA KERJA -->
<section class="cara-kerja" id="cara-kerja">
    <div class="sec-lbl">Mudah & Transparan</div>
    <h2 class="sec-title">Bagaimana Cara Kerjanya?</h2>
    <p class="sec-sub">Hanya beberapa langkah untuk mulai berbagi kebaikan kepada sesama.</p>
    <div class="steps-grid">
        <div class="step-card reveal"><div class="step-num">01</div><div class="step-icon">🔍</div><div class="step-title">Pilih Kampanye</div><p class="step-desc">Temukan kampanye sesuai kepedulianmu — pendidikan, kesehatan, lingkungan, atau kemanusiaan.</p></div>
        <div class="step-card reveal"><div class="step-num">02</div><div class="step-icon">💳</div><div class="step-title">Lakukan Donasi</div><p class="step-desc">Donasi aman dan mudah melalui berbagai metode: transfer bank, e-wallet, atau kartu kredit.</p></div>
        <div class="step-card reveal"><div class="step-num">03</div><div class="step-icon">📊</div><div class="step-title">Pantau Dampaknya</div><p class="step-desc">Ikuti perkembangan kampanye secara real-time dan terima laporan penggunaan dana yang transparan.</p></div>
        <div class="step-card reveal"><div class="step-num">04</div><div class="step-icon">🎯</div><div class="step-title">Sebarkan Kebaikan</div><p class="step-desc">Ajak teman dan keluarga bergabung. Semakin banyak yang berbagi, semakin besar dampaknya.</p></div>
    </div>
</section>

<!-- DAMPAK -->
<section class="section" id="dampak">
    <div class="dampak-grid">
        <div class="dampak-visual reveal">🤝<div class="dampak-metric"><span class="metric-num">98%</span><span class="metric-lbl">Dana Tepat Sasaran</span></div></div>
        <div class="reveal">
            <div class="sec-lbl">Dampak Nyata</div>
            <h2 class="sec-title">Kebaikan Kecilmu,<br>Dampak yang Besar</h2>
            <p class="sec-sub">Setiap rupiah dikelola dengan transparansi penuh dan disalurkan langsung kepada penerima manfaat.</p>
            <div class="impact-list">
                <div class="impact-item"><div class="impact-dot">🏫</div><div><div class="impact-t">1.200 Anak Dapat Beasiswa</div><div class="impact-d">Lebih dari seribu anak kurang mampu kini bisa melanjutkan pendidikan berkat donaturmu.</div></div></div>
                <div class="impact-item"><div class="impact-dot">🏥</div><div><div class="impact-t">850 Pasien Dibantu Operasi</div><div class="impact-d">Ratusan pasien kurang mampu telah mendapat pertolongan medis yang menyelamatkan nyawa.</div></div></div>
                <div class="impact-item"><div class="impact-dot">🌿</div><div><div class="impact-t">15.000 Pohon Tertanam</div><div class="impact-d">Bersama kita telah menghijaukan kembali lahan kritis di berbagai pulau Indonesia.</div></div></div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<div class="cta-wrap">
    <div class="cta-banner reveal">
        <div><div class="cta-title">Mulai Berbagi<br>Hari Ini Juga</div><p class="cta-desc">Bergabunglah bersama ribuan donatur lainnya dan jadilah bagian dari gerakan kebaikan nasional.</p></div>
        <a href="#" class="btn-white">♥ Donasi Sekarang</a>
    </div>
</div>

<!-- FOOTER -->
<footer class="footer">
    <p>© {{ date('Y') }} <strong style="color:#fff">Mari Berbagi</strong>. Dibuat dengan ♥ menggunakan Laravel.</p>
</footer>

<script>
    // Navbar scroll
    const nav = document.getElementById('navbar');
    window.addEventListener('scroll', () => nav.classList.toggle('scrolled', window.scrollY > 60));

    // Scroll reveal
    const obs = new IntersectionObserver((entries) => {
        entries.forEach((e, i) => {
            if (e.isIntersecting) {
                e.target.style.transitionDelay = (i * 0.07) + 's';
                e.target.classList.add('visible');
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

    // Tab switcher
    function switchTab(tab) {
        const tabBtns = document.querySelectorAll('.fitur-tab');
        const tabs = ['jenis','target','ulasan'];
        tabBtns.forEach((t, i) => t.classList.toggle('active', tabs[i] === tab));
        document.querySelectorAll('.fitur-panel').forEach(p => p.classList.remove('active'));
        document.getElementById('panel-' + tab).classList.add('active');
    }

    // Donasi card select
    function selectDonasi(el) {
        document.querySelectorAll('.donasi-card').forEach(c => c.classList.remove('selected'));
        el.classList.add('selected');
    }

    // Target select
    function selectTarget(el) {
        document.querySelectorAll('.target-card').forEach(c => c.classList.remove('selected'));
        el.classList.add('selected');
    }

    // Ulasan sub-tab
    function switchUlasan(sub, btn) {
        document.querySelectorAll('.ulasan-subtab').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        document.getElementById('sub-feedback').style.display = sub === 'feedback' ? 'block' : 'none';
        document.getElementById('sub-riwayat').style.display  = sub === 'riwayat'  ? 'block' : 'none';
    }

    // Log filter
    function filterLog(btn) {
        document.querySelectorAll('.log-filter').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
    }

    // Star rating
    function setRating(n) {
        document.querySelectorAll('#starRating span').forEach((s, i) => s.style.opacity = i < n ? '1' : '0.35');
    }
</script>
</body>
</html>