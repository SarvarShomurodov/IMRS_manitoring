<?php

namespace App\Http\Controllers;

use App\Models\Quarter;
use App\Models\WhoGiven;
use App\Models\Convention;
use App\Models\ConventionType;
use Illuminate\Http\Request;

class ConventionController extends Controller
{
    public function index()
    {
        $conventions = Convention::all();
        return view('admin.Convention.index',compact('conventions'))->with('i');
    }
    public function create()
    {
        $quarters = Quarter::all();
        $whogivens = WhoGiven::all();
        $conventionstypes = ConventionType::all();
        return view('admin.Convention.create',compact(['quarters','whogivens','conventionstypes']));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'who_given_id' => 'required|exists:who_givens,id',
            'type_id'=>'required|exists:publish_types,id',
            'organizer' => 'required|string',
            'date' => 'required|date',
            'address' => 'required|string',
            'employees_count' => 'required|integer',
            'list' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        Convention::create($validatedData);

        return redirect()->route('conventions.index')->with('success', 'Convention created successfully!');
    }
    public function edit(string $id)
    {
        $quarters = Quarter::all();
        $whogivens = WhoGiven::all();
        // $item = ConventionType::findOrFail($id);
        $publishTypes = ConventionType::all();
        $conventions = Convention::findOrFail($id);
        // var_dump($item->name);
        return view('admin.Convention.edit',compact(['quarters','whogivens','publishTypes','conventions']));
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'who_given_id' => 'required|exists:who_givens,id',
            'type_id'=>'required|exists:publish_types,id',
            'organizer' => 'required|string',
            'date' => 'required|date',
            'address' => 'required|string',
            'employees_count' => 'required|integer',
            'list' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);
        $conventions = Convention::findOrFail($id);

        $conventions->update($validatedData);

        return redirect()->route('conventions.index')->with('success', 'Convention Update successfully!');
    }
}
