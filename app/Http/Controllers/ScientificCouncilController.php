<?php

namespace App\Http\Controllers;

use App\Models\Quarter;
use Illuminate\Http\Request;
use App\Models\ScientificCouncil;
use App\Models\ScientificDegree;

class ScientificCouncilController extends Controller
{
    public function index(Request $request)
    {
         // Start a query for ScientificCouncil
        $query = ScientificCouncil::query();

        // Apply quarters_id filter if provided
        if ($request->filled('quarters_id')) {
            $query->where('quarters_id', $request->input('quarters_id'));
        }

        // Get the filtered results
        $scientifics = $query->get();

        // Pass the quarters list (assuming it's already retrieved in your controller or use Quarters::all() if needed)
        $quarters = Quarter::all();
        return view('admin.ScientificCouncil.index',compact(['scientifics','quarters']))->with('i');
    }
    public function create()
    {
        $quarters = Quarter::all();
        $scientificIds = ScientificDegree::all();
        return view('admin.ScientificCouncil.create',compact(['quarters','scientificIds']));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'degree_id' => 'required|exists:scientific_degrees,id',
            'name' => 'required|string',
            'type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'date' => 'required|date',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        ScientificCouncil::create($validatedData);

        return redirect()->route('scientific.index')->with('success', 'Scientific Council created successfully!');
    }
    public function edit(string $id)
    {
        $quarters = Quarter::all();
        $scientificIds = ScientificDegree::all();
        $scientifics = ScientificCouncil::findOrFail($id);
        return view('admin.ScientificCouncil.edit',compact(['quarters','scientificIds','scientifics']));
    }
    public function update(Request $request,string $id)
    {
        $validatedData = $request->validate([
            'degree_id' => 'required|exists:scientific_degrees,id',
            'name' => 'required|string',
            'type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'date' => 'required|date',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        $scientifics = ScientificCouncil::findOrFail($id);
        $scientifics->update($validatedData);

        return redirect()->route('scientific.index')->with('success', 'Scientific Council Update successfully!');
    }
    public function destroy(string $id)
    {
        $scientifics = ScientificCouncil::findOrFail($id);
        $scientifics->delete();
        return redirect()->route('scientific.index')->with('success', 'Scientific Council deleted successfully.');
    }

}
