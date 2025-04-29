<?php

namespace App\Http\Controllers;

use App\Models\WhoGiven;
use Illuminate\Http\Request;

class WhoGivenController extends Controller
{
    public function index()
    {
        $givens = WhoGiven::all();
        return view('admin.WhoGiven.index',compact('givens'))->with('i');
    }
    public function create()
    {
        // $quarters = Quarter::all();
        return view('admin.WhoGiven.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'year_num' => 'nullable',
        ]);

        WhoGiven::create($validatedData);

        return redirect()->route('whogivens.index')->with('success', 'WhoGiven created successfully!');
    }
    public function edit(string $id)
    {
        $givens = WhoGiven::findOrFail($id);
        return view('admin.WhoGiven.edit',compact('givens'));
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'year_num' => 'nullable',
        ]);
        $givens = WhoGiven::findOrFail($id);

        $givens->update($validatedData);

        return redirect()->route('whogivens.index')->with('success', 'WhoGiven Update successfully!');
    }
    public function destroy(string $id)
    {
        $givens = WhoGiven::findOrFail($id);
        $givens->delete();
        return redirect()->route('whogivens.index')->with('success', 'WhoGiven deleted successfully.');
    }
}
