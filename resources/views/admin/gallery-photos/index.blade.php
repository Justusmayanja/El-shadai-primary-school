@extends('admin.layout')

@section('title', 'Gallery photos')

@section('content')
  <h1 style="margin-top:0;">Gallery photos</h1>
  <p><a href="{{ route('admin.gallery-photos.create') }}" class="btn">Add photo</a></p>
  <div class="card" style="padding:0;overflow-x:auto;">
    <table>
      <thead>
        <tr>
          <th>Thumb</th>
          <th>Alt</th>
          <th>Order</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($photos as $photo)
          <tr>
            <td><img src="{{ media_url($photo->image) }}" alt="" class="thumb" style="max-width:56px;max-height:56px;"></td>
            <td>{{ $photo->alt }}</td>
            <td>{{ $photo->sort_order }}</td>
            <td>
              <a href="{{ route('admin.gallery-photos.edit', $photo) }}">Edit</a>
              <form action="{{ route('admin.gallery-photos.destroy', $photo) }}" method="post" style="display:inline;" onsubmit="return confirm('Delete?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn--danger" style="margin-top:0;padding:0.25rem 0.5rem;font-size:0.8rem;">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="4">No photos yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
