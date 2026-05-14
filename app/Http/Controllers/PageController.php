<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\GalleryPhoto;
use App\Models\NewsItem;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $galleryPreview = GalleryPhoto::query()->orderBy('sort_order')->orderBy('id')->take(6)->get();
        $latestNews = NewsItem::query()
            ->published()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(6)
            ->get();

        return view('pages.home', [
            'active' => 'home',
            'galleryPreview' => $galleryPreview,
            'latestNews' => $latestNews,
        ]);
    }

    public function about(): View
    {
        $teamMembers = TeamMember::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('pages.about', [
            'active' => 'about',
            'teamMembers' => $teamMembers,
        ]);
    }

    public function academics(): View
    {
        $facilities = Facility::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('pages.academics', [
            'active' => 'academics',
            'facilities' => $facilities,
        ]);
    }

    public function admissions(): View
    {
        return view('pages.admissions', [
            'active' => 'admissions',
        ]);
    }

    public function gallery(): View
    {
        $photos = GalleryPhoto::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('pages.gallery', [
            'active' => 'gallery',
            'photos' => $photos,
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact', [
            'active' => 'contact',
        ]);
    }

    public function news(): View
    {
        $articles = NewsItem::query()
            ->published()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->get();

        return view('pages.news', [
            'active' => 'news',
            'articles' => $articles,
        ]);
    }

    public function newsShow(string $slug): View
    {
        $article = NewsItem::query()->where('slug', $slug)->firstOrFail();
        abort_unless($article->isVisible(), 404);

        return view('pages.news-show', [
            'active' => 'news',
            'article' => $article,
        ]);
    }
}
