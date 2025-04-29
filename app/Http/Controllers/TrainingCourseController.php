<?php

namespace App\Http\Controllers;

use App\Models\Region;
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
        return view('admin.TrainingCourse.index', compact('trainingCourses'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quarters = Quarter::all();
        $regions = Region::all();
        return view('admin.TrainingCourse.create',compact(['quarters','regions']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'sertificateNum'=>'required|string',
            'organizer' => 'required|string',
            'date' => 'required|date',
            'regions_id' => 'required|array',           // Massiv sifatida tekshiradi
            'regions_id.*' => 'exists:regions,id',      // Har bir qiymat `regions` jadvalida mavjudligini tekshiradi
            'invite_count' => 'required|integer',
            'list_person' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        // Asosiy ma'lumotlarni yaratish
        $trainingCourse = TrainingCourse::create([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'sertificateNum' => $validatedData['sertificateNum'],
            'organizer' => $validatedData['organizer'],
            'date' => $validatedData['date'],
            'invite_count' => $validatedData['invite_count'],
            'list_person' => $validatedData['list_person'],
            'quarters_id' => $validatedData['quarters_id'],
        ]);

        // Oraliq jadvalga yozish
        $trainingCourse->regions()->sync($validatedData['regions_id']);

        return redirect()->route('training_courses.index')->with('success', 'Training course created successfully!');
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
        $trainingCourses = TrainingCourse::findOrFail($id);
        return view('admin.TrainingCourse.edit',compact(['quarters','trainingCourses','regions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Yuborilgan ma'lumotlarni tekshirish
        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'sertificateNum'=>'required|string',
            'organizer' => 'required|string',
            'date' => 'required|date',
            'regions_id' => 'required|array',           // Massiv sifatida tekshiradi
            'regions_id.*' => 'exists:regions,id',      // Har bir qiymat `regions` jadvalida mavjudligini tekshiradi
            'invite_count' => 'required|integer',
            'list_person' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);
    
        // Mavjud training course ni olish
        $trainingCourse = TrainingCourse::findOrFail($id);
    
        // Asosiy ma'lumotlarni yangilash
        $trainingCourse->update([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'sertificateNum' => $validatedData['sertificateNum'],
            'organizer' => $validatedData['organizer'],
            'date' => $validatedData['date'],
            'invite_count' => $validatedData['invite_count'],
            'list_person' => $validatedData['list_person'],
            'quarters_id' => $validatedData['quarters_id'],
        ]);
    
        // Oraliq jadvalga yangi regionlarni bog'lash (avvalgi bog'lanishni yangilash)
        $trainingCourse->regions()->sync($validatedData['regions_id']);
    
        return redirect()->route('training_courses.index')->with('success', 'Training course updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trainingCourses = TrainingCourse::findOrFail($id);
        $trainingCourses->delete();
        return redirect()->route('training_courses.index')->with('success', 'Training Course deleted successfully.');
    }
}
