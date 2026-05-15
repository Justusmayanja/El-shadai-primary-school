@extends('layouts.site')

@section('title', 'Contact & Admissions | Real Quality Junior School — Kampala, Uganda')
@section('meta_description', 'Contact Real Quality Junior School in Kampala, Uganda. Enquiries, admissions, school tour, and how to apply.')
@section('og_title', 'Contact & Admissions | Real Quality Junior School')
@section('og_description', 'Get in touch. Enquiries, admissions, and school tours — Kasubi, Kampala, Uganda.')

@section('content')
  <section class="page-hero page-hero--contact" aria-labelledby="contact-hero-title">
    <div class="container">
      <h1 id="contact-hero-title" class="page-hero__title">Get in Touch</h1>
      <p class="page-hero__subtitle">We would love to hear from you</p>
    </div>
  </section>

  <section class="container" aria-labelledby="contact-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Say Hello</p>
      <h2 id="contact-heading">Contact Us</h2>
    </div>
    @if ($errors->any())
      <div class="container--narrow fade-in" style="margin-inline: auto; margin-bottom: var(--space-lg);">
        <ul style="color: var(--color-danger, #b00020); padding-left: 1.25rem;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="contact-grid">
      <div class="fade-in">
        <form class="contact-info-card" action="{{ route('contact.store') }}" method="post" aria-labelledby="form-heading">
          @csrf
          <h3 id="form-heading">Send a Message</h3>
          <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="e.g. Jane Nakato">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="you@example.com">
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+256 700 000 000">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="How can we help?" required>{{ old('message') }}</textarea>
          </div>
          <button type="submit" class="btn btn--primary">Send Message</button>
        </form>
      </div>
      <div class="fade-in">
        <div class="contact-info-card">
          <h3>Address</h3>
          <p>{!! nl2br(e($site->address ?? '')) !!}</p>
        </div>
        <div class="contact-info-card" style="margin-top: var(--space-lg);">
          <h3>Phone</h3>
          <p><a href="{{ $site->telHref() }}">{{ $site->phone }}</a></p>
        </div>
        <div class="contact-info-card" style="margin-top: var(--space-lg);">
          <h3>Email</h3>
          <p><a href="mailto:{{ $site->email }}">{{ $site->email }}</a></p>
        </div>
        @if($wa = $site->waMeUrl())
        <div class="contact-info-card" style="margin-top: var(--space-lg);">
          <h3>WhatsApp</h3>
          <p><a href="{{ $wa }}" target="_blank" rel="noopener noreferrer">Chat with us on WhatsApp</a></p>
        </div>
        @endif
      </div>
    </div>
  </section>

  <section class="container" aria-labelledby="map-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Find Us</p>
      <h2 id="map-heading">Location</h2>
    </div>
    <div class="fade-in">
      @if($site->google_maps_embed_src)
      <iframe
        class="map-embed"
        src="{{ $site->google_maps_embed_src }}"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="{{ config('app.name') }} location">
      </iframe>
      @else
      <p class="fade-in">Map not configured. Add an embed URL in the admin contact settings.</p>
      @endif
    </div>
  </section>

  <section class="container" id="admissions" aria-labelledby="admissions-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Join Us</p>
      <h2 id="admissions-heading">Admissions Information</h2>
    </div>
    <div class="admissions-box fade-in">
      <h3>Admissions for 2025</h3>
      <p>We welcome applications for Nursery (Baby, Middle, Top) and Primary (P.1–P.7). Places are limited; early application is encouraged.</p>
      <ul>
        <li>Completed application form (available from the school office or via contact form)</li>
        <li>Copy of child's birth certificate</li>
        <li>Previous school reports (where applicable)</li>
        <li>Passport-size photograph of the child</li>
      </ul>
      <p><strong>Fees:</strong> Please contact us for the current fee structure and payment options. We are happy to discuss flexible arrangements where needed.</p>
      <p><strong id="tour">School tours:</strong> We encourage families to visit before applying. Contact us to schedule a tour or a virtual visit. We look forward to meeting you!</p>
      <a href="mailto:{{ $site->email }}?subject=Admissions%20Enquiry" class="btn btn--primary" style="margin-top: var(--space-md);">Request Prospectus / Book a Tour</a>
    </div>
  </section>
@endsection
