<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Dashboard') — Admin | {{ config('app.name') }}</title>
  <style>
    :root {
      --admin-sidebar-bg: #0f172a;
      --admin-sidebar-border: #1e293b;
      --admin-sidebar-text: #94a3b8;
      --admin-sidebar-hover: #e2e8f0;
      --admin-sidebar-active-bg: #1e3a5f;
      --admin-sidebar-active-border: #38bdf8;
      --admin-accent: #0ea5e9;
      --admin-accent-hover: #0284c7;
      --admin-main-bg: #f1f5f9;
      --admin-card-bg: #ffffff;
      --admin-card-border: #e2e8f0;
      --admin-text: #0f172a;
      --admin-muted: #64748b;
      --admin-danger: #dc2626;
      --admin-danger-hover: #b91c1c;
      --admin-success-bg: #ecfdf5;
      --admin-success-text: #047857;
      --admin-radius: 10px;
      --admin-radius-sm: 8px;
      --admin-shadow: 0 1px 3px rgba(15, 23, 42, 0.08);
      --admin-shadow-lg: 0 10px 40px -10px rgba(15, 23, 42, 0.15);
      --admin-sidebar-width: 260px;
    }

    *, *::before, *::after { box-sizing: border-box; }

    body.admin-body {
      margin: 0;
      min-height: 100vh;
      font-family: ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
      font-size: 15px;
      line-height: 1.5;
      color: var(--admin-text);
      background: var(--admin-main-bg);
    }

    .admin-shell {
      display: flex;
      min-height: 100vh;
    }

    /* ——— Sidebar ——— */
    .admin-sidebar {
      width: var(--admin-sidebar-width);
      flex-shrink: 0;
      background: var(--admin-sidebar-bg);
      border-right: 1px solid var(--admin-sidebar-border);
      display: flex;
      flex-direction: column;
      position: fixed;
      inset: 0 auto 0 0;
      z-index: 200;
      transition: transform 0.22s ease;
    }

    .admin-sidebar__brand {
      padding: 1.25rem 1.25rem 1rem;
      border-bottom: 1px solid var(--admin-sidebar-border);
    }

    .admin-sidebar__brand-link {
      text-decoration: none;
      color: #f8fafc;
      display: block;
    }

    .admin-sidebar__brand-name {
      font-weight: 700;
      font-size: 1.05rem;
      letter-spacing: -0.02em;
      line-height: 1.25;
    }

    .admin-sidebar__brand-tag {
      font-size: 0.7rem;
      text-transform: uppercase;
      letter-spacing: 0.12em;
      color: var(--admin-sidebar-text);
      margin-top: 0.35rem;
    }

    .admin-sidebar__nav {
      flex: 1;
      padding: 0.75rem 0.65rem;
      overflow-y: auto;
    }

    .admin-sidebar__label {
      font-size: 0.65rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      color: #64748b;
      padding: 0.75rem 0.85rem 0.35rem;
    }

    .admin-nav__link {
      display: flex;
      align-items: center;
      gap: 0.65rem;
      padding: 0.65rem 0.85rem;
      margin-bottom: 2px;
      border-radius: var(--admin-radius-sm);
      color: var(--admin-sidebar-text);
      text-decoration: none;
      font-size: 0.9rem;
      font-weight: 500;
      border-left: 3px solid transparent;
      transition: background 0.15s, color 0.15s, border-color 0.15s;
    }

    .admin-nav__link:hover {
      background: rgba(255, 255, 255, 0.06);
      color: var(--admin-sidebar-hover);
    }

    .admin-nav__link.is-active {
      background: var(--admin-sidebar-active-bg);
      color: #f0f9ff;
      border-left-color: var(--admin-sidebar-active-border);
    }

    .admin-nav__icon {
      width: 1.35rem;
      text-align: center;
      font-size: 1.1rem;
      opacity: 0.95;
    }

    .admin-sidebar__footer {
      padding: 1rem 0.85rem;
      border-top: 1px solid var(--admin-sidebar-border);
    }

    .admin-sidebar__footer .admin-nav__link {
      margin-bottom: 0.35rem;
    }

    .admin-sidebar__logout {
      width: 100%;
      margin-top: 0.5rem;
      padding: 0.6rem 0.85rem;
      border-radius: var(--admin-radius-sm);
      border: 1px solid #334155;
      background: transparent;
      color: #cbd5e1;
      font: inherit;
      font-size: 0.875rem;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.15s, border-color 0.15s, color 0.15s;
    }

    .admin-sidebar__logout:hover {
      background: rgba(220, 38, 38, 0.15);
      border-color: rgba(248, 113, 113, 0.4);
      color: #fecaca;
    }

    .admin-sidebar__backdrop {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(15, 23, 42, 0.45);
      z-index: 150;
      opacity: 0;
      transition: opacity 0.2s ease;
    }

    .admin-sidebar__backdrop.is-visible {
      display: block;
      opacity: 1;
    }

    /* ——— Main ——— */
    .admin-main {
      flex: 1;
      margin-left: var(--admin-sidebar-width);
      min-width: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .admin-topbar {
      position: sticky;
      top: 0;
      z-index: 50;
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 0.85rem 1.5rem;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--admin-card-border);
      box-shadow: var(--admin-shadow);
    }

    .admin-menu-toggle {
      display: none;
      align-items: center;
      justify-content: center;
      width: 2.5rem;
      height: 2.5rem;
      padding: 0;
      border: 1px solid var(--admin-card-border);
      border-radius: var(--admin-radius-sm);
      background: #fff;
      cursor: pointer;
      color: var(--admin-text);
    }

    .admin-menu-toggle:hover {
      background: #f8fafc;
    }

    .admin-topbar__title {
      font-size: 1.15rem;
      font-weight: 700;
      letter-spacing: -0.02em;
      color: var(--admin-text);
    }

    .admin-content {
      flex: 1;
      padding: 1.5rem;
      max-width: 1200px;
      width: 100%;
      margin: 0 auto;
    }

    .admin-alert {
      padding: 0.85rem 1rem;
      border-radius: var(--admin-radius-sm);
      margin-bottom: 1.25rem;
      background: var(--admin-success-bg);
      color: var(--admin-success-text);
      font-size: 0.9rem;
      border: 1px solid #a7f3d0;
    }

    .admin-card,
    .admin-content .card {
      background: var(--admin-card-bg);
      border-radius: var(--admin-radius);
      padding: 1.35rem 1.5rem;
      margin-bottom: 1.25rem;
      border: 1px solid var(--admin-card-border);
      box-shadow: var(--admin-shadow);
    }

    .admin-card h2:first-child,
    .admin-card h1:first-child,
    .admin-content .card h2:first-child,
    .admin-content .card h1:first-child {
      margin-top: 0;
    }

    .admin-muted,
    .admin-content .muted {
      color: var(--admin-muted);
      font-size: 0.875rem;
    }

    table.admin-table,
    .admin-content .card table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.9rem;
    }

    .admin-table-wrap {
      overflow-x: auto;
      margin: 0 -0.25rem;
    }

    .admin-table th,
    .admin-table td,
    .admin-content .card table th,
    .admin-content .card table td {
      text-align: left;
      padding: 0.65rem 0.75rem;
      border-bottom: 1px solid var(--admin-card-border);
      vertical-align: middle;
    }

    .admin-table th,
    .admin-content .card table th {
      font-size: 0.72rem;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      color: var(--admin-muted);
      font-weight: 600;
      background: #f8fafc;
    }

    .admin-table tr:last-child td,
    .admin-content .card table tr:last-child td {
      border-bottom: none;
    }

    .admin-table tbody tr:hover td,
    .admin-content .card table tbody tr:hover td {
      background: #fafbfc;
    }

    .admin-content .card[style*="padding:0"] {
      padding: 0 !important;
    }

    .admin-content .card[style*="padding:0"] table th:first-child,
    .admin-content .card[style*="padding:0"] table td:first-child {
      padding-left: 1rem;
    }

    .admin-content .card[style*="padding:0"] table th:last-child,
    .admin-content .card[style*="padding:0"] table td:last-child {
      padding-right: 1rem;
    }

    .admin-page-head {
      margin-bottom: 1.5rem;
    }

    .admin-page-head h1 {
      margin: 0 0 0.35rem;
      font-size: 1.5rem;
      font-weight: 800;
      letter-spacing: -0.03em;
    }

    .admin-page-actions {
      margin-top: 1rem;
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      align-items: center;
    }

    label.admin-label {
      display: block;
      margin-top: 1rem;
      font-weight: 600;
      font-size: 0.8rem;
      color: var(--admin-text);
    }

    label.admin-label:first-of-type {
      margin-top: 0;
    }

    .admin-input,
    .admin-textarea,
    .admin-select {
      width: 100%;
      max-width: 32rem;
      margin-top: 0.35rem;
      padding: 0.55rem 0.75rem;
      border: 1px solid var(--admin-card-border);
      border-radius: var(--admin-radius-sm);
      font: inherit;
      background: #fff;
      transition: border-color 0.15s, box-shadow 0.15s;
    }

    .admin-input:focus,
    .admin-textarea:focus,
    .admin-select:focus {
      outline: none;
      border-color: var(--admin-accent);
      box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.2);
    }

    .admin-textarea { min-height: 110px; resize: vertical; }

    .admin-content .card label {
      display: block;
      margin-top: 0.85rem;
      font-weight: 600;
      font-size: 0.8rem;
      color: var(--admin-text);
    }

    .admin-content .card label:first-of-type {
      margin-top: 0;
    }

    .admin-content .card input[type="text"],
    .admin-content .card input[type="email"],
    .admin-content .card input[type="url"],
    .admin-content .card input[type="number"],
    .admin-content .card input[type="password"],
    .admin-content .card input[type="date"],
    .admin-content .card textarea,
    .admin-content .card select {
      width: 100%;
      max-width: 32rem;
      margin-top: 0.35rem;
      padding: 0.55rem 0.75rem;
      border: 1px solid var(--admin-card-border);
      border-radius: var(--admin-radius-sm);
      font: inherit;
      background: #fff;
      box-sizing: border-box;
      transition: border-color 0.15s, box-shadow 0.15s;
    }

    .admin-content .card input[type="file"] {
      margin-top: 0.35rem;
      font-size: 0.85rem;
    }

    .admin-content .card input:focus,
    .admin-content .card textarea:focus,
    .admin-content .card select:focus {
      outline: none;
      border-color: var(--admin-accent);
      box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.2);
    }

    .admin-content .card textarea {
      min-height: 100px;
      resize: vertical;
    }

    .admin-content .card form .btn {
      margin-top: 0.75rem;
    }

    .admin-content .card form .btn--outline {
      margin-top: 0.75rem;
    }

    .admin-content h1 {
      margin-top: 0;
      font-size: 1.35rem;
      font-weight: 800;
      letter-spacing: -0.02em;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.35rem;
      padding: 0.55rem 1.1rem;
      border-radius: var(--admin-radius-sm);
      border: none;
      cursor: pointer;
      font: inherit;
      font-weight: 600;
      font-size: 0.875rem;
      text-decoration: none;
      transition: background 0.15s, transform 0.1s;
      background: var(--admin-accent);
      color: #fff;
    }

    .btn:active { transform: scale(0.98); }

    .btn--primary {
      background: var(--admin-accent);
      color: #fff;
    }

    .btn--primary:hover {
      background: var(--admin-accent-hover);
    }

    .btn:hover:not(.btn--outline):not(.btn--danger) {
      background: var(--admin-accent-hover);
    }

    .btn--outline {
      background: #fff;
      color: var(--admin-text);
      border: 1px solid var(--admin-card-border);
    }

    .btn--outline:hover {
      background: #f8fafc;
    }

    .btn--danger {
      background: var(--admin-danger);
      color: #fff;
    }

    .btn--danger:hover {
      background: var(--admin-danger-hover);
    }

    .btn--sm {
      padding: 0.35rem 0.65rem;
      font-size: 0.8rem;
    }

    .thumb {
      max-width: 120px;
      max-height: 120px;
      object-fit: cover;
      border-radius: var(--admin-radius-sm);
      margin-top: 0.35rem;
      border: 1px solid var(--admin-card-border);
    }

    .admin-pagination {
      margin-top: 1rem;
      font-size: 0.875rem;
    }

    .admin-pagination a {
      color: var(--admin-accent);
    }

    @media (max-width: 900px) {
      .admin-sidebar {
        transform: translateX(-100%);
      }

      .admin-sidebar.is-open {
        transform: translateX(0);
        box-shadow: var(--admin-shadow-lg);
      }

      .admin-main {
        margin-left: 0;
      }

      .admin-menu-toggle {
        display: inline-flex;
      }
    }
  </style>
</head>
<body class="admin-body">
  <div class="admin-shell">
    <aside class="admin-sidebar" id="admin-sidebar" aria-label="Admin navigation">
      <div class="admin-sidebar__brand">
        <a href="{{ route('admin.dashboard') }}" class="admin-sidebar__brand-link">
          <div class="admin-sidebar__brand-name">{{ config('app.name') }}</div>
          <div class="admin-sidebar__brand-tag">Admin</div>
        </a>
      </div>
      <nav class="admin-sidebar__nav">
        <div class="admin-sidebar__label">Menu</div>
        <a href="{{ route('admin.dashboard') }}" class="admin-nav__link {{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">
          Dashboard
        </a>
        <a href="{{ route('admin.team-members.index') }}" class="admin-nav__link {{ request()->routeIs('admin.team-members.*') ? 'is-active' : '' }}">
          Team
        </a>
        <a href="{{ route('admin.facilities.index') }}" class="admin-nav__link {{ request()->routeIs('admin.facilities.*') ? 'is-active' : '' }}">
          Facilities
        </a>
        <a href="{{ route('admin.gallery-photos.index') }}" class="admin-nav__link {{ request()->routeIs('admin.gallery-photos.*') ? 'is-active' : '' }}">
          Gallery
        </a>
        <a href="{{ route('admin.news-items.index') }}" class="admin-nav__link {{ request()->routeIs('admin.news-items.*') ? 'is-active' : '' }}">
          Latest news
        </a>
        <div class="admin-sidebar__label">Website</div>
        <a href="{{ route('admin.school-settings.edit') }}" class="admin-nav__link {{ request()->routeIs('admin.school-settings.*') ? 'is-active' : '' }}">
          Contact &amp; social
        </a>
        <a href="{{ route('admin.contact-messages.index') }}" class="admin-nav__link {{ request()->routeIs('admin.contact-messages.*') ? 'is-active' : '' }}">
          Messages
        </a>
        <a href="{{ route('admin.admission-applications.index') }}" class="admin-nav__link {{ request()->routeIs('admin.admission-applications.*') ? 'is-active' : '' }}">
          Admissions
        </a>
      </nav>
      <div class="admin-sidebar__footer">
        <a href="{{ route('home') }}" class="admin-nav__link" target="_blank" rel="noopener noreferrer">
          View website
        </a>
        <form action="{{ route('admin.logout') }}" method="post">
          @csrf
          <button type="submit" class="admin-sidebar__logout">Log out</button>
        </form>
      </div>
    </aside>

    <div class="admin-sidebar__backdrop" id="admin-sidebar-backdrop" hidden></div>

    <div class="admin-main">
      <header class="admin-topbar">
        <button type="button" class="admin-menu-toggle" id="admin-menu-toggle" aria-controls="admin-sidebar" aria-expanded="false" aria-label="Open menu">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
        <span class="admin-topbar__title">@yield('title', 'Dashboard')</span>
      </header>
      <main class="admin-content">
        @if (session('status'))
          <p class="admin-alert" role="status">{{ session('status') }}</p>
        @endif
        @yield('content')
      </main>
    </div>
  </div>

  <script>
    (function () {
      var sidebar = document.getElementById('admin-sidebar');
      var toggle = document.getElementById('admin-menu-toggle');
      var backdrop = document.getElementById('admin-sidebar-backdrop');
      if (!sidebar || !toggle) return;

      function openMenu() {
        sidebar.classList.add('is-open');
        backdrop.hidden = false;
        backdrop.classList.add('is-visible');
        toggle.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
      }

      function closeMenu() {
        sidebar.classList.remove('is-open');
        backdrop.classList.remove('is-visible');
        backdrop.hidden = true;
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }

      toggle.addEventListener('click', function () {
        if (sidebar.classList.contains('is-open')) closeMenu();
        else openMenu();
      });

      backdrop.addEventListener('click', closeMenu);

      sidebar.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
          if (window.matchMedia('(max-width: 900px)').matches) closeMenu();
        });
      });

      window.addEventListener('resize', function () {
        if (!window.matchMedia('(max-width: 900px)').matches) closeMenu();
      });
    })();
  </script>
</body>
</html>
