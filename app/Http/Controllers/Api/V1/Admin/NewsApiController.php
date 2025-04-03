<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsDetails;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class NewsApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => NewsDetails::all()
        ]);
    }
/*
    public function show($id)
    {
        $news = NewsDetails::find($id);
        if (!$news) {
            return response()->json(['message' => 'News not found'], 404);
        }
        return response()->json($news);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'image_path' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
                'category_ids' => 'required|array',
                'category_ids.*' => 'exists:news_categories,id',
                'type_id' => 'required|exists:types,id',
                'author' => 'nullable|string|max:255',
                'publisher' => 'nullable|string|max:255',
                'state' => 'required|string|in:Published,Unpublished',
                'content' => 'required|string',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation failed.', 'details' => $e->errors()], 422);
        }

        if ($request->hasFile('image_path')) {
            try {
                $data['image_path'] = $request->file('image_path')->store('news_images', 'public');
            } catch (\Exception $e) {
                return response()->json(['error' => 'Failed to upload image.'], 500);
            }
        }

        try {
            $news = NewsDetails::create($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create news article.'], 500);
        }

        try {
            $news->categories()->sync($request->input('category_ids', []));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to sync categories.'], 500);
        }

        return response()->json(['success' => true, 'data' => $news], 201);
    }

    public function update(Request $request, $id)
    {
        //dump($request->all());
        Log::info($id);
        Log::info($request->all());
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'image_path' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
                'category_ids' => 'required|array',
                'category_ids.*' => 'exists:news_categories,id',
                'type_id' => 'required|exists:types,id',
                'author' => 'nullable|string|max:255',
                'publisher' => 'nullable|string|max:255',
                'state' => 'required|string|in:Published,Unpublished',
                'content' => 'required|string',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation failed.', 'details' => $e->errors()], 422);
        }

        $news = NewsDetails::find($id);
        if (!$news) {
            return response()->json(['error' => 'News article not found.'], 404);
        }

        if ($request->hasFile('image_path')) {
            try {
                if ($news->image_path) {
                    Storage::disk('public')->delete($news->image_path);
                }

                $data['image_path'] = $request->file('image_path')->store('news_images', 'public');
            } catch (\Exception $e) {
                return response()->json(['error' => 'Failed to upload image.'], 500);
            }
        }
        try {
            $news->update($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update news article.'], 500);
        }

        try {
            $news->categories()->sync($request->input('category_ids', []));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to sync categories.'], 500);
        }
        return response()->json(['success' => true, 'data' => $news], 200);
    }

    public function destroy($id)
    {
        $news = NewsDetails::find($id);
        if (!$news) {
            return response()->json(['message' => 'News not found'], 404);
        }
        $news->delete();
        return response()->json(['message' => 'News deleted successfully']);
    }
*/
}

