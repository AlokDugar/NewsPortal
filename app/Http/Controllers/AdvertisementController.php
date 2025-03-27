<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\AdvertisementType;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads=Advertisement::all();
        $adTypes=AdvertisementType::all();
        return view('dashboard.advertisements',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type_id' => 'required|string',
            'details'   => 'nullable|mimes:jpeg,png,jpg,gif,mp4,mov,avi',
            'image_url' => 'nullable|url',
            'url' => 'required|string',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        $image_path=null;
        if ($request->hasFile('details')) {
            $imagePath = $request->file('details')->store('advertisements', 'public');
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        if (!$imagePath) {
            return redirect()->back()->with('error', 'Please provide an image file or a valid image URL.');
        }

        Advertisement::create([
            'type_id' => $request->type_id,
            'details' => $imagePath,
            'url' => $request->url,
            'status' => $request->status,
        ]);

        return redirect()->route('ads.index')->with('success', 'Advertisement created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type_id' => 'required|string',
            'details'   => 'nullable|mimes:jpeg,png,jpg,gif,mp4,mov,avi',
            'image_url' => 'nullable|url',
            'url' => 'required|string',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        $image_path=null;
        if ($request->hasFile('details')) {
            $imagePath = $request->file('details')->store('advertisements', 'public');
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        if (!$imagePath) {
            return redirect()->back()->with('error', 'Please provide an image file or a valid image URL.');
        }
        $ad = Advertisement::find($id);
        $ad->type_id = $request->type_id;
        $ad->details = $imagePath;
        $ad->url = $request->url;
        $ad->status = $request->status;
        $ad->save();

        return redirect()->route('ads.index')->with('success', 'Advertisement created successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ad = Advertisement::findOrFail($id);
        $ad->delete();

        return redirect()->route('ads.index')->with('success', 'Advertisement deleted successfully!');
    }
    public function updateStatus(Request $request)
    {
        $request->validate([
            'ad_id' => 'required|exists:news_categories,id',
            'status' => 'required|in:Active,Inactive',
        ]);

        $ad = Advertisement::find($request->ad_id);
        $ad->status = $request->status;
        $ad->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }
}
