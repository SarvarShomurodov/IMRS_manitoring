<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Quarter;
use App\Models\WhoGiven;
use App\Models\HigherOrgan;
use Illuminate\Http\Request;

class HigherOrganController extends Controller
{
    public function indexAdmin(Request $request)
    {
        $query = HigherOrgan::query();
    
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
        $higherOrgans = $query->get();
    
        // Retrieve regions list and quarters list
        $regions = Region::all();
        $quarters = Quarter::all();
    
        return view('admin.HigherOrgan.indexAdmin', compact(['higherOrgans', 'regions', 'quarters']))->with('i');
    }

     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       // Get the 'who_given_id' parameter from the URL
        $whoGivenId = $request->query('who_given_id');
        // Apply the filter only if 'who_given_id' is 6 or 8; otherwise, retrieve all records
        $higherOrgans = HigherOrgan::when(in_array($whoGivenId, [1,2,3,4,5,6,7,8,9,10,11,12,13,14]), function ($query) use ($whoGivenId) {
            return $query->where('who_given_id', $whoGivenId);
        })->get();

        return view('admin.HigherOrgan.index', compact('higherOrgans'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quarters = Quarter::all();
        $whogivens = WhoGiven::all();
        $regions = Region::all();
        return view('admin.HigherOrgan.create',compact(['quarters','whogivens','regions']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validatsiya: 'regions_id' massivi bo'lib, har bir element `regions` jadvalidagi idga mos kelishi kerak
        $validatedData = $request->validate([
            'name' => 'required|string',
            'who_given_id' => 'required|exists:who_givens,id',
            'date' => 'required|date',
            'ass_number' => 'required|integer',
            'who_send' => 'required|string',
            'letter_date' => 'required|date',
            'letter_number' => 'required|integer',
            'direction' => 'required|string',
            'sorov' => 'required|string',
            'regions_id' => 'required|array',  // `regions_id` massivini qabul qilish
            'regions_id.*' => 'exists:regions,id',  // Har bir element `regions` jadvalidagi idga mos kelishi kerak
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        // Higher Organ yaratish
        $higherOrgan = HigherOrgan::create([
            'name' => $validatedData['name'],
            'who_given_id' => $validatedData['who_given_id'],
            'date' => $validatedData['date'],
            'ass_number' => $validatedData['ass_number'],
            'who_send' => $validatedData['who_send'],
            'letter_date' => $validatedData['letter_date'],
            'letter_number' => $validatedData['letter_number'],
            'direction' => $validatedData['direction'],
            'sorov' => $validatedData['sorov'],
            'quarters_id' => $validatedData['quarters_id'],
        ]);

        // Yaratilgan Higher Organni `regions` bilan bog'lash
        $higherOrgan->regions()->sync($validatedData['regions_id']);

        // Muvaffaqiyatli xabar bilan qaytish
        return redirect()->route('higher_organs.index')->with('success', 'Higher Organ created successfully!');
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
        $whogivens = WhoGiven::all();
        $regions = Region::all();
        $higherOrgans = HigherOrgan::findOrFail($id);
        return view('admin.HigherOrgan.edit',compact(['quarters','whogivens','higherOrgans','regions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validatsiya: `regions_id` massivi va uning har bir elementi `regions` jadvalidagi idga mos kelishi kerak
        $validatedData = $request->validate([
            'name' => 'required|string',
            'who_given_id' => 'required|exists:who_givens,id',
            'date' => 'required|date',
            'ass_number' => 'required|integer',
            'who_send' => 'required|string',
            'letter_date' => 'required|date',
            'letter_number' => 'required|integer',
            'direction' => 'required|string',
            'sorov' => 'required|string',
            'regions_id' => 'required|array',  // `regions_id` massivi
            'regions_id.*' => 'exists:regions,id',  // Har bir element `regions` jadvalidagi idga mos kelishi kerak
            'quarters_id' => 'required|exists:quarters,id',
        ]);
    
        // Higher Organni topish
        $higherOrgan = HigherOrgan::findOrFail($id);
    
        // Yangi malumotlarni yangilash
        $higherOrgan->update($validatedData);
    
        // `regions_id` larni yangilash, eski bog'lanishni yangilash
        $higherOrgan->regions()->sync($request->regions_id);
    
        // Muvaffaqiyatli xabar bilan qaytish
        return redirect()->route('higher_organs.index')->with('success', 'Higher Organ updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $higherOrgans = HigherOrgan::findOrFail($id);
        $higherOrgans->delete();
        return redirect()->route('higher_organs.index')->with('success', 'Higher Organ deleted successfully.');
    }
}
