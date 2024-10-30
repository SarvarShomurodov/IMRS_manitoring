<?php

namespace App\Http\Controllers;

use App\Models\Quarter;
use App\Models\Opublish;
use App\Models\WhoPublish;
use Illuminate\Http\Request;

class OAVPublishController extends Controller
{
    public function index()
    {
        $oavpublishes = Opublish::all();
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
