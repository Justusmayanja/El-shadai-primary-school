@extends('admin.layout')

@section('title', 'Edit team member')

@section('content')
  <h1 style="margin-top:0;">Edit team member</h1>
  @if ($errors->any())
    <ul style="color:#b91c1c;">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
  @endif
  <div class="card">
    @if($member->image)
      <p class="muted">Current image</p>
      <img src="{{ media_url($member->image) }}" alt="" class="thumb">
    @endif
    <form method="post" action="{{ route('admin.team-members.update', $member) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <label>Name <input type="text" name="name" value="{{ old('name', $member->name) }}" required></label>
      <label>Role <input type="text" name="role" value="{{ old('role', $member->role) }}" required></label>
      <label>Bio <textarea name="bio" required>{{ old('bio', $member->bio) }}</textarea></label>
      <label>Sort order <input type="number" name="sort_order" value="{{ old('sort_order', $member->sort_order) }}" min="0"></label>
      <label>New image URL <input type="url" name="image_url" value="{{ old('image_url', str_starts_with((string) $member->image, 'http') ? $member->image : '') }}" placeholder="https://…"></label>
      <label>Replace with file <input type="file" name="image_file" accept="image/*"></label>
      <p class="muted">Leave URL and file empty to keep the current image.</p>
      <button type="submit" class="btn">Update</button>
      <a href="{{ route('admin.team-members.index') }}" class="btn btn--outline" style="margin-left:0.5rem;">Cancel</a>
    </form>
  </div>
@endsection
