<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index(){
        $settings = Setting::first();
        return view('dashboard.settings', compact('settings'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'website_name'=> 'required|string|max:255',
            'dashboard_logo'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'site_logo'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:png,ico|max:512',
        ]);

        $settings = Setting::firstOrCreate([]);
        $settings->website_name = $request->website_name;

        if ($request->hasFile('dashboard_logo')) {
            if ($settings->dashboard_logo) {
                Storage::delete('public/' . $settings->dashboard_logo);
            }
            $imagePath = $request->file('dashboard_logo')->store('dashboard_logo', 'public');
            $settings->dashboard_logo = $imagePath;
        }
        if ($request->hasFile('site_logo')) {
            if ($settings->site_logo) {
                Storage::delete('public/' . $settings->site_logo);
            }
            $imagePath = $request->file('site_logo')->store('site_logo', 'public');
            $settings->site_logo = $imagePath;
        }

        if ($request->hasFile('favicon')) {
            if ($settings->favicon) {
                Storage::delete('public/' . $settings->favicon);
            }
            $settings->favicon = $request->file('favicon')->store('favicon', 'public');
        }

        $settings->save();

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}

