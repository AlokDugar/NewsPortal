<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use App\Models\NewsDetails;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats=NewsCategory::all();
        $types=Type::all();
        return view('dashboard.news_details',compact('cats', 'types'));
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
        Log::info('Store method started.', ['request_data' => $request->all()]);

        // Validate the incoming request data
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'image_path' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
                'category_ids' => 'required|array',
                'category_ids.*' => 'exists:news_categories,id',
                'type_id' => 'required|exists:types,id',
                'author' => 'required|string|max:255',
                'publisher' => 'required|string|max:255',
                'state' => 'required|string|max:100',
                'content' => 'required|string',
            ]);
            Log::info('Request validated successfully.', ['validated_data' => $data]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed.', ['error' => $e->errors()]);
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        // Handle file upload if present
        if ($request->hasFile('image_path')) {
            try {
                $data['image_path'] = $request->file('image_path')->store('news_images', 'public');
                Log::info('Image uploaded successfully.', ['image_path' => $data['image_path']]);
            } catch (\Exception $e) {
                Log::error('Image upload failed.', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Failed to upload image.');
            }
        } else {
            Log::info('No image uploaded.');
        }

        // Create the news article
        try {
            $news = NewsDetails::create($data);
            Log::info('News article created successfully.', ['news_id' => $news->id]);
        } catch (\Exception $e) {
            Log::error('News article creation failed.', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to create news article.');
        }

        // Sync the categories with the news article
        try {
            $news->categories()->sync($request->input('category_ids', []));
            Log::info('Categories synced successfully.', ['categories' => $request->input('category_ids')]);
        } catch (\Exception $e) {
            Log::error('Category syncing failed.', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to sync categories.');
        }

        // Return a success response
        Log::info('News article created successfully. Redirecting to previous page.');
        return redirect()->back()->with('success', 'News article created successfully.');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->
                getClientOriginalExtension();

            $fileName = $fileName .'_'.time() . '.' . $extension;
            $request->file('upload')->move (public_path('media'), $fileName);
            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1,'url' => $url]);
        }
    }
}

