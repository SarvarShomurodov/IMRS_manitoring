<?php

namespace App\Http\Controllers;

use App\Models\BusinessTrip;
use Illuminate\Http\Request;

class BusinessTripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businessTrips = BusinessTrip::all();
        return view('admin.BusinessTrip.index', compact('businessTrips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.BusinessTrip.create');
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
            'adress' => 'required|string',
            'list_person' => 'required|string',
            'data_name' => 'required|string',
            'invite_count' => 'required|integer',
            'ball' => 'required|integer',
            'quarter' => 'required|string',
        ]);

        BusinessTrip::create($validatedData);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
