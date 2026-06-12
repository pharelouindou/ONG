<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin') — ADéProG</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --accent:    #e8630a;
            --accent-dk: #c4520a;
            --bg:        #0f1117;
            --surface:   #1a1d27;
            --surface2:  #222636;
            --border:    #2e3347;
            --text:      #e2e8f0;
            --muted:     #8892a4;
            --success:   #22c55e;
            --danger:    #ef4444;
            --sidebar-w: 240px;
            --radius:    8px;
        }

        body { font-family: 'Inter', system-ui, sans-serif; background: var(--bg); color: var(--text); min-height: 100vh; display: flex; }

        /* ── Sidebar ── */
        .sidebar {
            width: var(--sidebar-w); background: var(--surface); border-right: 1px solid var(--border);
            display: flex; flex-direction: column; position: fixed; top: 0; left: 0; height: 100vh; z-index: 100;
        }
        .sidebar-brand {
            padding: 1.25rem 1.25rem 1rem;
            border-bottom: 1px solid var(--border);
            display: flex; align-items: center; gap: .75rem;
        }
        .sidebar-brand img { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; }
        .sidebar-brand-text { font-weight: 700; font-size: .95rem; line-height: 1.2; }
        .sidebar-brand-text span { display: block; font-size: .72rem; color: var(--muted); font-weight: 400; }

        .sidebar-nav { padding: 1rem .75rem; flex: 1; overflow-y: auto; }
        .sidebar-label { font-size: .65rem; text-transform: uppercase; letter-spacing: .1em; color: var(--muted); padding: .75rem .5rem .25rem; }
        .sidebar-link {
            display: flex; align-items: center; gap: .6rem;
            padding: .55rem .75rem; border-radius: var(--radius);
            color: var(--muted); text-decoration: none; font-size: .875rem;
            transition: background .15s, color .15s;
        }
        .sidebar-link:hover, .sidebar-link.active {
            background: var(--surface2); color: var(--text);
        }
        .sidebar-link.active { color: var(--accent); }
        .sidebar-link svg { flex-shrink: 0; opacity: .7; }
        .sidebar-link.active svg, .sidebar-link:hover svg { opacity: 1; }

        .sidebar-footer { padding: 1rem .75rem; border-top: 1px solid var(--border); }
        .sidebar-footer form { display: inline; }
        .sidebar-footer button {
            display: flex; align-items: center; gap: .5rem; width: 100%;
            padding: .5rem .75rem; border: none; background: none; color: var(--muted);
            font-size: .875rem; cursor: pointer; border-radius: var(--radius);
            transition: background .15s, color .15s;
        }
        .sidebar-footer button:hover { background: var(--surface2); color: var(--danger); }

        /* ── Main layout ── */
        .admin-main { margin-left: var(--sidebar-w); flex: 1; display: flex; flex-direction: column; min-height: 100vh; }

        .admin-topbar {
            background: var(--surface); border-bottom: 1px solid var(--border);
            padding: .9rem 1.5rem; display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 50;
        }
        .admin-topbar h1 { font-size: 1.05rem; font-weight: 600; }
        .admin-topbar .user-chip {
            display: flex; align-items: center; gap: .5rem; font-size: .825rem; color: var(--muted);
        }
        .admin-topbar .user-chip span { color: var(--text); font-weight: 500; }

        .admin-content { padding: 2rem 1.5rem; flex: 1; }

        /* ── Flash messages ── */
        .flash { padding: .75rem 1rem; border-radius: var(--radius); margin-bottom: 1.25rem; font-size: .875rem; }
        .flash-success { background: rgba(34,197,94,.15); border: 1px solid rgba(34,197,94,.3); color: #86efac; }
        .flash-error   { background: rgba(239,68,68,.15);  border: 1px solid rgba(239,68,68,.3);  color: #fca5a5; }

        /* ── Cards / Stats ── */
        .stat-cards { display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 1rem; margin-bottom: 2rem; }
        .stat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); padding: 1.25rem; }
        .stat-card-value { font-size: 2rem; font-weight: 700; color: var(--accent); }
        .stat-card-label { font-size: .8rem; color: var(--muted); margin-top: .25rem; }

        /* ── Tables ── */
        .table-wrap { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        thead { background: var(--surface2); }
        th { padding: .75rem 1rem; text-align: left; font-size: .75rem; text-transform: uppercase; letter-spacing: .05em; color: var(--muted); }
        td { padding: .75rem 1rem; font-size: .875rem; border-top: 1px solid var(--border); vertical-align: middle; }
        tr:hover td { background: rgba(255,255,255,.02); }
        .badge { display: inline-block; padding: .2rem .55rem; border-radius: 99px; font-size: .7rem; font-weight: 600; }
        .badge-green { background: rgba(34,197,94,.15); color: #86efac; }
        .badge-gray  { background: rgba(100,116,139,.15); color: #94a3b8; }

        /* ── Buttons ── */
        .btn-admin { display: inline-flex; align-items: center; gap: .4rem; padding: .5rem 1rem; border-radius: var(--radius); font-size: .85rem; font-weight: 500; cursor: pointer; text-decoration: none; border: none; transition: opacity .15s, background .15s; }
        .btn-accent  { background: var(--accent); color: #fff; }
        .btn-accent:hover  { background: var(--accent-dk); }
        .btn-outline-sm { background: transparent; border: 1px solid var(--border); color: var(--text); font-size: .78rem; padding: .35rem .75rem; }
        .btn-outline-sm:hover { border-color: var(--accent); color: var(--accent); }
        .btn-danger-sm { background: transparent; border: 1px solid rgba(239,68,68,.4); color: #fca5a5; font-size: .78rem; padding: .35rem .75rem; }
        .btn-danger-sm:hover { background: rgba(239,68,68,.15); }

        /* ── Section header ── */
        .admin-section-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem; }
        .admin-section-header h2 { font-size: 1.05rem; font-weight: 600; }

        /* ── Forms ── */
        .form-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); padding: 1.5rem; max-width: 720px; }
        .form-group { margin-bottom: 1.1rem; }
        .form-group label { display: block; font-size: .8rem; color: var(--muted); margin-bottom: .4rem; }
        .form-control {
            width: 100%; background: var(--bg); border: 1px solid var(--border); color: var(--text);
            border-radius: var(--radius); padding: .55rem .8rem; font-size: .875rem;
            transition: border-color .15s;
        }
        .form-control:focus { outline: none; border-color: var(--accent); }
        textarea.form-control { resize: vertical; min-height: 120px; }
        .form-check { display: flex; align-items: center; gap: .5rem; }
        .form-check input { accent-color: var(--accent); width: 16px; height: 16px; }
        .form-actions { display: flex; gap: .75rem; margin-top: 1.5rem; }
        .form-hint { font-size: .75rem; color: var(--muted); margin-top: .3rem; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .stat-row-group { display: flex; flex-direction: column; gap: .5rem; }
        .stat-row { display: grid; grid-template-columns: 1fr 2fr auto; gap: .5rem; align-items: center; }
        .btn-icon { background: none; border: 1px solid var(--border); color: var(--muted); border-radius: var(--radius); padding: .4rem .6rem; cursor: pointer; font-size: .75rem; }
        .btn-icon:hover { border-color: var(--danger); color: var(--danger); }

        /* ── Pagination ── */
        .pagination-wrap { padding: 1rem; border-top: 1px solid var(--border); }
        .pagination-wrap nav { display: flex; gap: .35rem; }

        /* ── Error list ── */
        .error-list { background: rgba(239,68,68,.1); border: 1px solid rgba(239,68,68,.3); border-radius: var(--radius); padding: .75rem 1rem; margin-bottom: 1rem; }
        .error-list li { font-size: .825rem; color: #fca5a5; list-style: disc; margin-left: 1rem; }
    </style>
    @stack('styles')
</head>
<body>

{{-- ── Sidebar ──────────────────────────────────────────────────────────────── --}}
<aside class="sidebar">
    <div class="sidebar-brand">
        <img src="{{ asset(config('site.images.logo')) }}" alt="ADéProG" />
        <div class="sidebar-brand-text">
            ADéProG<span>Espace administration</span>
        </div>
    </div>

    <nav class="sidebar-nav">
        <div class="sidebar-label">Général</div>
        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
            Tableau de bord
        </a>

        <div class="sidebar-label">Contenu</div>
        <a href="{{ route('admin.articles.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
            Actualités
        </a>
        <a href="{{ route('admin.projects.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            Projets
        </a>
        <a href="{{ route('admin.documents.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.documents.*') ? 'active' : '' }}">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><polyline points="13 2 13 9 20 9"/></svg>
            Documents
        </a>

        <div class="sidebar-label">Site public</div>
        <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            Voir le site
        </a>
    </nav>

    <div class="sidebar-footer">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Déconnexion
            </button>
        </form>
    </div>
</aside>

{{-- ── Main ──────────────────────────────────────────────────────────────────── --}}
<main class="admin-main">
    <div class="admin-topbar">
        <h1>@yield('page_title', 'Administration')</h1>
        <div class="user-chip">
            Connecté en tant que <span>{{ Auth::user()->name }}</span>
        </div>
    </div>

    <div class="admin-content">
        @if(session('success'))
            <div class="flash flash-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="flash flash-error">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>
</main>

@stack('scripts')
</body>
</html>
