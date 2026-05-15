<footer class="footer" role="contentinfo">
  <div class="footer__grid">
    <div>
      <p class="footer__brand">{{ config('app.name') }}</p>
      <p class="footer__address">{!! nl2br(e($site->address ?? '')) !!}</p>
    </div>
    <div class="footer__links">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('academics') }}">Academics</a></li>
        <li><a href="{{ route('admissions') }}">Admissions</a></li>
        <li><a href="{{ route('gallery') }}">Gallery</a></li>
        <li><a href="{{ route('news') }}">News</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </div>
    @if($site->facebook_url || $site->instagram_url || $site->twitter_url || $site->youtube_url || $site->tiktok_url || $site->whatsapp_digits)
    <div class="footer__social">
      <h4>Connect</h4>
      <div class="footer__social-links">
        @if($site->facebook_url)
          <a href="{{ $site->facebook_url }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook">f</a>
        @endif
        @if($wa = $site->waMeUrl())
          <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">WA</a>
        @endif
        @if($site->instagram_url)
          <a href="{{ $site->instagram_url }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram">in</a>
        @endif
        @if($site->twitter_url)
          <a href="{{ $site->twitter_url }}" target="_blank" rel="noopener noreferrer" aria-label="X">X</a>
        @endif
        @if($site->youtube_url)
          <a href="{{ $site->youtube_url }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube">YT</a>
        @endif
        @if($site->tiktok_url)
          <a href="{{ $site->tiktok_url }}" target="_blank" rel="noopener noreferrer" aria-label="TikTok">TT</a>
        @endif
      </div>
    </div>
    @endif
  </div>
  <p class="footer__bottom">&copy; <span id="year"></span> {{ config('app.name') }}. All rights reserved.</p>
</footer>
