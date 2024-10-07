<?php

namespace App\Http\Controllers;

use App\Models\Publish;
use App\Models\Publish_type;
use App\Models\Quarter;
use Illuminate\Http\Request;

class PublishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishes = Publish::all();
        return view('admin.Publish.index', compact('publishes'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quarters = Quarter::all();
        $publishTypes = Publish_type::all();
        return view('admin.Publish.create',compact(['quarters','publishTypes']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'author' => 'required|string',
            'type_id' => 'required|exists:publish_types,id',
            'jurnal_name' => 'required|string',
            'date' => 'required|date',
            'number' => 'required|integer',
            'pages' => 'required|integer',
            'link' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        Publish::create($validatedData);

        return redirect()->route('publishes.index')->with('success', 'Publishes created successfully!');
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
        $publishTypesIds = Publish_type::all();
        $publishTypes = Publish::findOrFail($id);
        return view('admin.Publish.edit',compact(['quarters','publishTypes','publishTypesIds']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'author' => 'required|string',
            'type_id' => 'required|exists:publish_types,id',
            'jurnal_name' => 'required|string',
            'date' => 'required|date',
            'number' => 'required|integer',
            'pages' => 'required|integer',
            'link' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);
        $publishes = Publish::findOrFail($id);

        $publishes->update($validatedData);

        return redirect()->route('publishes.index')->with('success', 'Publishes Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $businessTrips = Publish::findOrFail($id);
        $businessTrips->delete();
        return redirect()->route('business_trips.index')->with('success', 'BusinesTrip deleted successfully.');
    }
}
