<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Region;
use App\Models\Quarter;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function indexAdmin(Request $request)
    {
        $query = Event::query();

        // Apply regions_id filter if provided
        if ($request->filled('regions_id')) {
            $query->whereHas('regions', function ($q) use ($request) {
                $q->where('region_id', $request->input('regions_id'));
            });
        }

        // Apply quarters_id filter if provided
        if ($request->filled('quarters_id')) {
            $query->where('quarters_id', $request->input('quarters_id'));
        }

        // Get the filtered results
        $events = $query->get();

        // Retrieve regions list and quarters list
        $regions = Region::all();
        $quarters = Quarter::all();

        return view('admin.Event.indexAdmin', compact(['events', 'regions', 'quarters']))->with('i');
    }

    public function index()
    {
        $events = Event::all();
        return view('admin.Event.index',compact('events'))->with('i');
    }
    public function create()
    {
        $quarters = Quarter::all();
        $regions = Region::all();
        return view('admin.Event.create',compact(['quarters','regions']));
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
            'regions_id' => 'required|array',  // `regions_id` massivini qabul qilish
            'regions_id.*' => 'exists:regions,id',  // Har bir element `regions` jadvalidagi idga mos kelishi kerak
            'foreignNum' => 'required|integer',
            'localNum' => 'required|integer',
            'result' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        // Event yaratish
        $event = Event::create([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'basis' => $validatedData['basis'],
            'organizer' => $validatedData['organizer'],
            'goal' => $validatedData['goal'],
            'date' => $validatedData['date'],
            'foreignNum' => $validatedData['foreignNum'],
            'localNum' => $validatedData['localNum'],
            'result' => $validatedData['result'],
            'quarters_id' => $validatedData['quarters_id'],
        ]);

        // Yaratilgan Eventni `regions` bilan bog'lash
        $event->regions()->sync($validatedData['regions_id']);

        return redirect()->route('event.index')->with('success', 'Event created successfully!');
    }

    public function edit(string $id)
    {
        $quarters = Quarter::all();
        $regions = Region::all();
        $events = Event::findOrFail($id);
        return view('admin.Event.edit',compact(['quarters','events','regions']));
    }
    public function update(Request $request, $id)
    {
        // Validatsiya: `regions_id` massivini qabul qilish va har bir element `regions` jadvalidagi idga mos kelishini tekshirish
        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'basis' => 'required|string',
            'organizer' => 'required|string',
            'goal' => 'required|string',
            'date' => 'required|date',
            'regions_id' => 'required|array',  // `regions_id` massivini qabul qilish
            'regions_id.*' => 'exists:regions,id',  // Har bir element `regions` jadvalidagi idga mos kelishi kerak
            'foreignNum' => 'required|integer',
            'localNum' => 'required|integer',
            'result' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);
    
        // Eventni topish
        $event = Event::findOrFail($id);
    
        // Yaratilgan Eventni yangilash
        $event->update([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'basis' => $validatedData['basis'],
            'organizer' => $validatedData['organizer'],
            'goal' => $validatedData['goal'],
            'date' => $validatedData['date'],
            'foreignNum' => $validatedData['foreignNum'],
            'localNum' => $validatedData['localNum'],
            'result' => $validatedData['result'],
            'quarters_id' => $validatedData['quarters_id'],
        ]);
    
        // Yangi `regions_id` qiymatlarini `sync` yordamida yangilash
        $event->regions()->sync($validatedData['regions_id']);
    
        // Muvaffaqiyatli xabar bilan qaytish
        return redirect()->route('event.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(string $id)
    {
        $events = Event::findOrFail($id);
        $events->delete();
        return redirect()->route('event.index')->with('success', 'Event deleted successfully.');
    }
}
