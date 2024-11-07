<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        return view('admin.Region.index',compact('regions'))->with('i');
    }
    public function create()
    {
        $regions = Region::all();
        return view('admin.Region.create',compact('regions'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        Region::create($validatedData);

        return redirect()->route('region.index')->with('success', 'Region created successfully!');
    }
    public function edit(string $id)
    {
        $regions = Region::findOrFail($id);
        return view('admin.Region.edit',compact('regions'));
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        $regions = Region::findOrFail($id);

        $regions->update($validatedData);

        return redirect()->route('region.index')->with('success', 'Region update successfully!');
    }
    public function destroy(string $id)
    {
        $regions = Region::findOrFail($id);
        $regions->delete();
        return redirect()->route('region.index')->with('success', 'Region deleted successfully.');
    }
}
