@extends('admin.layout')

@section('title', 'Edit gallery photo')

@section('content')
  <h1 style="margin-top:0;">Edit gallery photo</h1>
  @if ($errors->any())
    <ul style="color:#b91c1c;">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
  @endif
  <div class="card">
    <img src="{{ media_url($photo->image) }}" alt="" class="thumb">
    <form method="post" action="{{ route('admin.gallery-photos.update', $photo) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <label>Alt text <input type="text" name="alt" value="{{ old('alt', $photo->alt) }}" required></label>
      <label>Sort order <input type="number" name="sort_order" value="{{ old('sort_order', $photo->sort_order) }}" min="0"></label>
      <label>New image URL <input type="url" name="image_url" value="{{ old('image_url', str_starts_with((string) $photo->image, 'http') ? $photo->image : '') }}"></label>
      <label>Replace with file <input type="file" name="image_file" accept="image/*"></label>
      <button type="submit" class="btn">Update</button>
      <a href="{{ route('admin.gallery-photos.index') }}" class="btn btn--outline" style="margin-left:0.5rem;">Cancel</a>
    </form>
  </div>
@endsection
