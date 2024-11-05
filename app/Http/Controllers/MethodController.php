<?php

namespace App\Http\Controllers;

use App\Models\Method;
use App\Models\Quarter;
use Illuminate\Http\Request;

class MethodController extends Controller
{
    public function index()
    {
        $methods = Method::all();
        return view('admin.Method.index',compact('methods'))->with('i');
    }
    public function create()
    {
        $quarters = Quarter::all();
        return view('admin.Method.create',compact('quarters'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string',
            'name' => 'required|string',
            'position' => 'required|string',
            'reportName' => 'required|string',
            'date' => 'required|date',
            'number' => 'required|integer',
            'conclusion' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        Method::create($validatedData);

        return redirect()->route('methods.index')->with('success', 'Methods created successfully!');
    }
    public function edit(string $id)
    {
        $quarters = Quarter::all();
        $methods = Method::findOrFail($id);
        return view('admin.Method.edit',compact(['quarters','methods']));
    }
    public function update(Request $request,string $id)
    {
        $validatedData = $request->validate([
            'type' => 'required|string',
            'name' => 'required|string',
            'position' => 'required|string',
            'reportName' => 'required|string',
            'date' => 'required|date',
            'number' => 'required|integer',
            'conclusion' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        // Method::create($validatedData);
        $methods = Method::findOrFail($id);
        $methods->update($validatedData);

        return redirect()->route('methods.index')->with('success', 'Methods update successfully!');
    }
    public function destroy(string $id)
    {
        $methods = Method::findOrFail($id);
        $methods->delete();
        return redirect()->route('methods.index')->with('success', 'Methods deleted successfully.');
    }
}
