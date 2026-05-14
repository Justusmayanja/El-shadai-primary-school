@extends('layouts.site')

@section('title', 'News & Events | '.config('app.name'))
@section('meta_description', 'Latest news and events from '.config('app.name').'.')
@section('og_title', 'News & Events | '.config('app.name'))
@section('og_description', 'Stay updated with school news and events.')

@section('content')
  <section class="page-hero page-hero--about" aria-labelledby="news-hero-title">
    <div class="container">
      <h1 id="news-hero-title" class="page-hero__title">News &amp; Events</h1>
      <p class="page-hero__subtitle">Stay updated with {{ config('app.name') }}</p>
    </div>
  </section>

  <section class="container" aria-labelledby="news-list-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Latest</p>
      <h2 id="news-list-heading">All news</h2>
    </div>
    <div class="news-grid">
      @forelse ($articles as $article)
        <article class="news-card fade-in">
          @if($article->image)
            <div class="news-card__image">
              <a href="{{ route('news.show', $article->slug) }}">
                <img src="{{ media_url($article->image) }}" alt="" loading="lazy">
              </a>
            </div>
          @endif
          <div class="news-card__body">
            <p class="news-card__date">{{ $article->published_at?->format('F j, Y') ?? $article->created_at->format('F j, Y') }}</p>
            <h3 class="news-card__title">
              <a href="{{ route('news.show', $article->slug) }}">{{ $article->title }}</a>
            </h3>
            @if($article->excerpt)
              <p class="news-card__excerpt">{{ $article->excerpt }}</p>
            @endif
            <p style="margin-top:0.75rem;"><a href="{{ route('news.show', $article->slug) }}" class="btn btn--primary">Read more</a></p>
          </div>
        </article>
      @empty
        <p class="fade-in">No news articles yet. Check back soon.</p>
      @endforelse
    </div>
  </section>
@endsection
