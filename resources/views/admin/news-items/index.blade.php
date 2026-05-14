@extends('admin.layout')

@section('title', 'Latest news')

@section('content')
  <h1 style="margin-top:0;">Latest news</h1>
  <p><a href="{{ route('admin.news-items.create') }}" class="btn">Add news item</a></p>
  <div class="card" style="padding:0;overflow-x:auto;">
    <table>
      <thead>
        <tr>
          <th>Image</th>
          <th>Title</th>
          <th>Slug</th>
          <th>Published</th>
          <th>Visible</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($items as $item)
          <tr>
            <td>@if($item->image)<img src="{{ media_url($item->image) }}" alt="" class="thumb" style="max-width:56px;max-height:56px;">@endif</td>
            <td>{{ $item->title }}</td>
            <td><code style="font-size:0.8rem;">{{ $item->slug }}</code></td>
            <td>{{ $item->published_at?->format('Y-m-d H:i') ?? '—' }}</td>
            <td>{{ $item->isVisible() ? 'Yes' : 'No' }}</td>
            <td>
              <a href="{{ route('news.show', $item->slug) }}" target="_blank" rel="noopener">View</a>
              ·
              <a href="{{ route('admin.news-items.edit', $item) }}">Edit</a>
              <form action="{{ route('admin.news-items.destroy', $item) }}" method="post" style="display:inline;" onsubmit="return confirm('Delete this news item?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn--danger" style="margin-top:0;padding:0.25rem 0.5rem;font-size:0.8rem;">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6">No news items yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
