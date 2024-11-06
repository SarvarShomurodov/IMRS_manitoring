<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Quarter;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::all();
        return view('admin.Meeting.index',compact('meetings'))->with('i');
    }
    public function create()
    {
        $quarters = Quarter::all();
        return view('admin.Meeting.create',compact('quarters'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nameGoal' => 'required|string',
            'organization' => 'required|string',
            'basis' => 'required|string',
            'format' => 'required|string',
            'date' => 'required|date',
            'address' => 'required|string',
            'list' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        Meeting::create($validatedData);

        return redirect()->route('meeting.index')->with('success', 'Meeting created successfully!');
    }
    public function edit(string $id)
    {
        $quarters = Quarter::all();
        $meetings = Meeting::findOrFail($id);
        return view('admin.Meeting.edit',compact(['quarters','meetings']));
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nameGoal' => 'required|string',
            'organization' => 'required|string',
            'basis' => 'required|string',
            'format' => 'required|string',
            'date' => 'required|date',
            'address' => 'required|string',
            'list' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);
        $meetings = Meeting::findOrFail($id);

        $meetings->update($validatedData);

        return redirect()->route('meeting.index')->with('success', 'Meeting Update successfully!');
    }
    public function destroy(string $id)
    {
        $meetings = Meeting::findOrFail($id);
        $meetings->delete();
        return redirect()->route('meeting.index')->with('success', 'Meeting deleted successfully.');
    }
}
