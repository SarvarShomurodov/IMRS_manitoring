<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Quarter;
use App\Models\WhoGiven;
use App\Models\HigherOrgan;
use Illuminate\Http\Request;

class HigherOrganController extends Controller
{
    public function indexAdmin(Request $request)
    {
        $query = HigherOrgan::query();

        // Apply regions_id filter if provided
        if ($request->filled('regions_id')) {
            $query->where('regions_id', $request->input('regions_id'));
        }

        // Apply quarters_id filter if provided
        if ($request->filled('quarters_id')) {
            $query->where('quarters_id', $request->input('quarters_id'));
        }

        // Get the filtered results
        $higherOrgans = $query->get();

        // Retrieve regions list and quarters list (assuming Quarters is a model)
        $regions = Region::all();
        $quarters = Quarter::all();
        return view('admin.HigherOrgan.indexAdmin',compact(['higherOrgans','regions','quarters']))->with('i');
    }
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       // Get the 'who_given_id' parameter from the URL
        $whoGivenId = $request->query('who_given_id');
        // Apply the filter only if 'who_given_id' is 6 or 8; otherwise, retrieve all records
        $higherOrgans = HigherOrgan::when(in_array($whoGivenId, [1,2,3,4,5,6,7,8]), function ($query) use ($whoGivenId) {
            return $query->where('who_given_id', $whoGivenId);
        })->get();

        return view('admin.HigherOrgan.index', compact('higherOrgans'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quarters = Quarter::all();
        $whogivens = WhoGiven::all();
        $regions = Region::all();
        return view('admin.HigherOrgan.create',compact(['quarters','whogivens','regions']));
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
            'regions_id' => 'required|exists:regions,id',
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
        $regions = Region::all();
        $higherOrgans = HigherOrgan::findOrFail($id);
        return view('admin.HigherOrgan.edit',compact(['quarters','whogivens','higherOrgans','regions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
            'regions_id' => 'required|exists:regions,id',
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
