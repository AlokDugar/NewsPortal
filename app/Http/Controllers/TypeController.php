<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types=Type::all();
        return view('dashboard.types',compact('types'));
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
            'name' => 'required|string',
        ]);

        $type = new Type();
        $type->name = $request->name;
        $type->save();

        return redirect()->route('types.index')->with('success', 'Type created successfully!');
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
        $type = Type::findOrFail($id);
        $type->update([
            'name' => $request->input('name')
        ]);

        return redirect()->back()->with('success', 'Type updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Type::findOrFail($id);
        $type->delete();

        return redirect()->route('types.index')->with('success', 'Category deleted successfully!');
    }
}
