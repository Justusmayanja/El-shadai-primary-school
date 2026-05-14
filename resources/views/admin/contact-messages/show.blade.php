@extends('admin.layout')

@section('title', 'Message')

@section('content')
  <p><a href="{{ route('admin.contact-messages.index') }}">← Back to messages</a></p>
  <div class="card">
    <p class="muted">{{ $message->created_at->format('Y-m-d H:i') }}</p>
    <p><strong>{{ $message->name }}</strong> &lt;{{ $message->email }}&gt;</p>
    @if($message->phone)<p>Phone: {{ $message->phone }}</p>@endif
    <hr style="border:none;border-top:1px solid #e4e4e7;margin:1rem 0;">
    <p style="white-space:pre-wrap;">{{ $message->message }}</p>
  </div>
  <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="post" onsubmit="return confirm('Delete this message?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn--danger">Delete message</button>
  </form>
@endsection
