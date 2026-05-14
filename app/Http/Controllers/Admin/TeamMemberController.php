<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamMemberController extends Controller
{
    public function index(): View
    {
        $members = TeamMember::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.team-members.index', compact('members'));
    }

    public function create(): View
    {
        return view('admin.team-members.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validateRequest($request, true);
        $image = $this->resolveImage($request, null);
        TeamMember::query()->create([
            'name' => $request->input('name'),
            'role' => $request->input('role'),
            'bio' => $request->input('bio'),
            'sort_order' => (int) $request->input('sort_order', 0),
            'image' => $image,
        ]);

        return redirect()->route('admin.team-members.index')->with('status', 'Team member created.');
    }

    public function edit(TeamMember $team_member): View
    {
        return view('admin.team-members.edit', ['member' => $team_member]);
    }

    public function update(Request $request, TeamMember $team_member): RedirectResponse
    {
        $this->validateRequest($request, false);
        $image = $this->resolveImage($request, $team_member->image);
        $team_member->update([
            'name' => $request->input('name'),
            'role' => $request->input('role'),
            'bio' => $request->input('bio'),
            'sort_order' => (int) $request->input('sort_order', 0),
            'image' => $image,
        ]);

        return redirect()->route('admin.team-members.index')->with('status', 'Team member updated.');
    }

    public function destroy(TeamMember $team_member): RedirectResponse
    {
        delete_public_upload($team_member->image);
        $team_member->delete();

        return redirect()->route('admin.team-members.index')->with('status', 'Team member removed.');
    }

    private function validateRequest(Request $request, bool $isCreate): void
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string', 'max:5000'],
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

            return $request->file('image_file')->store('team', 'public');
        }

        $url = $request->input('image_url');
        if (is_string($url) && $url !== '') {
            delete_public_upload($previous);

            return $url;
        }

        return $previous;
    }
}
