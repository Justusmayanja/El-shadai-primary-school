@extends('admin.layout')

@section('title', 'Edit news item')

@section('content')
  <h1 style="margin-top:0;">Edit news item</h1>
  @if ($errors->any())
    <ul style="color:#b91c1c;">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
  @endif
  <div class="card">
    <form method="post" action="{{ route('admin.news-items.update', $item) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <label>Title <input type="text" name="title" value="{{ old('title', $item->title) }}" required></label>
      <label>URL slug <input type="text" name="slug" value="{{ old('slug', $item->slug) }}" placeholder="auto from title if cleared"></label>
      <label>Excerpt <textarea name="excerpt" rows="3">{{ old('excerpt', $item->excerpt) }}</textarea></label>
      <label>Full story <textarea name="body" rows="8">{{ old('body', $item->body) }}</textarea></label>
      <label>Published date/time <input type="datetime-local" name="published_at" value="{{ old('published_at', optional($item->published_at)->format('Y-m-d\TH:i')) }}"></label>
      <label style="display:flex;align-items:center;gap:0.5rem;margin-top:0.75rem;">
        <input type="hidden" name="is_published" value="0">
        <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $item->is_published ? '1' : '0') == '1') style="width:auto;">
        Published (visible on website)
      </label>
      <label>Sort order <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}" min="0"></label>
      @if($item->image)
        <p class="muted">Current image</p>
        <img src="{{ media_url($item->image) }}" alt="" class="thumb">
      @endif
      <label>New image URL <input type="url" name="image_url" value="{{ old('image_url') }}" placeholder="https://…"></label>
      <label>New image file <input type="file" name="image_file" accept="image/*"></label>
      <p class="muted">Leave URL and file empty to keep the current image.</p>
      <button type="submit" class="btn">Update</button>
      <a href="{{ route('admin.news-items.index') }}" class="btn btn--outline" style="margin-left:0.5rem;">Cancel</a>
    </form>
  </div>
@endsection
