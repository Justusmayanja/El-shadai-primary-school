<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsItemController extends Controller
{
    public function index(): View
    {
        $items = NewsItem::query()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->get();

        return view('admin.news-items.index', compact('items'));
    }

    public function create(): View
    {
        return view('admin.news-items.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validateRequest($request, true);
        NewsItem::query()->create([
            'title' => $request->input('title'),
            'slug' => $request->filled('slug') ? $request->input('slug') : null,
            'excerpt' => $request->input('excerpt'),
            'body' => $request->input('body'),
            'published_at' => $request->input('published_at') ?: null,
            'is_published' => $request->boolean('is_published'),
            'sort_order' => (int) $request->input('sort_order', 0),
            'image' => $this->resolveImage($request, null),
        ]);

        return redirect()->route('admin.news-items.index')->with('status', 'News item created.');
    }

    public function edit(NewsItem $news_item): View
    {
        return view('admin.news-items.edit', ['item' => $news_item]);
    }

    public function update(Request $request, NewsItem $news_item): RedirectResponse
    {
        $this->validateRequest($request, false);
        $news_item->update([
            'title' => $request->input('title'),
            'slug' => $request->filled('slug') ? $request->input('slug') : null,
            'excerpt' => $request->input('excerpt'),
            'body' => $request->input('body'),
            'published_at' => $request->input('published_at') ?: null,
            'is_published' => $request->boolean('is_published'),
            'sort_order' => (int) $request->input('sort_order', 0),
            'image' => $this->resolveImage($request, $news_item->image),
        ]);

        return redirect()->route('admin.news-items.index')->with('status', 'News item updated.');
    }

    public function destroy(NewsItem $news_item): RedirectResponse
    {
        delete_public_upload($news_item->image);
        $news_item->delete();

        return redirect()->route('admin.news-items.index')->with('status', 'News item removed.');
    }

    private function validateRequest(Request $request, bool $isCreate): void
    {
        normalize_image_upload_request($request);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:2000'],
            'body' => ['nullable', 'string', 'max:50000'],
            'published_at' => ['nullable', 'date'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
            'is_published' => ['nullable', 'boolean'],
            'image_url' => $isCreate
                ? ['required_without:image_file', 'nullable', 'string', 'max:2048']
                : ['nullable', 'string', 'max:2048'],
            'image_file' => $isCreate
                ? ['required_without:image_url', 'nullable', 'image', 'max:8192']
                : ['nullable', 'image', 'max:8192'],
        ]);
    }

    private function resolveImage(Request $request, ?string $previous): ?string
    {
        if ($request->hasFile('image_file')) {
            delete_public_upload($previous);

            return $request->file('image_file')->store('news', 'public');
        }

        $url = $request->input('image_url');
        if (is_string($url) && $url !== '') {
            delete_public_upload($previous);

            return $url;
        }

        return $previous;
    }
}
