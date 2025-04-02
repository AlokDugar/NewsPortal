<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

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
            'website_url'=> 'required|url',
            'logo'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $settings = Setting::firstOrCreate([]);
        $settings->website_name = $request->website_name;
        $settings->website_url = $request->website_url;

        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('logo', 'public');
            $settings->logo = $imagePath;
        }

        $settings->save();

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}

