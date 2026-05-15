@extends('admin.layout')

@section('title', 'Facilities')

@section('content')
  <h1 style="margin-top:0;">Facilities</h1>
  <p><a href="{{ route('admin.facilities.create') }}" class="btn">Add facility</a></p>
  <div class="card" style="padding:0;overflow-x:auto;">
    <table>
      <thead>
        <tr>
          <th>Image</th>
          <th>Title</th>
          <th>Order</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($facilities as $facility)
          <tr>
            <td>@if($facility->image)<img src="{{ media_url($facility->image) }}" alt="" class="thumb" style="max-width:56px;max-height:56px;">@endif</td>
            <td>{{ $facility->title }}</td>
            <td>{{ $facility->sort_order }}</td>
            <td>
              <a href="{{ route('admin.facilities.edit', $facility) }}">Edit</a>
              <form action="{{ route('admin.facilities.destroy', $facility) }}" method="post" style="display:inline;" onsubmit="return confirm('Delete?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn--danger" style="margin-top:0;padding:0.25rem 0.5rem;font-size:0.8rem;">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="4">No facilities yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
