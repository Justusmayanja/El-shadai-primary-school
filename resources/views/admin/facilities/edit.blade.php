@extends('admin.layout')

@section('title', 'Edit facility')

@section('content')
  <h1 style="margin-top:0;">Edit facility</h1>
  @if ($errors->any())
    <ul style="color:#b91c1c;">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
  @endif
  <div class="card">
    @if($facility->image)
      <img src="{{ media_url($facility->image) }}" alt="" class="thumb">
    @endif
    <form method="post" action="{{ route('admin.facilities.update', $facility) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <label>Title <input type="text" name="title" value="{{ old('title', $facility->title) }}" required></label>
      <label>Icon <input type="text" name="icon" value="{{ old('icon', $facility->icon) }}" maxlength="8"></label>
      <label>Description <textarea name="description" required>{{ old('description', $facility->description) }}</textarea></label>
      <label>Sort order <input type="number" name="sort_order" value="{{ old('sort_order', $facility->sort_order) }}" min="0"></label>
      <label>New image URL <input type="url" name="image_url" value="{{ old('image_url', str_starts_with((string) $facility->image, 'http') ? $facility->image : '') }}"></label>
      <label>Replace with file <input type="file" name="image_file" accept="image/*"></label>
      <button type="submit" class="btn">Update</button>
      <a href="{{ route('admin.facilities.index') }}" class="btn btn--outline" style="margin-left:0.5rem;">Cancel</a>
    </form>
  </div>
@endsection
