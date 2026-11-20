<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Portal Berita')</title>
    <style>
        :root {
            --bg: #f5f7fb;
            --surface: #ffffff;
            --ink: #0f172a;
            --muted: #64748b;
            --line: #e6eaf2;
            --accent: #2563eb;
            --accent-dark: #1d4ed8;
            --accent-soft: #eff6ff;
            --danger: #dc2626;
            --shadow-sm: 0 1px 2px rgba(16, 24, 40, .05);
            --shadow-md: 0 10px 30px rgba(16, 24, 40, .08);
            --shadow-lg: 0 24px 60px rgba(16, 24, 40, .12);
            --radius: 16px;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: var(--ink);
            background: var(--bg);
            line-height: 1.6;
        }

        a { color: var(--accent); text-decoration: none; }
        a:hover { text-decoration: underline; }

        /* Full-width header + wide container */
        .site-header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(255, 255, 255, .88);
            border-bottom: 1px solid var(--line);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }

        .navbar-inner {
            max-width: 1440px;
            margin: 0 auto;
            padding: .9rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1.25rem;
            flex-wrap: wrap;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: .6rem;
            color: var(--ink);
            font-size: 1.15rem;
            font-weight: 800;
            letter-spacing: -.02em;
            text-decoration: none;
        }
        .brand:hover { text-decoration: none; }
        .brand-mark {
            display: grid;
            place-items: center;
            width: 2.35rem;
            height: 2.35rem;
            border-radius: .75rem;
            color: #fff;
            background: linear-gradient(135deg, #1d4ed8, #2563eb 55%, #0ea5e9);
            box-shadow: 0 10px 24px rgba(37, 99, 235, .28);
        }

        .nav-links { display: flex; align-items: center; gap: .25rem; flex-wrap: wrap; }
        .nav-link {
            display: inline-flex;
            align-items: center;
            padding: .55rem .85rem;
            border-radius: .65rem;
            color: #334155;
            font-size: .92rem;
            font-weight: 700;
            text-decoration: none;
            transition: background .2s ease, color .2s ease;
        }
        .nav-link:hover { background: #f1f5f9; color: var(--accent); text-decoration: none; }
        .nav-link.active { color: var(--accent-dark); background: var(--accent-soft); }

        .nav-right { display: flex; align-items: center; gap: .6rem; flex-wrap: wrap; margin-left: auto; }
        .user-pill {
            display: inline-flex;
            align-items: center;
            gap: .55rem;
            max-width: 14rem;
            padding: .35rem .8rem .35rem .4rem;
            border: 1px solid var(--line);
            border-radius: 999px;
            background: var(--surface);
            color: #334155;
            font-size: .85rem;
            font-weight: 700;
        }
        .user-avatar {
            display: grid;
            place-items: center;
            width: 2rem;
            height: 2rem;
            border-radius: 999px;
            color: #fff;
            background: linear-gradient(135deg, #2563eb, #0ea5e9);
            font-size: .8rem;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            padding: .7rem 1.05rem;
            border: 1px solid transparent;
            border-radius: .7rem;
            font-size: .9rem;
            font-weight: 800;
            text-decoration: none;
            cursor: pointer;
            transition: transform .18s ease, box-shadow .18s ease, background .18s ease, border-color .18s ease, color .18s ease;
        }
        .btn:hover { text-decoration: none; transform: translateY(-1px); }
        .btn-primary { color: #fff; background: var(--accent); box-shadow: 0 10px 24px rgba(37, 99, 235, .24); }
        .btn-primary:hover { background: var(--accent-dark); box-shadow: 0 14px 30px rgba(37, 99, 235, .3); }
        .btn-ghost { color: #334155; background: var(--surface); border-color: #dbe3ee; }
        .btn-ghost:hover { border-color: #bfdbfe; color: var(--accent-dark); background: #f8fbff; }
        .btn-danger { color: var(--danger); background: #fef2f2; border-color: #fecaca; }
        .btn-danger:hover { background: #fee2e2; border-color: #fca5a5; }
        .btn-sm { padding: .5rem .8rem; font-size: .82rem; }

        /* Layout */
        .container { max-width: 1440px; margin: 0 auto; padding: 1.75rem 1.5rem 4rem; }
        main { min-width: 0; }
        .page-section { margin-bottom: 2rem; }

        .card {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            padding: 1.5rem;
        }

        .section-head { display: flex; align-items: flex-end; justify-content: space-between; gap: 1rem; flex-wrap: wrap; margin: 0 0 1.25rem; }
        .section-title { margin: 0; font-size: 1.55rem; letter-spacing: -.025em; }
        .section-sub { margin: .25rem 0 0; color: var(--muted); }
        .eyebrow { display: inline-block; margin-bottom: .5rem; color: var(--accent-dark); font-size: .75rem; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; }

        .hero { display: grid; grid-template-columns: minmax(0, 1.35fr) minmax(280px, .65fr); gap: 1.5rem; align-items: stretch; margin-bottom: 2rem; }
        @media (max-width: 980px) { .hero { grid-template-columns: 1fr; } }
        .hero h1 { margin: .5rem 0 .75rem; font-size: clamp(2rem, 3.6vw, 3.2rem); line-height: 1.08; letter-spacing: -.04em; }
        .hero p { color: #475569; font-size: 1.02rem; }
        .hero-actions { display: flex; flex-wrap: wrap; gap: .75rem; margin-top: 1.25rem; }
        .hero-side { display: grid; gap: .85rem; align-content: center; }
        .mini-stat { display: flex; align-items: center; justify-content: space-between; gap: 1rem; padding: 1rem 1.1rem; border: 1px solid #dbeafe; border-radius: 14px; background: linear-gradient(135deg, #eff6ff, #f8fafc); }
        .mini-stat strong { font-size: 1.35rem; letter-spacing: -.03em; }
        .mini-label { color: var(--muted); font-size: .8rem; font-weight: 800; text-transform: uppercase; letter-spacing: .06em; }

        /* Responsive article grid: 3 desktop / 2 tablet / 1 mobile */
        .news-grid { display: grid; gap: 1.5rem; grid-template-columns: repeat(3, minmax(0, 1fr)); }
        @media (max-width: 1180px) { .news-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        @media (max-width: 760px) { .news-grid { grid-template-columns: 1fr; } }

        .article-card {
            display: flex;
            flex-direction: column;
            overflow: hidden;
            padding: 0;
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease;
        }
        .article-card:hover { transform: translateY(-4px); border-color: #bfdbfe; box-shadow: var(--shadow-md); }
        .article-card .thumb { width: 100%; aspect-ratio: 16 / 10; object-fit: cover; background: #eef2f7; display: block; }
        .article-card .article-body { display: flex; flex-direction: column; gap: .55rem; padding: 1.1rem 1.2rem 1.25rem; flex: 1; }
        .article-card h3 { margin: 0; font-size: 1.12rem; line-height: 1.35; letter-spacing: -.015em; }
        .article-card h3 a { color: var(--ink); text-decoration: none; }
        .article-card h3 a:hover { color: var(--accent); text-decoration: none; }
        .meta { color: var(--muted); font-size: .8rem; font-weight: 600; }
        .excerpt { color: #475569; font-size: .92rem; line-height: 1.65; }
        .article-footer { margin-top: auto; display: flex; align-items: center; justify-content: space-between; gap: .75rem; padding-top: .75rem; border-top: 1px solid var(--line); }

        /* Dashboard stats */
        .stat-grid { display: grid; gap: 1rem; grid-template-columns: repeat(3, minmax(0, 1fr)); margin-bottom: 1.5rem; }
        @media (max-width: 980px) { .stat-grid { grid-template-columns: 1fr; } }
        .stat-card { display: grid; gap: .35rem; }
        .stat-value { font-size: 2rem; font-weight: 900; letter-spacing: -.04em; color: var(--accent-dark); }
        .stat-label { color: var(--muted); font-size: .85rem; font-weight: 800; text-transform: uppercase; letter-spacing: .05em; }

        .quick-list { display: grid; gap: .6rem; margin: .75rem 0 0; padding: 0; list-style: none; }
        .quick-list a {
            display: flex; align-items: center; justify-content: space-between; gap: .75rem;
            padding: .75rem .9rem; border: 1px solid var(--line); border-radius: .75rem;
            color: #334155; font-weight: 800; text-decoration: none; background: #fbfdff;
            transition: border-color .2s ease, transform .2s ease, box-shadow .2s ease;
        }
        .quick-list a:hover { border-color: #bfdbfe; transform: translateY(-2px); box-shadow: var(--shadow-sm); color: var(--accent-dark); text-decoration: none; }
        .account-list { margin: .75rem 0 0; padding-left: 1.1rem; color: #334155; }
        .account-list li { margin: .3rem 0; }
        .account-list strong { color: var(--ink); }

        /* Article list (index) */
        .article-list { display: grid; gap: 1rem; }
        .article-row {
            display: grid;
            grid-template-columns: 220px minmax(0, 1fr) auto;
            gap: 1.25rem;
            align-items: center;
            padding: 1rem;
            border: 1px solid var(--line);
            border-radius: var(--radius);
            background: var(--surface);
            box-shadow: var(--shadow-sm);
            transition: border-color .2s ease, box-shadow .2s ease, transform .2s ease;
        }
        .article-row:hover { border-color: #bfdbfe; box-shadow: var(--shadow-md); transform: translateY(-2px); }
        .article-row img { width: 220px; height: 140px; object-fit: cover; border-radius: .85rem; background: #eef2f7; }
        .article-row h3 { margin: 0 0 .35rem; font-size: 1.08rem; }
        .article-row h3 a { color: var(--ink); text-decoration: none; }
        .article-row h3 a:hover { color: var(--accent); }
        .article-actions { display: flex; gap: .5rem; flex-wrap: wrap; justify-content: flex-end; }
        @media (max-width: 900px) { .article-row { grid-template-columns: 1fr; } .article-row img { width: 100%; height: 180px; } .article-actions { justify-content: flex-start; } }

        /* Detail article */
        .detail-wrap { max-width: 920px; margin: 0 auto; }
        .detail-hero { overflow: hidden; padding: 0; }
        .detail-hero img { width: 100%; max-height: 460px; object-fit: cover; display: block; background: #eef2f7; }
        .detail-body { padding: 1.75rem 2rem 2rem; }
        .detail-title { margin: .6rem 0 .4rem; font-size: clamp(1.8rem, 3.2vw, 2.7rem); line-height: 1.15; letter-spacing: -.035em; }
        .detail-meta { color: var(--muted); font-size: .9rem; }
        .detail-content { margin-top: 1.5rem; color: #334155; line-height: 1.85; font-size: 1.02rem; }
        .detail-actions { margin-top: 1.75rem; display: flex; flex-wrap: wrap; gap: .75rem; align-items: center; }
        .detail-actions .sep { color: #cbd5e1; }

        /* Forms */
        .muted { color: var(--muted); }
        .flash { margin: 1rem 0; padding: .85rem 1rem; border: 1px solid #a7f3d0; border-radius: .85rem; background: #ecfdf5; color: #047857; font-weight: 700; }
        .error { margin: 1rem 0; padding: .85rem 1rem; border: 1px solid #fecaca; border-radius: .85rem; background: #fef2f2; color: var(--danger); font-weight: 700; }
        .error ul { margin: .45rem 0 0; padding-left: 1.2rem; }
        form.inline { display: inline; }

        label { display: block; margin: .9rem 0 .4rem; color: #334155; font-size: .88rem; font-weight: 800; }
        input[type="text"], input[type="email"], input[type="password"], input[type="url"], textarea {
            width: 100%;
            padding: .8rem .95rem;
            border: 1px solid #dbe3ee;
            border-radius: .75rem;
            background: #fff;
            color: var(--ink);
            font: inherit;
            transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, input[type="url"]:focus, textarea:focus {
            outline: none;
            border-color: #93c5fd;
            background: #fbfdff;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .12);
        }
        textarea { min-height: 160px; resize: vertical; }
        .form-actions { display: flex; flex-wrap: wrap; gap: .75rem; margin-top: 1.25rem; }
        .check-row { display: flex; align-items: center; gap: .55rem; margin-top: 1rem; color: #475569; font-weight: 700; }
        .check-row input { width: 1rem; height: 1rem; accent-color: var(--accent); }

        .auth-wrap { max-width: 520px; margin: 0 auto; }
        .auth-card { padding: 2rem; }
        .auth-links { margin-top: 1.25rem; color: var(--muted); font-weight: 700; }
        .auth-links a { color: var(--accent); font-weight: 800; }

        .empty { padding: 1rem 0; color: var(--muted); }

        .pagination { display: flex; flex-wrap: wrap; gap: .4rem; margin-top: 1.5rem; padding: 0; list-style: none; }
        .pagination li span, .pagination li a { display: inline-grid; place-items: center; min-width: 2.3rem; height: 2.3rem; padding: 0 .65rem; border: 1px solid var(--line); border-radius: .7rem; color: #334155; background: #fff; font-weight: 800; text-decoration: none; transition: border-color .2s ease, color .2s ease, background .2s ease; }
        .pagination li a:hover { border-color: #bfdbfe; color: var(--accent-dark); text-decoration: none; }
        .pagination li.active span { color: #fff; background: var(--accent); border-color: var(--accent); }
        .pagination li.disabled span { color: #94a3b8; background: #f8fafc; }

        footer { margin-top: 2.5rem; padding-top: 1.25rem; border-top: 1px solid var(--line); color: var(--muted); font-size: .85rem; display: flex; justify-content: space-between; gap: 1rem; flex-wrap: wrap; }

        @media (max-width: 720px) {
            .container { padding: 1.25rem 1rem 3rem; }
            .navbar-inner { padding: .8rem 1rem; }
            .card, .auth-card { padding: 1.15rem; }
            .btn { width: 100%; }
            .nav-right .btn { width: auto; }
        }
    </style>
</head>
<body>
    <header class="site-header">
        @include('partials.nav')
    </header>

    <div class="container">
        <main>
            @yield('content')
        </main>

        <footer>
            <span>&copy; {{ date('Y') }} Portal Berita</span>
            <span>Laravel CRUD + Blade</span>
        </footer>
    </div>
</body>
</html>
