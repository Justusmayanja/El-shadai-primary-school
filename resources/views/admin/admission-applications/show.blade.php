@extends('admin.layout')

@section('title', 'Application')

@section('content')
  <p><a href="{{ route('admin.admission-applications.index') }}">← Back to applications</a></p>
  <div class="card">
    <p class="muted">Submitted {{ $application->created_at->format('Y-m-d H:i') }} · Status: <strong>{{ $application->status }}</strong></p>
    <h2 style="margin-top:0;font-size:1.1rem;">Child</h2>
    <p><strong>Name:</strong> {{ $application->child_name }}</p>
    <p><strong>Date of birth:</strong> {{ $application->date_of_birth->format('Y-m-d') }}</p>
    <p><strong>Class applying for:</strong> {{ $application->applying_class }}</p>
    <h2 style="font-size:1.1rem;">Parent / guardian</h2>
    <p><strong>Name:</strong> {{ $application->parent_name }}</p>
    <p><strong>Phone:</strong> {{ $application->phone }}</p>
    <p><strong>Email:</strong> {{ $application->email }}</p>
    @if($application->previous_school)
      <p><strong>Previous school:</strong> {{ $application->previous_school }}</p>
    @endif
    @if($application->notes)
      <h2 style="font-size:1.1rem;">Notes</h2>
      <p style="white-space:pre-wrap;">{{ $application->notes }}</p>
    @endif
  </div>
  <div class="card">
    <h2 style="margin-top:0;font-size:1rem;">Update status</h2>
    <form method="post" action="{{ route('admin.admission-applications.update', $application) }}">
      @csrf
      @method('PATCH')
      <label>Status
        <select name="status">
          @foreach (['new','viewed','contacted','accepted','rejected','archived'] as $st)
            <option value="{{ $st }}" @selected(old('status', $application->status) === $st)>{{ $st }}</option>
          @endforeach
        </select>
      </label>
      <button type="submit" class="btn">Save status</button>
    </form>
  </div>
@endsection
