<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolSettingController extends Controller
{
    public function edit(): View
    {
        $settings = SchoolSetting::query()->first();
        if (! $settings) {
            $settings = new SchoolSetting(SchoolSetting::defaultAttributes());
        }

        return view('admin.school-settings.edit', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'address' => ['nullable', 'string', 'max:500'],
            'email' => ['nullable', 'string', 'max:255', 'email'],
            'phone' => ['nullable', 'string', 'max:120'],
            'phone_tel' => ['nullable', 'string', 'max:64'],
            'whatsapp_digits' => ['nullable', 'string', 'max:32'],
            'facebook_url' => ['nullable', 'string', 'max:2048'],
            'instagram_url' => ['nullable', 'string', 'max:2048'],
            'twitter_url' => ['nullable', 'string', 'max:2048'],
            'youtube_url' => ['nullable', 'string', 'max:2048'],
            'tiktok_url' => ['nullable', 'string', 'max:2048'],
            'google_maps_embed_src' => ['nullable', 'string', 'max:65535'],
        ]);

        foreach (['facebook_url', 'instagram_url', 'twitter_url', 'youtube_url', 'tiktok_url'] as $urlKey) {
            $v = $data[$urlKey] ?? null;
            if (is_string($v) && trim($v) === '') {
                $data[$urlKey] = null;
            }
        }

        $settings = SchoolSetting::query()->first();
        if ($settings) {
            $settings->update($data);
        } else {
            SchoolSetting::query()->create($data);
        }

        return redirect()->route('admin.school-settings.edit')->with('status', 'Contact and social settings saved.');
    }
}
