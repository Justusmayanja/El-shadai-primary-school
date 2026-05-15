<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title>@yield('title')</title>
  <meta name="description" content="@yield('meta_description')">
  <meta property="og:title" content="@yield('og_title')">
  <meta property="og:description" content="@yield('og_description')">
  <meta property="og:type" content="website">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @stack('head')
</head>
<body id="top" data-page="{{ $active ?? '' }}">
  <div class="nav-top" role="complementary" aria-label="Contact info">
    <div class="container nav-top__inner">
      @if($site->email)
      <span class="nav-top__item">
        <a href="mailto:{{ $site->email }}">{{ $site->email }}</a>
      </span>
      @endif
      @if($site->address)
      <span class="nav-top__item">{{ $site->address }}</span>
      @endif
      @if($site->phone)
      <span class="nav-top__item">
        <a href="{{ $site->telHref() }}">{{ $site->phone }}</a>
      </span>
      @endif
    </div>
  </div>

  @include('partials.site-nav')

  @if (session('status'))
    <div class="container" style="padding-block: var(--space-md);">
      <p role="status" style="padding: var(--space-md); background: var(--color-accent-soft, #e8f5e9); border-radius: var(--radius-md); color: var(--color-text);">{{ session('status') }}</p>
    </div>
  @endif

  @yield('content')

  @stack('extras')

  @include('partials.site-footer')

  <a href="#top" class="back-to-top" aria-label="Back to top">↑</a>

  <script>document.getElementById('year').textContent = new Date().getFullYear();</script>
  <script src="{{ asset('js/script.js') }}"></script>
  @stack('scripts')
</body>
</html>
