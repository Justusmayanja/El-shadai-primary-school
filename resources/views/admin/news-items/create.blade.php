@extends('admin.layout')

@section('title', 'Add news item')

@section('content')
  <h1 style="margin-top:0;">Add news item</h1>
  @if ($errors->any())
    <ul style="color:#b91c1c;">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
  @endif
  <div class="card">
    <form method="post" action="{{ route('admin.news-items.store') }}" enctype="multipart/form-data">
      @csrf
      <label>Title <input type="text" name="title" value="{{ old('title') }}" required></label>
      <label>URL slug (optional — generated from title if empty) <input type="text" name="slug" value="{{ old('slug') }}" placeholder="e.g. sports-day-2025"></label>
      <label>Excerpt <textarea name="excerpt" rows="3">{{ old('excerpt') }}</textarea></label>
      <label>Full story <textarea name="body" rows="8">{{ old('body') }}</textarea></label>
      <label>Published date/time <input type="datetime-local" name="published_at" value="{{ old('published_at') }}"></label>
      <label style="display:flex;align-items:center;gap:0.5rem;margin-top:0.75rem;">
        <input type="hidden" name="is_published" value="0">
        <input type="checkbox" name="is_published" value="1" @checked(old('is_published', '1') == '1') style="width:auto;">
        Published (visible on website)
      </label>
      <label>Sort order <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"></label>
      <label>Image URL <input type="url" name="image_url" value="{{ old('image_url') }}" placeholder="https://…"></label>
      <label>Image file <input type="file" name="image_file" accept="image/*"></label>
      <p class="muted">Provide either an image URL or a file.</p>
      <button type="submit" class="btn">Save</button>
      <a href="{{ route('admin.news-items.index') }}" class="btn btn--outline" style="margin-left:0.5rem;">Cancel</a>
    </form>
  </div>
@endsection
