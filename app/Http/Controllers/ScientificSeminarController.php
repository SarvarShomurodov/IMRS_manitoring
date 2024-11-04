<?php

namespace App\Http\Controllers;

use App\Models\Quarter;
use Illuminate\Http\Request;
use App\Models\ScientificDegree;
use App\Models\ScientificSeminar;

class ScientificSeminarController extends Controller
{
    public function index()
    {
        $scientifics = ScientificSeminar::all();
        return view('admin.ScientificSeminar.index',compact('scientifics'))->with('i');
    }
    public function create()
    {
        $quarters = Quarter::all();
        $scientificIds = ScientificDegree::all();
        return view('admin.ScientificSeminar.create',compact(['quarters','scientificIds']));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'organizationName' => 'required|string',
            'topic' => 'required|string',
            'leaderName' => 'required|string',
            'degree_id' => 'required|exists:scientific_degrees,id',
            'date' => 'required|date',
            'number' => 'required|integer',
            'conclusion' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        ScientificSeminar::create($validatedData);

        return redirect()->route('seminar.index')->with('success', 'Scientific Seminar created successfully!');
    }
    public function edit(string $id)
    {
        $quarters = Quarter::all();
        $scientificIds = ScientificDegree::all();
        $scientifics = ScientificSeminar::findOrFail($id);
        return view('admin.ScientificSeminar.edit',compact(['quarters','scientificIds','scientifics']));
    }
    public function update(Request $request,string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'organizationName' => 'required|string',
            'topic' => 'required|string',
            'leaderName' => 'required|string',
            'degree_id' => 'required|exists:scientific_degrees,id',
            'date' => 'required|date',
            'number' => 'required|integer',
            'conclusion' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        // ScientificSeminar::create($validatedData);
        $scientifics = ScientificSeminar::findOrFail($id);

        $scientifics->update($validatedData);

        return redirect()->route('seminar.index')->with('success', 'Scientific Seminar update successfully!');
    }
    public function destroy(string $id)
    {
        $scientifics = ScientificSeminar::findOrFail($id);
        $scientifics->delete();
        return redirect()->route('seminar.index')->with('success', 'Scientific Seminar deleted successfully.');
    }

}
