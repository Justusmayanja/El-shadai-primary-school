@extends('admin.layout')

@section('title', 'Add gallery photo')

@section('content')
  <h1 style="margin-top:0;">Add gallery photo</h1>
  @if ($errors->any())
    <ul style="color:#b91c1c;">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
  @endif
  <div class="card">
    <form method="post" action="{{ route('admin.gallery-photos.store') }}" enctype="multipart/form-data">
      @csrf
      <label>Alt text <input type="text" name="alt" value="{{ old('alt') }}" required></label>
      <label>Sort order <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"></label>
      <label>Image URL <input type="url" name="image_url" value="{{ old('image_url') }}" placeholder="https://…"></label>
      <label>Image file <input type="file" name="image_file" accept="image/*"></label>
      <button type="submit" class="btn">Save</button>
      <a href="{{ route('admin.gallery-photos.index') }}" class="btn btn--outline" style="margin-left:0.5rem;">Cancel</a>
    </form>
  </div>
@endsection
