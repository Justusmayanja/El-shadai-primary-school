@extends('layouts.site')

@section('title', "Real Quality Junior School | Kampala, Uganda — Nurturing Tomorrow's Leaders")
@section('meta_description', 'Real Quality Junior School in Kampala, Uganda. Quality education in a safe, loving environment. Admissions open for 2025.')
@section('og_title', 'Real Quality Junior School | Kampala, Uganda')
@section('og_description', "Nurturing Tomorrow's Leaders Today. Quality nursery and primary education in Wakiso, Uganda.")

@section('content')
  <section class="hero" aria-labelledby="hero-title">
    <div class="hero__bg" aria-hidden="true">
      <div class="hero__bg-slide active">
        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1920&q=80" alt="" loading="eager" referrerpolicy="no-referrer">
      </div>
      <div class="hero__bg-slide">
        <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=1920&q=80" alt="" referrerpolicy="no-referrer">
      </div>
      <div class="hero__bg-slide">
        <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?w=1920&q=80" alt="" referrerpolicy="no-referrer">
      </div>
    </div>
    <div class="hero__overlay" aria-hidden="true"></div>
    <div class="hero__content">
      <h1 id="hero-title" class="hero__title">Real Quality Junior School</h1>
      <p class="hero__tagline">Nurturing Tomorrow's Leaders Today</p>
      <p class="hero__location">Wakiso, Uganda</p>
      <div class="hero__ctas">
        <a href="{{ route('contact') }}#admissions" class="btn btn--accent">Admissions 2025</a>
        <a href="{{ route('contact') }}#tour" class="btn btn--outline-light">Take a Virtual Tour</a>
      </div>
    </div>
  </section>

  <section class="container" aria-labelledby="why-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Why Choose Us</p>
      <h2 id="why-heading">Why Choose Real Quality Junior School?</h2>
    </div>
    <div class="card-grid">
      <article class="feature-card fade-in">
        <div class="feature-card__icon" aria-hidden="true">📚</div>
        <h3 class="feature-card__title">Holistic Education</h3>
        <p class="feature-card__text">We combine academic excellence with character building, creativity, and life skills so every child thrives in and out of the classroom.</p>
      </article>
      <article class="feature-card fade-in">
        <div class="feature-card__icon" aria-hidden="true">🏠</div>
        <h3 class="feature-card__title">Safe &amp; Loving Environment</h3>
        <p class="feature-card__text">A secure, welcoming campus where children feel at home. We prioritise wellbeing and positive relationships between staff and pupils.</p>
      </article>
      <article class="feature-card fade-in">
        <div class="feature-card__icon" aria-hidden="true">👩‍🏫</div>
        <h3 class="feature-card__title">Experienced Teachers</h3>
        <p class="feature-card__text">Our dedicated educators are qualified, caring, and committed to bringing out the best in every child through personalised attention.</p>
      </article>
      <article class="feature-card fade-in">
        <div class="feature-card__icon" aria-hidden="true">⚽</div>
        <h3 class="feature-card__title">Co-curricular Activities</h3>
        <p class="feature-card__text">Sports, music, art, and clubs complement our curriculum and help children discover their passions and build confidence.</p>
      </article>
    </div>
  </section>

  <section class="container" aria-labelledby="gallery-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Campus Life</p>
      <h2 id="gallery-heading">Gallery</h2>
    </div>
    <div class="gallery-grid">
      @foreach ($galleryPreview as $photo)
        <figure class="gallery-item fade-in">
          <img src="{{ media_url($photo->image) }}" alt="{{ $photo->alt }}" loading="lazy">
        </figure>
      @endforeach
    </div>
  </section>

  <section class="testimonials" aria-labelledby="testimonials-heading">
    <div class="container">
      <div class="section-title fade-in">
        <p class="subtitle">What Parents Say</p>
        <h2 id="testimonials-heading">Testimonials</h2>
      </div>
      <div class="testimonials-slider">
        <div class="testimonials-track">
          <div class="testimonial-slide">
            <blockquote class="testimonial-card">
              <p class="testimonial-card__quote">Real Quality Junior School has been a blessing for our family. The teachers truly care, and our daughter has grown in confidence and curiosity. We could not ask for a better start to her education.</p>
              <footer>
                <cite class="testimonial-card__author">— Sarah N.</cite>
                <p class="testimonial-card__role">Parent of P.3 pupil</p>
              </footer>
            </blockquote>
          </div>
          <div class="testimonial-slide">
            <blockquote class="testimonial-card">
              <p class="testimonial-card__quote">The balance of academics and play is perfect. My son looks forward to school every day. The facilities are clean and safe, and the communication from the school is excellent.</p>
              <footer>
                <cite class="testimonial-card__author">— James K.</cite>
                <p class="testimonial-card__role">Parent of Nursery pupil</p>
              </footer>
            </blockquote>
          </div>
          <div class="testimonial-slide">
            <blockquote class="testimonial-card">
              <p class="testimonial-card__quote">We moved to Kampala and were nervous about changing schools. Real Quality Junior School made the transition smooth. The staff and children are so welcoming. Highly recommend.</p>
              <footer>
                <cite class="testimonial-card__author">— Grace M.</cite>
                <p class="testimonial-card__role">Parent of P.1 pupil</p>
              </footer>
            </blockquote>
          </div>
        </div>
        <div class="testimonials-dots" role="tablist" aria-label="Testimonial navigation"></div>
      </div>
    </div>
  </section>

  <section class="container" aria-labelledby="news-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Stay Updated</p>
      <h2 id="news-heading">Latest News &amp; Events</h2>
    </div>
    <div class="news-grid">
      @forelse ($latestNews as $newsItem)
        <article class="news-card fade-in">
          @if($newsItem->image)
            <div class="news-card__image">
              <a href="{{ route('news.show', $newsItem->slug) }}">
                <img src="{{ media_url($newsItem->image) }}" alt="" loading="lazy">
              </a>
            </div>
          @endif
          <div class="news-card__body">
            <p class="news-card__date">{{ $newsItem->published_at?->format('F Y') ?? $newsItem->created_at->format('F Y') }}</p>
            <h3 class="news-card__title">
              <a href="{{ route('news.show', $newsItem->slug) }}">{{ $newsItem->title }}</a>
            </h3>
            @if($newsItem->excerpt)
              <p class="news-card__excerpt">{{ $newsItem->excerpt }}</p>
            @endif
            <p style="margin-top:0.75rem;"><a href="{{ route('news.show', $newsItem->slug) }}" class="btn btn--primary">Read more</a></p>
          </div>
        </article>
      @empty
        <p class="fade-in">No news yet — check back soon.</p>
      @endforelse
    </div>
    @if($latestNews->isNotEmpty())
      <p class="fade-in" style="text-align:center;margin-top:var(--space-lg);">
        <a href="{{ route('news') }}" class="btn btn--outline">View all news</a>
      </p>
    @endif
  </section>

  <section class="container" aria-labelledby="cta-heading">
    <div class="cta-banner fade-in">
      <h2 id="cta-heading" class="cta-banner__title">Join the Real Quality Junior School Family</h2>
      <p class="cta-banner__text">Admissions for 2025 are open. Schedule a visit or request a prospectus today.</p>
      <a href="{{ route('admissions') }}" class="btn btn--outline-light">Apply for Admissions</a>
    </div>
  </section>
@endsection

@push('extras')
  <div class="lightbox" role="dialog" aria-modal="true" aria-label="Image lightbox">
    <button type="button" class="lightbox__close" aria-label="Close">×</button>
    <div class="lightbox__content">
      <img src="" alt="">
    </div>
  </div>
@endpush
