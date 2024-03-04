<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('items.index', [
            'items' => Item::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //mostrar los items
        return view('items.show', [
            'item' => $item,
            ]);
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //mostrar el formulario de edicion
        return view('items.edit', [
            'item' => $item,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //actualizar el item con los datos del formulario
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->stock = $request->stock;

        $item->save();

        return redirect()->route('items.show', $item);
        
        // $item->update($request->all());
        // return redirect()->route('items.show', $item);

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
