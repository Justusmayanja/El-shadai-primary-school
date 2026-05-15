<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryPhoto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryPhotoController extends Controller
{
    public function index(): View
    {
        $photos = GalleryPhoto::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.gallery-photos.index', compact('photos'));
    }

    public function create(): View
    {
        return view('admin.gallery-photos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validateRequest($request, true);
        GalleryPhoto::query()->create([
            'alt' => $request->input('alt'),
            'sort_order' => (int) $request->input('sort_order', 0),
            'image' => $this->resolveImage($request, null),
        ]);

        return redirect()->route('admin.gallery-photos.index')->with('status', 'Photo added.');
    }

    public function edit(GalleryPhoto $gallery_photo): View
    {
        return view('admin.gallery-photos.edit', ['photo' => $gallery_photo]);
    }

    public function update(Request $request, GalleryPhoto $gallery_photo): RedirectResponse
    {
        $this->validateRequest($request, false);
        $gallery_photo->update([
            'alt' => $request->input('alt'),
            'sort_order' => (int) $request->input('sort_order', 0),
            'image' => $this->resolveImage($request, $gallery_photo->image),
        ]);

        return redirect()->route('admin.gallery-photos.index')->with('status', 'Photo updated.');
    }

    public function destroy(GalleryPhoto $gallery_photo): RedirectResponse
    {
        delete_public_upload($gallery_photo->image);
        $gallery_photo->delete();

        return redirect()->route('admin.gallery-photos.index')->with('status', 'Photo removed.');
    }

    private function validateRequest(Request $request, bool $isCreate): void
    {
        normalize_image_upload_request($request);

        $request->validate([
            'alt' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
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

            return $request->file('image_file')->store('gallery', 'public');
        }

        $url = $request->input('image_url');
        if (is_string($url) && $url !== '') {
            delete_public_upload($previous);

            return $url;
        }

        return $previous;
    }
}
