<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats=NewsCategory::all();
        return view('dashboard.categories',compact('cats'));
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
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'status' => 'required|string',
        ]);

        NewsCategory::create([
            'name' => $request->name,
            'url' => $request->url,
            'status' => $request->status,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
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
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string',
            'url' => 'required|string',
            'status' => 'required|in:Active,Pending,Inactive',
        ]);

        $category = NewsCategory::findOrFail($id);
        $category->name = $request->name;
        $category->url = $request->url;
        $category->status = $request->status;
        $category->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = NewsCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
    public function updateStatus(Request $request)
    {
        $request->validate([
            'cat_id' => 'required|exists:news_categories,id',
            'status' => 'required|in:Active,Pending,Inactive',
        ]);

        $category = NewsCategory::find($request->cat_id);
        $category->status = $request->status;
        $category->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

}
