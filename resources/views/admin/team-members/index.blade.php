@extends('admin.layout')

@section('title', 'Team members')

@section('content')
  <h1 style="margin-top:0;">Team members</h1>
  <p><a href="{{ route('admin.team-members.create') }}" class="btn">Add member</a></p>
  <div class="card" style="padding:0;overflow-x:auto;">
    <table>
      <thead>
        <tr>
          <th>Photo</th>
          <th>Name</th>
          <th>Role</th>
          <th>Order</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($members as $member)
          <tr>
            <td>@if($member->image)<img src="{{ media_url($member->image) }}" alt="" class="thumb" style="max-width:56px;max-height:56px;">@endif</td>
            <td>{{ $member->name }}</td>
            <td>{{ $member->role }}</td>
            <td>{{ $member->sort_order }}</td>
            <td>
              <a href="{{ route('admin.team-members.edit', $member) }}">Edit</a>
              <form action="{{ route('admin.team-members.destroy', $member) }}" method="post" style="display:inline;" onsubmit="return confirm('Delete this team member?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn--danger" style="margin-top:0;padding:0.25rem 0.5rem;font-size:0.8rem;">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="5">No team members yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
