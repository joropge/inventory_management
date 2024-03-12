<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Item;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return view('items.index', [
            'items' => Item::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('items.create', [
            'boxes' => Box::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable|string|max:500',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'price' => 'nullable|numeric',
            'box_id' => 'nullable|exists:boxes,id',
        ]);

        

        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('public/photos');
        }

        Item::create($validated);

        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item):View
    {
        //mostrar los items
        return view('items.show', [
            'item' => $item,
            'boxes' => Box::all(),
            ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item):View
    {
        //mostrar el formulario de edicion
        return view('items.edit', [
            'item' => $item,
            'boxes' => Box::all(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //actualizar el item con los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'price' => 'nullable|numeric',
            'box_id' => 'nullable|exists:boxes,id',
        ]);

        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('public/photos');

            if ($item->picture) {
                Storage::delete($item->picture);
            }
        }

        $item->update($validated);

        return redirect()->route('items.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //eliminar el item
        $item->delete();
        return redirect()->route('items.index');
    }
}
