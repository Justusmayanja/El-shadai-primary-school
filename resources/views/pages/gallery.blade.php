@extends('layouts.site')

@section('title', 'Gallery | Real Quality Junior School — Kampala, Uganda')
@section('meta_description', 'Photo gallery of Real Quality Junior School: campus, classrooms, playground, and activities in Kampala, Uganda.')
@section('og_title', 'Gallery | Real Quality Junior School')
@section('og_description', 'See our campus, classrooms, and school life in Kasubi, Kampala, Uganda.')

@section('content')
  <section class="page-hero page-hero--gallery" aria-labelledby="gallery-hero-title">
    <div class="container">
      <h1 id="gallery-hero-title" class="page-hero__title">Gallery</h1>
      <p class="page-hero__subtitle">Campus, classrooms, and life at Real Quality Junior School</p>
    </div>
  </section>

  <section class="container" aria-labelledby="gallery-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Campus Life</p>
      <h2 id="gallery-heading">Photo Gallery</h2>
    </div>
    <div class="gallery-grid">
      @foreach ($photos as $photo)
        <figure class="gallery-item fade-in">
          <img src="{{ media_url($photo->image) }}" alt="{{ $photo->alt }}" loading="lazy">
        </figure>
      @endforeach
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
