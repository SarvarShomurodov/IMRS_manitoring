<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Survey;
use App\Models\Quarter;
use App\Models\WhoGiven;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $survays = Survey::all();
        return view('admin.Survay.index',compact('survays'))->with('i');
    }
    public function create()
    {
        $quarters = Quarter::all();
        $whogivens = WhoGiven::all();
        $regions = Region::all();
        return view('admin.Survay.create',compact(['quarters','whogivens','regions']));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'who_given_id' => 'required|exists:who_givens,id',
            'assDate' => 'required|date',
            'assNumber' => 'required|integer',
            'whoSend' => 'required|string',
            'letterDate' => 'required|date',
            'letterNumber' => 'required|integer',
            'direction' => 'required|string',
            'regions_id' => 'required|exists:regions,id',
            'shortResult' => 'nullable|string',
            'readyArticle' => 'nullable|string',
            'telegram' => 'nullable|string',
            'pressRelis' => 'nullable|string',
            'infografik' => 'nullable|string',
            'interyu' => 'nullable|string',
            'taqdimot' => 'nullable|string',
            'listPerson' => 'nullable|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        Survey::create($validatedData);

        return redirect()->route('survay.index')->with('success', 'Survay created successfully!');
    }
    public function edit(string $id)
    {
        $quarters = Quarter::all();
        $whogivens = WhoGiven::all();
        $regions = Region::all();
        $survays = Survey::findOrFail($id);
        return view('admin.Survay.edit',compact(['quarters','whogivens','regions','survays']));
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'who_given_id' => 'required|exists:who_givens,id',
            'assDate' => 'required|date',
            'assNumber' => 'required|integer',
            'whoSend' => 'required|string',
            'letterDate' => 'required|date',
            'letterNumber' => 'required|integer',
            'direction' => 'required|string',
            'regions_id' => 'required|exists:regions,id',
            'shortResult' => 'nullable|string',
            'readyArticle' => 'nullable|string',
            'telegram' => 'nullable|string',
            'pressRelis' => 'nullable|string',
            'infografik' => 'nullable|string',
            'interyu' => 'nullable|string',
            'taqdimot' => 'nullable|string',
            'listPerson' => 'nullable|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);
        $survays = Survey::findOrFail($id);

        $survays->update($validatedData);

        return redirect()->route('survay.index')->with('success', 'Survay Update successfully!');
    }
    public function destroy(string $id)
    {
        $survays = Survey::findOrFail($id);
        $survays->delete();
        return redirect()->route('survay.index')->with('success', 'Survay deleted successfully.');
    }
}
