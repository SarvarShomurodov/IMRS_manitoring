<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Quarter;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.Event.index',compact('events'))->with('i');
    }
    public function create()
    {
        $quarters = Quarter::all();
        return view('admin.Event.create',compact('quarters'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'basis' => 'required|string',
            'organizer' => 'required|string',
            'goal' => 'required|string',
            'date' => 'required|date',
            'place' => 'required|string',
            'foreignNum' => 'required|integer',
            'localNum' => 'required|integer',
            'result' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        Event::create($validatedData);

        return redirect()->route('event.index')->with('success', 'Event created successfully!');
    }
    public function edit(string $id)
    {
        $quarters = Quarter::all();
        $events = Event::findOrFail($id);
        return view('admin.Event.edit',compact(['quarters','events']));
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'basis' => 'required|string',
            'organizer' => 'required|string',
            'goal' => 'required|string',
            'date' => 'required|date',
            'place' => 'required|string',
            'foreignNum' => 'required|integer',
            'localNum' => 'required|integer',
            'result' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);
        $events = Event::findOrFail($id);

        $events->update($validatedData);

        return redirect()->route('event.index')->with('success', 'Event Update successfully!');
    }
    public function destroy(string $id)
    {
        $events = Event::findOrFail($id);
        $events->delete();
        return redirect()->route('event.index')->with('success', 'Event deleted successfully.');
    }
}
