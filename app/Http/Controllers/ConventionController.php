<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Quarter;
use App\Models\WhoGiven;
use App\Models\Convention;
use Illuminate\Http\Request;
use App\Models\ConventionType;

class ConventionController extends Controller
{
    public function indexAdmin(Request $request)
    {
        $query = Convention::query();

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
        $conventions = $query->get();

        // Retrieve regions list and quarters list
        $regions = Region::all();
        $quarters = Quarter::all();

        return view('admin.Convention.indexAdmin', compact(['conventions', 'regions', 'quarters']))->with('i');
    }

    public function index()
    {
        $conventions = Convention::all();
        return view('admin.Convention.index',compact('conventions'))->with('i');
    }
    public function create()
    {
        $quarters = Quarter::all();
        $whogivens = WhoGiven::all();
        $regions = Region::all();
        $conventionstypes = ConventionType::all();
        return view('admin.Convention.create',compact(['quarters','whogivens','conventionstypes','regions']));
    }
    public function store(Request $request)
    {
        // Validatsiya: Formada keltirilgan ma'lumotlarni tekshirish
        $validatedData = $request->validate([
            'name' => 'required|string',
            'who_given_id' => 'required|exists:who_givens,id',
            'type_id' => 'required|exists:publish_types,id',
            'organizer' => 'required|string',
            'date' => 'required|date',
            'regions_id' => 'required|array',  // `regions_id` massivini qabul qilish
            'regions_id.*' => 'exists:regions,id',  // Har bir element `regions` jadvalidagi idga mos kelishi kerak
            'employees_count' => 'required|integer',
            'list' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);
    
        // Convention yaratish
        $convention = Convention::create([
            'name' => $validatedData['name'],
            'who_given_id' => $validatedData['who_given_id'],
            'type_id' => $validatedData['type_id'],
            'organizer' => $validatedData['organizer'],
            'date' => $validatedData['date'],
            'employees_count' => $validatedData['employees_count'],
            'list' => $validatedData['list'],
            'quarters_id' => $validatedData['quarters_id'],
        ]);
    
        // Yaratilgan Conventionni `regions` bilan bog'lash
        $convention->regions()->sync($validatedData['regions_id']);
    
        // Muvaffaqiyatli xabar bilan qaytish
        return redirect()->route('conventions.index')->with('success', 'Convention created successfully!');
    }

    public function edit(string $id)
    {
        $quarters = Quarter::all();
        $whogivens = WhoGiven::all();
        // $item = ConventionType::findOrFail($id);
        $regions = Region::all();
        $publishTypes = ConventionType::all();
        $conventions = Convention::findOrFail($id);
        // var_dump($item->name);
        return view('admin.Convention.edit',compact(['quarters','whogivens','publishTypes','conventions','regions']));
    }
    public function update(Request $request, $id)
    {
        // Validatsiya: `regions_id` massivini qabul qilish va har bir element `regions` jadvalidagi idga mos kelishini tekshirish
        $validatedData = $request->validate([
            'name' => 'required|string',
            'who_given_id' => 'required|exists:who_givens,id',
            'type_id' => 'required|exists:publish_types,id',
            'organizer' => 'required|string',
            'date' => 'required|date',
            'regions_id' => 'required|array',  // `regions_id` massivini qabul qilish
            'regions_id.*' => 'exists:regions,id',  // Har bir element `regions` jadvalidagi idga mos kelishi kerak
            'employees_count' => 'required|integer',
            'list' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        // Conventionni topish
        $convention = Convention::findOrFail($id);

        // Conventionni yangilash
        $convention->update([
            'name' => $validatedData['name'],
            'who_given_id' => $validatedData['who_given_id'],
            'type_id' => $validatedData['type_id'],
            'organizer' => $validatedData['organizer'],
            'date' => $validatedData['date'],
            'employees_count' => $validatedData['employees_count'],
            'list' => $validatedData['list'],
            'quarters_id' => $validatedData['quarters_id'],
        ]);

        // Yangi `regions_id` qiymatlarini `sync` yordamida yangilash
        $convention->regions()->sync($validatedData['regions_id']);

        // Muvaffaqiyatli xabar bilan qaytish
        return redirect()->route('conventions.index')->with('success', 'Convention updated successfully!');
    }

    public function destroy(string $id)
    {
        $conventions = Convention::findOrFail($id);
        $conventions->delete();
        return redirect()->route('conventions.index')->with('success', 'Convention deleted successfully.');
    }
}
