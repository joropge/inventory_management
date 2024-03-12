<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Item;
use Dotenv\Util\Str;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        //
        return view('loans.index', [
            "loans" => Loan::all(),
        ])  ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $selectedItem = request()->input('item_id'); 

        return view('loans.create', [
            "items" => Item::all(),
            "selectedItem" => $selectedItem,
            ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'due_date' => 'required|date',
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['checkout_date'] = now();

        Loan::create($validated);

        return redirect()->route('loans.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan):View
    {
        //
        return view('loans.show', [
            "loan" => $loan,
        ]);
    }   


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        $loan->update([
            'returned_date' => now(),
        ]);

        return redirect()->route('loans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
