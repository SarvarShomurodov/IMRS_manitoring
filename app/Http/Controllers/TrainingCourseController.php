<?php

namespace App\Http\Controllers;

use App\Models\Quarter;
use Illuminate\Http\Request;
use App\Models\TrainingCourse;

class TrainingCourseController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainingCourses = TrainingCourse::all();
        return view('admin.TrainingCourse.index', compact('trainingCourses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quarters = Quarter::all();
        return view('admin.TrainingCourse.create',compact('quarters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'organizer' => 'required|string',
            'date' => 'required|date',
            'adress' => 'required|string',
            'invite_count' => 'required|integer',
            'list_person' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        TrainingCourse::create($validatedData);

        return redirect()->route('training_courses.index')->with('success', 'Business trip created successfully!');
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
