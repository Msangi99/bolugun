<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteTeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SiteTeamMemberController extends Controller
{
    public function index(): View
    {
        $members = SiteTeamMember::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.site-team-members.index', compact('members'));
    }

    public function create(): View
    {
        return view('admin.site-team-members.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validated($request);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('team', 'public');
        }

        SiteTeamMember::query()->create([
            'name' => $validated['name'],
            'role' => $validated['role'],
            'image_path' => $path,
            'twitter_url' => $validated['twitter_url'] ?: null,
            'facebook_url' => $validated['facebook_url'] ?: null,
            'linkedin_url' => $validated['linkedin_url'] ?: null,
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.team-members.index')->with('status', __('Team member created.'));
    }

    public function edit(SiteTeamMember $team_member): View
    {
        return view('admin.site-team-members.edit', ['member' => $team_member]);
    }

    public function update(Request $request, SiteTeamMember $team_member): RedirectResponse
    {
        $validated = $this->validated($request);

        $data = [
            'name' => $validated['name'],
            'role' => $validated['role'],
            'twitter_url' => $validated['twitter_url'] ?: null,
            'facebook_url' => $validated['facebook_url'] ?: null,
            'linkedin_url' => $validated['linkedin_url'] ?: null,
            'sort_order' => $validated['sort_order'] ?? $team_member->sort_order,
        ];

        if ($request->hasFile('image')) {
            if ($team_member->image_path && ! str_starts_with((string) $team_member->image_path, 'http')) {
                Storage::disk('public')->delete($team_member->image_path);
            }
            $data['image_path'] = $request->file('image')->store('team', 'public');
        }

        $team_member->update($data);

        return redirect()->route('admin.team-members.edit', $team_member)->with('status', __('Team member updated.'));
    }

    public function destroy(SiteTeamMember $team_member): RedirectResponse
    {
        if ($team_member->image_path && ! str_starts_with((string) $team_member->image_path, 'http')) {
            Storage::disk('public')->delete($team_member->image_path);
        }
        $team_member->delete();

        return redirect()->route('admin.team-members.index')->with('status', __('Team member removed.'));
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:4096', 'mimes:jpeg,jpg,png,webp,gif'],
            'twitter_url' => ['nullable', 'string', 'max:2048', 'url'],
            'facebook_url' => ['nullable', 'string', 'max:2048', 'url'],
            'linkedin_url' => ['nullable', 'string', 'max:2048', 'url'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
        ]);
    }
}
