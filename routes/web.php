<?php

use App\Http\Controllers\Admin\AdminAdmissionApplicationController;
use App\Http\Controllers\Admin\AdminContactMessageController;
use App\Http\Controllers\Admin\AuthenticatedSessionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\GalleryPhotoController;
use App\Http\Controllers\Admin\NewsItemController;
use App\Http\Controllers\Admin\SchoolSettingController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\AdmissionApplicationController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/academics', [PageController::class, 'academics'])->name('academics');
Route::get('/admissions', [PageController::class, 'admissions'])->name('admissions');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/news/{slug}', [PageController::class, 'newsShow'])->name('news.show')->where('slug', '[a-z0-9]+(?:-[a-z0-9]+)*');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');
Route::post('/admissions/apply', [AdmissionApplicationController::class, 'store'])->name('admissions.store');

Route::permanentRedirect('/index.html', '/');
Route::permanentRedirect('/about.html', '/about');
Route::permanentRedirect('/academics.html', '/academics');
Route::permanentRedirect('/admissions.html', '/admissions');
Route::permanentRedirect('/gallery.html', '/gallery');
Route::permanentRedirect('/contact.html', '/contact');
Route::permanentRedirect('/news.html', '/news');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    });

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');

        Route::resource('team-members', TeamMemberController::class)->except(['show']);
        Route::resource('facilities', FacilityController::class)->except(['show']);
        Route::resource('gallery-photos', GalleryPhotoController::class)->except(['show']);
        Route::resource('news-items', NewsItemController::class)->except(['show']);

        Route::get('school-settings/edit', [SchoolSettingController::class, 'edit'])->name('school-settings.edit');
        Route::patch('school-settings', [SchoolSettingController::class, 'update'])->name('school-settings.update');

        Route::get('contact-messages', [AdminContactMessageController::class, 'index'])->name('contact-messages.index');
        Route::get('contact-messages/{contact_message}', [AdminContactMessageController::class, 'show'])->name('contact-messages.show');
        Route::delete('contact-messages/{contact_message}', [AdminContactMessageController::class, 'destroy'])->name('contact-messages.destroy');

        Route::get('admission-applications', [AdminAdmissionApplicationController::class, 'index'])->name('admission-applications.index');
        Route::get('admission-applications/{admission_application}', [AdminAdmissionApplicationController::class, 'show'])->name('admission-applications.show');
        Route::patch('admission-applications/{admission_application}', [AdminAdmissionApplicationController::class, 'update'])->name('admission-applications.update');
    });
});
