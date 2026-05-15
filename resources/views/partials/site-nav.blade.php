<header class="nav" role="banner">
  <a href="{{ route('home') }}" class="nav__brand">
    <img src="{{ asset('images/logo.png') }}" alt="Real Quality Junior School logo" class="nav__logo" width="48" height="48">
    Real Quality Junior School
  </a>
  <button class="nav__toggle" type="button" aria-expanded="false" aria-controls="nav-menu" aria-label="Toggle menu">
    <span></span><span></span><span></span>
  </button>
  <nav id="nav-menu" class="nav__links" role="navigation" aria-label="Main">
    <a href="{{ route('home') }}" data-nav="home">Home</a>
    <a href="{{ route('about') }}" data-nav="about">About</a>
    <a href="{{ route('academics') }}" data-nav="academics">Academics</a>
    <a href="{{ route('admissions') }}" data-nav="admissions">Admissions</a>
    <a href="{{ route('gallery') }}" data-nav="gallery">Gallery</a>
    <a href="{{ route('news') }}" data-nav="news">News</a>
    <a href="{{ route('contact') }}" data-nav="contact">Contact</a>
  </nav>
</header>
