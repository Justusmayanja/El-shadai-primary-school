@extends('admin.layout')

@section('title', 'Admission applications')

@section('content')
  <h1 style="margin-top:0;">Admission applications</h1>
  <div class="card" style="padding:0;overflow-x:auto;">
    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Child</th>
          <th>Class</th>
          <th>Parent</th>
          <th>Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($applications as $app)
          <tr>
            <td>{{ $app->created_at->format('Y-m-d') }}</td>
            <td>{{ $app->child_name }}</td>
            <td>{{ $app->applying_class }}</td>
            <td>{{ $app->parent_name }}<br><span class="muted">{{ $app->email }}</span></td>
            <td>{{ $app->status }}</td>
            <td><a href="{{ route('admin.admission-applications.show', $app) }}">View</a></td>
          </tr>
        @empty
          <tr><td colspan="6">No applications yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  {{ $applications->links() }}
@endsection
