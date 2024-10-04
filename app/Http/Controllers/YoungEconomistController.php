<?php

namespace App\Http\Controllers;

use App\Models\Quarter;
use Illuminate\Http\Request;
use App\Models\YoungEconomist;

class YoungEconomistController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $youngEconomists = YoungEconomist::all();
        return view('admin.YoungEconomist.index', compact('youngEconomists'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quarters = Quarter::all();
        return view('admin.YoungEconomist.create',compact('quarters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'date' => 'required|date',
            'list_person_local' => 'required|string',
            'list_person_no_local' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        YoungEconomist::create($validatedData);

        return redirect()->route('young_economists.index')->with('success', 'Young Economist created successfully!');
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
}
