@extends('admin.layout')

@section('title', 'Add team member')

@section('content')
  <h1 style="margin-top:0;">Add team member</h1>
  @if ($errors->any())
    <ul style="color:#b91c1c;">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
  @endif
  <div class="card">
    <form method="post" action="{{ route('admin.team-members.store') }}" enctype="multipart/form-data">
      @csrf
      <label>Name <input type="text" name="name" value="{{ old('name') }}" required></label>
      <label>Role <input type="text" name="role" value="{{ old('role') }}" required></label>
      <label>Bio <textarea name="bio" required>{{ old('bio') }}</textarea></label>
      <label>Sort order <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"></label>
      <label>Image URL (or upload file below) <input type="url" name="image_url" value="{{ old('image_url') }}" placeholder="https://…"></label>
      <label>Image file <input type="file" name="image_file" accept="image/*"></label>
      <p class="muted">Provide either an image URL or a file.</p>
      <button type="submit" class="btn">Save</button>
      <a href="{{ route('admin.team-members.index') }}" class="btn btn--outline" style="margin-left:0.5rem;">Cancel</a>
    </form>
  </div>
@endsection
