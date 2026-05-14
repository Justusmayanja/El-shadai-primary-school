<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FacilityController extends Controller
{
    public function index(): View
    {
        $facilities = Facility::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.facilities.index', compact('facilities'));
    }

    public function create(): View
    {
        return view('admin.facilities.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validateRequest($request, true);
        Facility::query()->create([
            'title' => $request->input('title'),
            'icon' => $request->input('icon', '🏫'),
            'description' => $request->input('description'),
            'sort_order' => (int) $request->input('sort_order', 0),
            'image' => $this->resolveImage($request, null),
        ]);

        return redirect()->route('admin.facilities.index')->with('status', 'Facility created.');
    }

    public function edit(Facility $facility): View
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility): RedirectResponse
    {
        $this->validateRequest($request, false);
        $facility->update([
            'title' => $request->input('title'),
            'icon' => $request->input('icon', '🏫'),
            'description' => $request->input('description'),
            'sort_order' => (int) $request->input('sort_order', 0),
            'image' => $this->resolveImage($request, $facility->image),
        ]);

        return redirect()->route('admin.facilities.index')->with('status', 'Facility updated.');
    }

    public function destroy(Facility $facility): RedirectResponse
    {
        delete_public_upload($facility->image);
        $facility->delete();

        return redirect()->route('admin.facilities.index')->with('status', 'Facility removed.');
    }

    private function validateRequest(Request $request, bool $isCreate): void
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:32'],
            'description' => ['required', 'string', 'max:5000'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
            'image_url' => $isCreate
                ? ['required_without:image_file', 'nullable', 'string', 'max:2048']
                : ['nullable', 'string', 'max:2048'],
            'image_file' => $isCreate
                ? ['required_without:image_url', 'nullable', 'image', 'max:4096']
                : ['nullable', 'image', 'max:4096'],
        ]);
    }

    private function resolveImage(Request $request, ?string $previous): ?string
    {
        if ($request->hasFile('image_file')) {
            delete_public_upload($previous);

            return $request->file('image_file')->store('facilities', 'public');
        }

        $url = $request->input('image_url');
        if (is_string($url) && $url !== '') {
            delete_public_upload($previous);

            return $url;
        }

        return $previous;
    }
}
