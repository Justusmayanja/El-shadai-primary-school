@extends('layouts.site')

@section('title', 'About Us | Real Quality Junior School — Kampala, Uganda')
@section('meta_description', 'Learn about Real Quality Junior School in Kampala, Uganda. Our story, mission, vision, values, and leadership team.')
@section('og_title', 'About Us | Real Quality Junior School')
@section('og_description', 'Our story, mission, vision, and the team behind Real Quality Junior School — Kampala, Uganda.')

@section('content')
  <section class="page-hero page-hero--about" aria-labelledby="about-hero-title">
    <div class="container">
      <h1 id="about-hero-title" class="page-hero__title">About Us</h1>
      <p class="page-hero__subtitle">Our story, mission, and the people behind Real Quality Junior School</p>
    </div>
  </section>

  <section class="container" aria-labelledby="story-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Our Story</p>
      <h2 id="story-heading">A School Built on Care and Excellence</h2>
    </div>
    <div class="container--narrow fade-in" style="margin-inline: auto;">
      <p>Real Quality Junior School was founded in Kasubi with a simple belief: every child deserves a nurturing, safe, and stimulating environment where they can grow into confident, curious learners. What started as a small nursery has grown into a full primary school, serving families across Kampala and beyond.</p>
      <p>We are proud of our roots in the community and our commitment to quality education that respects each child's unique potential. Our experienced staff, modern facilities, and strong values continue to make Real Quality Junior School a trusted choice for parents who want the best start for their children.</p>
    </div>
    <figure class="fade-in" style="margin-top: var(--space-2xl); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-lg);">
      <img src="https://picsum.photos/seed/aboutmain/1200/500" alt="Real Quality Junior School building in Kampala" loading="lazy" style="width: 100%; aspect-ratio: 21/9; object-fit: cover;">
    </figure>
  </section>

  <section class="container" aria-labelledby="mvv-heading">
    <div class="section-title fade-in">
      <p class="subtitle">What We Stand For</p>
      <h2 id="mvv-heading">Mission, Vision &amp; Values</h2>
    </div>
    <div class="mvv-grid">
      <article class="mvv-card fade-in">
        <div class="mvv-card__icon" aria-hidden="true">🎯</div>
        <h3 class="mvv-card__title">Our Mission</h3>
        <p class="mvv-card__text">To provide a holistic, inclusive education that nurtures every child's academic, social, and emotional growth in a safe and caring environment.</p>
      </article>
      <article class="mvv-card fade-in">
        <div class="mvv-card__icon" aria-hidden="true">🌟</div>
        <h3 class="mvv-card__title">Our Vision</h3>
        <p class="mvv-card__text">To be the leading nursery and primary school in Wakiso, recognised for excellence in teaching, character development, and community impact.</p>
      </article>
      <article class="mvv-card fade-in">
        <div class="mvv-card__icon" aria-hidden="true">💚</div>
        <h3 class="mvv-card__title">Our Values</h3>
        <p class="mvv-card__text">Integrity, respect, creativity, and collaboration guide everything we do. We believe in partnership between school, parents, and the community.</p>
      </article>
    </div>
  </section>

  <section class="container" aria-labelledby="team-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Leadership</p>
      <h2 id="team-heading">Meet Our Team</h2>
    </div>
    <div class="team-grid">
      @foreach ($teamMembers as $member)
        <article class="team-card fade-in">
          <div class="team-card__photo">
            <img src="{{ media_url($member->image) }}" alt="{{ $member->role }}" loading="lazy">
          </div>
          <div class="team-card__body">
            <h3 class="team-card__name">{{ $member->name }}</h3>
            <p class="team-card__role">{{ $member->role }}</p>
            <p class="team-card__bio">{{ $member->bio }}</p>
          </div>
        </article>
      @endforeach
    </div>
  </section>

  <section class="container" aria-labelledby="location-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Find Us</p>
      <h2 id="location-heading">Our Location</h2>
    </div>
    <p class="fade-in" style="text-align: center; margin-bottom: var(--space-lg);">Kasubi, Kampala, Uganda — Easy to reach, welcoming to visit.</p>
    <div class="fade-in">
      <iframe
        class="map-embed"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.739792900789!2d32.4774!3d0.4044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177db9a8d4c2c5e5%3A0x1!2sWakiso%2C%20Uganda!5e0!3m2!1sen!2s!4v1610000000000!5m2!1sen!2s"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="Real Quality Junior School location in Kampala, Uganda">
      </iframe>
    </div>
  </section>
@endsection
