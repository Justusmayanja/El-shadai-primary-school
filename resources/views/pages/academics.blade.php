@extends('layouts.site')

@section('title', 'Academics | Real Quality Junior School — Kampala, Uganda')
@section('meta_description', 'Curriculum, facilities, and co-curricular activities at Real Quality Junior School in Kampala, Uganda. Where learning is joyful.')
@section('og_title', 'Academics | Real Quality Junior School')
@section('og_description', 'Curriculum, facilities, and activities at Real Quality Junior School — where learning is joyful. Kampala, Uganda.')

@section('content')
  <section class="page-hero page-hero--academics" aria-labelledby="academics-hero-title">
    <div class="container">
      <h1 id="academics-hero-title" class="page-hero__title">Academics</h1>
      <p class="page-hero__subtitle">Where Learning is Joyful</p>
    </div>
  </section>

  <section class="container" aria-labelledby="curriculum-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Our Curriculum</p>
      <h2 id="curriculum-heading">Curriculum Overview</h2>
    </div>
    <p class="fade-in" style="text-align: center; max-width: 640px; margin-inline: auto; margin-bottom: var(--space-2xl);">We follow the Ugandan national curriculum, enriched with hands-on activities, literacy programmes, and a strong focus on numeracy and life skills at every stage.</p>
    <div class="accordion fade-in">
      <article class="accordion__item">
        <button type="button" class="accordion__header" aria-expanded="false" aria-controls="nursery-content" id="nursery-header">Nursery (Baby, Middle, Top)</button>
        <div id="nursery-content" class="accordion__content" aria-labelledby="nursery-header">
          <div class="accordion__content-inner">
            <p>Our nursery programme welcomes children from age 3. We focus on play-based learning, early literacy and numeracy, social skills, and creative expression. Our caring staff ensure a smooth transition from home to school in a safe, stimulating environment.</p>
            <p>Key areas: Language and communication, numbers and shapes, art and music, physical play, and character development.</p>
          </div>
        </div>
      </article>
      <article class="accordion__item">
        <button type="button" class="accordion__header" aria-expanded="false" aria-controls="lower-primary-content" id="lower-primary-header">Lower Primary (P.1 – P.3)</button>
        <div id="lower-primary-content" class="accordion__content" aria-labelledby="lower-primary-header">
          <div class="accordion__content-inner">
            <p>Lower primary builds strong foundations in English, Mathematics, Science, and Social Studies. We use a mix of whole-class teaching and group activities so every child is engaged and supported. Reading and writing are prioritised from P.1.</p>
            <p>Subjects include: Literacy, Numeracy, Science, Social Studies, Religious Education, and Creative Arts.</p>
          </div>
        </div>
      </article>
      <article class="accordion__item">
        <button type="button" class="accordion__header" aria-expanded="false" aria-controls="upper-primary-content" id="upper-primary-header">Upper Primary (P.4 – P.7)</button>
        <div id="upper-primary-content" class="accordion__content" aria-labelledby="upper-primary-header">
          <div class="accordion__content-inner">
            <p>Upper primary prepares pupils for the next stage of education with a rigorous yet supportive approach. We offer full subject coverage aligned with national standards, plus revision and exam preparation for PLE. Critical thinking and project work are encouraged.</p>
            <p>Subjects include: English, Mathematics, Science, Social Studies, RE, Art, Music, and Physical Education.</p>
          </div>
        </div>
      </article>
    </div>
  </section>

  <section class="container" aria-labelledby="facilities-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Campus</p>
      <h2 id="facilities-heading">Our Facilities</h2>
    </div>
    <div class="card-grid">
      @foreach ($facilities as $facility)
        <article class="card fade-in">
          <div class="card__image">
            <img src="{{ media_url($facility->image) }}" alt="{{ $facility->title }}" loading="lazy">
          </div>
          <div class="card__body">
            <h3 class="card__title">{{ $facility->title }}</h3>
            <p class="card__text">{{ $facility->description }}</p>
          </div>
        </article>
      @endforeach
    </div>
  </section>

  <section class="container" aria-labelledby="cocurricular-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Beyond the Classroom</p>
      <h2 id="cocurricular-heading">Co-curricular Activities</h2>
    </div>
    <div class="card-grid">
      <article class="feature-card fade-in">
        <div class="feature-card__icon" aria-hidden="true">S</div>
        <h3 class="feature-card__title">Sports</h3>
        <p class="feature-card__text">Football, athletics, and other games help pupils stay active, build teamwork, and have fun. We participate in local school competitions.</p>
      </article>
      <article class="feature-card fade-in">
        <div class="feature-card__icon" aria-hidden="true">M</div>
        <h3 class="feature-card__title">Music &amp; Dance</h3>
        <p class="feature-card__text">Choir, percussion, and traditional dance give children a chance to express themselves and celebrate culture.</p>
      </article>
      <article class="feature-card fade-in">
        <div class="feature-card__icon" aria-hidden="true">A</div>
        <h3 class="feature-card__title">Art &amp; Craft</h3>
        <p class="feature-card__text">Drawing, painting, and craft activities develop creativity and fine motor skills in a supportive setting.</p>
      </article>
      <article class="feature-card fade-in">
        <div class="feature-card__icon" aria-hidden="true">C</div>
        <h3 class="feature-card__title">Clubs</h3>
        <p class="feature-card__text">Reading club, science club, and debate club allow pupils to pursue interests and make friends beyond the classroom.</p>
      </article>
    </div>
  </section>
@endsection
