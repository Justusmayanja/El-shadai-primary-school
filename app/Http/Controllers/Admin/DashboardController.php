<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionApplication;
use App\Models\ContactMessage;
use App\Models\Facility;
use App\Models\GalleryPhoto;
use App\Models\NewsItem;
use App\Models\TeamMember;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'teamCount' => TeamMember::query()->count(),
            'facilityCount' => Facility::query()->count(),
            'galleryCount' => GalleryPhoto::query()->count(),
            'newsCount' => NewsItem::query()->count(),
            'newApplications' => AdmissionApplication::query()->where('status', 'new')->count(),
            'unreadMessages' => ContactMessage::query()->whereNull('read_at')->count(),
        ]);
    }
}
