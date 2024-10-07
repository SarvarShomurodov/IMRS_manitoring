<?php

namespace App\Http\Controllers;

use App\Models\Quarter;
use App\Models\HigherOrgan;
use App\Models\WhoGiven;
use Illuminate\Http\Request;

class HigherOrganController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $higherOrgans = HigherOrgan::all();
        return view('admin.HigherOrgan.index', compact('higherOrgans'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quarters = Quarter::all();
        $whogivens = WhoGiven::all();
        return view('admin.HigherOrgan.create',compact(['quarters','whogivens']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'who_given_id' => 'required|exists:who_givens,id',
            'date' => 'required|date',
            'ass_number' => 'required|integer',
            'who_send' => 'required|string',
            'letter_date' => 'required|date',
            'letter_number' => 'required|integer',
            'direction' => 'required|string',
            'sorov' => 'required|string',
            'country' => 'required|string',
            'ball' => 'required|integer',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        HigherOrgan::create($validatedData);

        return redirect()->route('higher_organs.index')->with('success', 'Higher Organ created successfully!');
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
        $quarters = Quarter::all();
        $whogivens = WhoGiven::all();
        $higherOrgans = HigherOrgan::findOrFail($id);
        return view('admin.HigherOrgan.edit',compact(['quarters','whogivens','higherOrgans']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'who_given_id' => 'required|exists:quarters,id',
            'date' => 'required|date',
            'number' => 'required|integer',
            'who_send' => 'required|string',
            'letter_date' => 'required|date',
            'letter_number' => 'required|date',
            'direction' => 'required|string',
            'sorov' => 'required|string',
            'country' => 'required|string',
            'ball' => 'required|integer',
            'quarters_id' => 'required|exists:quarters,id',
        ]);
        $higherOrgans = HigherOrgan::findOrFail($id);

        $higherOrgans->update($validatedData);

        return redirect()->route('higher_organs.index')->with('success', 'Higher Organ Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $higherOrgans = HigherOrgan::findOrFail($id);
        $higherOrgans->delete();
        return redirect()->route('higher_organs.index')->with('success', 'Higher Organ deleted successfully.');
    }
}
