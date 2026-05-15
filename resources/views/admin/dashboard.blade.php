@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
  <div class="admin-page-head">
    <h1>Dashboard</h1>
    <p class="admin-muted" style="margin:0;max-width:42rem;">Manage team, facilities, gallery, news, contact details, and review enquiries and admission applications.</p>
  </div>

  <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:1rem;margin-bottom:1.5rem;">
    <a href="{{ route('admin.team-members.index') }}" class="admin-stat-card" style="text-decoration:none;color:inherit;">
      <span class="admin-stat-card__value">{{ $teamCount }}</span>
      <span class="admin-stat-card__label">Team members</span>
    </a>
    <a href="{{ route('admin.facilities.index') }}" class="admin-stat-card" style="text-decoration:none;color:inherit;">
      <span class="admin-stat-card__value">{{ $facilityCount }}</span>
      <span class="admin-stat-card__label">Facilities</span>
    </a>
    <a href="{{ route('admin.gallery-photos.index') }}" class="admin-stat-card" style="text-decoration:none;color:inherit;">
      <span class="admin-stat-card__value">{{ $galleryCount }}</span>
      <span class="admin-stat-card__label">Gallery photos</span>
    </a>
    <a href="{{ route('admin.news-items.index') }}" class="admin-stat-card" style="text-decoration:none;color:inherit;">
      <span class="admin-stat-card__value">{{ $newsCount }}</span>
      <span class="admin-stat-card__label">News items</span>
    </a>
    <a href="{{ route('admin.admission-applications.index') }}" class="admin-stat-card {{ $newApplications > 0 ? 'admin-stat-card--highlight' : '' }}" style="text-decoration:none;color:inherit;">
      <span class="admin-stat-card__value">{{ $newApplications }}</span>
      <span class="admin-stat-card__label">New applications</span>
    </a>
    <a href="{{ route('admin.contact-messages.index') }}" class="admin-stat-card {{ $unreadMessages > 0 ? 'admin-stat-card--highlight' : '' }}" style="text-decoration:none;color:inherit;">
      <span class="admin-stat-card__value">{{ $unreadMessages }}</span>
      <span class="admin-stat-card__label">Unread messages</span>
    </a>
  </div>

  <div class="admin-card">
    <h2 style="margin:0 0 0.75rem;font-size:1rem;font-weight:700;">Quick actions</h2>
    <p class="admin-muted" style="margin:0 0 1rem;">Jump to a section or open the public site to preview changes.</p>
    <div style="display:flex;flex-wrap:wrap;gap:0.5rem;">
      <a href="{{ route('admin.team-members.create') }}" class="btn btn--primary">Add team member</a>
      <a href="{{ route('admin.facilities.create') }}" class="btn btn--primary">Add facility</a>
      <a href="{{ route('admin.gallery-photos.create') }}" class="btn btn--primary">Add gallery photo</a>
      <a href="{{ route('admin.news-items.create') }}" class="btn btn--primary">Add news item</a>
      <a href="{{ route('admin.school-settings.edit') }}" class="btn btn--outline">Contact &amp; social</a>
      <a href="{{ route('home') }}" class="btn btn--outline" target="_blank" rel="noopener noreferrer">Preview website</a>
    </div>
  </div>

  <style>
    .admin-stat-card {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      padding: 1.15rem 1.2rem;
      background: #fff;
      border: 1px solid var(--admin-card-border, #e2e8f0);
      border-radius: var(--admin-radius, 10px);
      box-shadow: var(--admin-shadow, 0 1px 3px rgba(15, 23, 42, 0.08));
      transition: border-color 0.15s, box-shadow 0.15s, transform 0.15s;
    }
    .admin-stat-card:hover {
      border-color: #bae6fd;
      box-shadow: 0 4px 20px -4px rgba(14, 165, 233, 0.2);
      transform: translateY(-2px);
    }
    .admin-stat-card--highlight {
      border-color: #fcd34d;
      background: linear-gradient(135deg, #fffbeb 0%, #fff 50%);
    }
    .admin-stat-card__icon {
      font-size: 1.35rem;
      margin-bottom: 0.5rem;
      opacity: 0.9;
    }
    .admin-stat-card__value {
      font-size: 1.75rem;
      font-weight: 800;
      letter-spacing: -0.03em;
      color: var(--admin-text, #0f172a);
      line-height: 1.1;
    }
    .admin-stat-card__label {
      font-size: 0.8rem;
      color: var(--admin-muted, #64748b);
      font-weight: 600;
      margin-top: 0.25rem;
    }
  </style>
@endsection
