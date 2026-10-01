<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index(): View
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $keys = [
            'business_name',
            'tagline',
            'whatsapp_number',
            'instagram_url',
            'email',
            'address',
            'business_hours',
            'hero_title',
            'hero_subtitle',
            'footer_text',
            'about_story',
            'service_notice_badge',
            'service_notice_title',
            'service_notice_message',
        ];

        foreach ($keys as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key));
            }
        }

        // Handle boolean toggle for service notice
        Setting::set('service_notice_enabled', $request->boolean('service_notice_enabled') ? '1' : '0');

        return redirect()->route('admin.settings.index')->with('success', 'Website settings updated successfully.');
    }
}
