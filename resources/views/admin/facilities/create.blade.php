@extends('admin.layout')

@section('title', 'Add facility')

@section('content')
  <h1 style="margin-top:0;">Add facility</h1>
  @if ($errors->any())
    <ul style="color:#b91c1c;">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
  @endif
  <div class="card">
    <form method="post" action="{{ route('admin.facilities.store') }}" enctype="multipart/form-data">
      @csrf
      <label>Title <input type="text" name="title" value="{{ old('title') }}" required></label>
      <label>Icon (emoji) <input type="text" name="icon" value="{{ old('icon', '🏫') }}" maxlength="8"></label>
      <label>Description <textarea name="description" required>{{ old('description') }}</textarea></label>
      <label>Sort order <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"></label>
      <label>Image URL <input type="url" name="image_url" value="{{ old('image_url') }}" placeholder="https://…"></label>
      <label>Image file <input type="file" name="image_file" accept="image/*"></label>
      <button type="submit" class="btn">Save</button>
      <a href="{{ route('admin.facilities.index') }}" class="btn btn--outline" style="margin-left:0.5rem;">Cancel</a>
    </form>
  </div>
@endsection
