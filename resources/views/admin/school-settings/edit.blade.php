@extends('admin.layout')

@section('title', 'Contact & social')

@section('content')
  <h1 style="margin-top:0;">Contact &amp; social</h1>
  <p class="muted">These details appear in the site header, footer, and contact page. Leave a social URL empty to hide that icon.</p>
  @if ($errors->any())
    <ul style="color:#b91c1c;">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
  @endif
  <div class="card">
    <form method="post" action="{{ route('admin.school-settings.update') }}">
      @csrf
      @method('PATCH')

      <h2 style="margin-top:0;font-size:1rem;">Contact</h2>
      <label>Address (one or two lines) <textarea name="address" rows="2">{{ old('address', $settings->address) }}</textarea></label>
      <label>Email <input type="email" name="email" value="{{ old('email', $settings->email) }}"></label>
      <label>Phone (display text) <input type="text" name="phone" value="{{ old('phone', $settings->phone) }}" placeholder="+256 700 000 000"></label>
      <label>Phone (tel: link, international) <input type="text" name="phone_tel" value="{{ old('phone_tel', $settings->phone_tel) }}" placeholder="+256700000000"></label>
      <p class="muted">Used for the clickable phone link. If empty, digits from the display phone are used.</p>
      <label>WhatsApp number (digits only, country code included) <input type="text" name="whatsapp_digits" value="{{ old('whatsapp_digits', $settings->whatsapp_digits) }}" placeholder="256700000000"></label>
      <p class="muted">Used for <code>wa.me</code> chat links. Example: 256700000000</p>

      <h2 style="margin-top:1.5rem;font-size:1rem;">Social links</h2>
      <label>Facebook URL <input type="url" name="facebook_url" value="{{ old('facebook_url', $settings->facebook_url) }}" placeholder="https://facebook.com/…"></label>
      <label>Instagram URL <input type="url" name="instagram_url" value="{{ old('instagram_url', $settings->instagram_url) }}"></label>
      <label>X (Twitter) URL <input type="url" name="twitter_url" value="{{ old('twitter_url', $settings->twitter_url) }}"></label>
      <label>YouTube URL <input type="url" name="youtube_url" value="{{ old('youtube_url', $settings->youtube_url) }}"></label>
      <label>TikTok URL <input type="url" name="tiktok_url" value="{{ old('tiktok_url', $settings->tiktok_url) }}"></label>

      <h2 style="margin-top:1.5rem;font-size:1rem;">Map</h2>
      <label>Google Maps embed URL <textarea name="google_maps_embed_src" rows="3" placeholder="Paste the full src URL from Google Maps embed code">{{ old('google_maps_embed_src', $settings->google_maps_embed_src) }}</textarea></label>
      <p class="muted">From Google Maps → Share → Embed map → copy only the <code>src="…"</code> value.</p>

      <button type="submit" class="btn">Save settings</button>
    </form>
  </div>
@endsection
