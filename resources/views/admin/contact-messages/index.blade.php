@extends('admin.layout')

@section('title', 'Contact messages')

@section('content')
  <h1 style="margin-top:0;">Contact messages</h1>
  <div class="card" style="padding:0;overflow-x:auto;">
    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>From</th>
          <th>Preview</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($messages as $message)
          <tr style="{{ $message->read_at ? '' : 'font-weight:600;' }}">
            <td>{{ $message->created_at->format('Y-m-d H:i') }}</td>
            <td>{{ $message->name }}<br><span class="muted">{{ $message->email }}</span></td>
            <td>{{ \Illuminate\Support\Str::limit($message->message, 80) }}</td>
            <td><a href="{{ route('admin.contact-messages.show', $message) }}">View</a></td>
          </tr>
        @empty
          <tr><td colspan="4">No messages yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  {{ $messages->links() }}
@endsection
