@extends('layouts.site')

@section('title', $article->title.' | News | '.config('app.name'))
@section('meta_description')
  {{ \Illuminate\Support\Str::limit(strip_tags($article->excerpt ?: $article->body ?: $article->title), 160) }}
@endsection
@section('og_title', $article->title.' | '.config('app.name'))
@section('og_description')
  {{ \Illuminate\Support\Str::limit(strip_tags($article->excerpt ?: $article->body ?: ''), 200) }}
@endsection

@section('content')
  <section class="page-hero page-hero--about" aria-labelledby="article-title">
    <div class="container">
      <p class="page-hero__subtitle" style="margin-bottom:0.5rem;">
        <a href="{{ route('news') }}" style="color:inherit;opacity:0.9;">← All news</a>
      </p>
      <h1 id="article-title" class="page-hero__title" style="font-size:clamp(1.75rem, 4vw, 2.5rem);">{{ $article->title }}</h1>
      <p class="page-hero__subtitle">{{ $article->published_at?->format('F j, Y') ?? $article->created_at->format('F j, Y') }}</p>
    </div>
  </section>

  <article class="container container--narrow fade-in" style="max-width: 720px; margin-inline: auto;">
    @if($article->image)
      <figure style="margin:0 0 var(--space-lg); border-radius: var(--radius-md); overflow: hidden;">
        <img src="{{ media_url($article->image) }}" alt="" loading="lazy" style="width:100%; height:auto; display:block;">
      </figure>
    @endif
    @if($article->excerpt)
      <p class="lead" style="font-size:1.1rem; font-weight:500; color: var(--color-text-muted);">{{ $article->excerpt }}</p>
    @endif
    <div class="prose" style="margin-top: var(--space-lg); line-height: 1.7;">
      {!! nl2br(e($article->body ?? '')) !!}
    </div>
    <p style="margin-top: var(--space-xl);">
      <a href="{{ route('news') }}" class="btn btn--outline">← Back to all news</a>
    </p>
  </article>
@endsection
