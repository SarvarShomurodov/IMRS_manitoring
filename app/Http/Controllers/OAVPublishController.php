<?php

namespace App\Http\Controllers;

use App\Models\Quarter;
use App\Models\Opublish;
use App\Models\WhoPublish;
use Illuminate\Http\Request;

class OAVPublishController extends Controller
{
    public function index(Request $request)
    {
        // $oavpublishes = Opublish::all();
        // Get the 'who_given_id' parameter from the URL
        $oavId = $request->query('oav_id');
        // Apply the filter only if 'who_given_id' is 6 or 8; otherwise, retrieve all records
        $oavpublishes = Opublish::when(in_array($oavId, [1,2,3,4,5,6,7,8,9]), function ($query) use ($oavId) {
            return $query->where('oav_id', $oavId);
        })->get();
        return view('admin.Oav.index',compact('oavpublishes'))->with('i');
    }
    public function create()
    {
        $quarters = Quarter::all();
        $whogivens = WhoPublish::all();
        return view('admin.Oav.create',compact(['quarters','whogivens']));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'oav_id' => 'required|exists:who_publishes,id',
            'fio' => 'required|string',
            'oav_name' => 'required|string',
            'date' => 'required|date',
            'link' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);
        Opublish::create($validatedData);

        return redirect()->route('oavpublish.index')->with('success', 'OAV Publish created successfully!');
    }
    public function edit(string $id)
    {
        $quarters = Quarter::all();
        $whogivens = WhoPublish::all();
        $oavpublishes = Opublish::findOrFail($id);
        return view('admin.Oav.edit',compact(['quarters','whogivens','oavpublishes']));
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'oav_id' => 'required|exists:who_publishes,id',
            'fio' => 'required|string',
            'oav_name' => 'required|string',
            'date' => 'required|date',
            'link' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);
        $oavpublishes = Opublish::findOrFail($id);

        $oavpublishes->update($validatedData);

        return redirect()->route('oavpublish.index')->with('success', 'OAV Publish Update successfully!');
    }
    public function destroy(string $id)
    {
        $oavpublishes = Opublish::findOrFail($id);
        $oavpublishes->delete();
        return redirect()->route('oavpublish.index')->with('success', 'OAV Publish deleted successfully.');
    }
}
