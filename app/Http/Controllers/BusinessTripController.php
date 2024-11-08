<?php

namespace App\Http\Controllers;

use App\Models\Quarter;
use App\Models\BusinesTrip;
use App\Models\BusinessTrip;
use App\Models\Region;
use Illuminate\Http\Request;

class BusinessTripController extends Controller
{
    public function indexAdmin(Request $request)
    {
        $query = BusinesTrip::query();

        // Apply regions_id filter if provided
        if ($request->filled('regions_id')) {
            $query->where('regions_id', $request->input('regions_id'));
        }

        // Apply quarters_id filter if provided
        if ($request->filled('quarters_id')) {
            $query->where('quarters_id', $request->input('quarters_id'));
        }

        // Get the filtered results
        $businessTrips = $query->get();

        // Retrieve regions list and quarters list (assuming Quarters is a model)
        $regions = Region::all();
        $quarters = Quarter::all();
        return view('admin.BusinessTrip.indexAdmin',compact(['businessTrips','regions','quarters']))->with('i');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businessTrips = BusinesTrip::all();
        return view('admin.BusinessTrip.index', compact('businessTrips'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quarters = Quarter::all();
        $regions = Region::all();
        return view('admin.BusinessTrip.create',compact(['quarters','regions']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'goal' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'regions_id' => 'required|exists:regions,id',
            'list_person' => 'required|string',
            'data_name' => 'required|string',
            'invite_count' => 'nullable|integer',
            'ball' => 'required|integer',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        BusinesTrip::create($validatedData);

        return redirect()->route('business_trips.index')->with('success', 'Business trip created successfully!');
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
        $regions = Region::all();
        $businessTrips = BusinesTrip::findOrFail($id);
        return view('admin.BusinessTrip.edit',compact(['quarters','businessTrips','regions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'goal' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'regions_id' => 'required|exists:regions,id',
            'list_person' => 'required|string',
            'data_name' => 'required|string',
            'invite_count' => 'nullable|integer',
            'ball' => 'required|integer',
            'quarters_id' => 'required|exists:quarters,id',
        ]);
        $businessTrips = BusinesTrip::findOrFail($id);

        $businessTrips->update($validatedData);

        return redirect()->route('business_trips.index')->with('success', 'Business trip Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $businessTrips = BusinesTrip::findOrFail($id);
        $businessTrips->delete();
        return redirect()->route('business_trips.index')->with('success', 'BusinesTrip deleted successfully.');
    }
}
