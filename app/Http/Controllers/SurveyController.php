<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Survey;
use App\Models\Quarter;
use App\Models\WhoGiven;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function indexAdmin(Request $request)
    {
        $query = Survey::query();

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
        $survays = $query->get();

        // Retrieve regions list and quarters list
        $regions = Region::all();
        $quarters = Quarter::all();

        return view('admin.Survay.indexAdmin', compact(['survays', 'regions', 'quarters']))->with('i');
    }

    public function index()
    {
        $survays = Survey::all();
        return view('admin.Survay.index',compact('survays'))->with('i');
    }
    public function create()
    {
        $quarters = Quarter::all();
        $whogivens = WhoGiven::all();
        $regions = Region::all();
        return view('admin.Survay.create',compact(['quarters','whogivens','regions']));
    }
    public function store(Request $request)
    {
        // Validatsiya: Formadagi barcha ma'lumotlarni tekshirish
        $validatedData = $request->validate([
            'name' => 'required|string',
            'who_given_id' => 'required|exists:who_givens,id',
            'assDate' => 'required|date',
            'assNumber' => 'required|integer',
            'whoSend' => 'required|string',
            'letterDate' => 'required|date',
            'letterNumber' => 'required|integer',
            'direction' => 'required|string',
            'regions_id' => 'required|array',  // `regions_id` massivini qabul qilish
            'regions_id.*' => 'exists:regions,id',  // Har bir element `regions` jadvalidagi idga mos kelishi kerak
            'shortResult' => 'nullable|string',
            'readyArticle' => 'nullable|string',
            'telegram' => 'nullable|string',
            'pressRelis' => 'nullable|string',
            'infografik' => 'nullable|string',
            'interyu' => 'nullable|string',
            'taqdimot' => 'nullable|string',
            'listPerson' => 'nullable|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        // Survey yaratish
        $survey = Survey::create([
            'name' => $validatedData['name'],
            'who_given_id' => $validatedData['who_given_id'],
            'assDate' => $validatedData['assDate'],
            'assNumber' => $validatedData['assNumber'],
            'whoSend' => $validatedData['whoSend'],
            'letterDate' => $validatedData['letterDate'],
            'letterNumber' => $validatedData['letterNumber'],
            'direction' => $validatedData['direction'],
            'shortResult' => $validatedData['shortResult'],
            'readyArticle' => $validatedData['readyArticle'],
            'telegram' => $validatedData['telegram'],
            'pressRelis' => $validatedData['pressRelis'],
            'infografik' => $validatedData['infografik'],
            'interyu' => $validatedData['interyu'],
            'taqdimot' => $validatedData['taqdimot'],
            'listPerson' => $validatedData['listPerson'],
            'quarters_id' => $validatedData['quarters_id'],
        ]);

        // Yaratilgan Surveyni `regions` bilan bog'lash
        $survey->regions()->sync($validatedData['regions_id']);

        // Muvaffaqiyatli xabar bilan qaytish
        return redirect()->route('survay.index')->with('success', 'Survey created successfully!');
    }

    public function edit(string $id)
    {
        $quarters = Quarter::all();
        $whogivens = WhoGiven::all();
        $regions = Region::all();
        $survays = Survey::findOrFail($id);
        return view('admin.Survay.edit',compact(['quarters','whogivens','regions','survays']));
    }
    public function update(Request $request, $id)
    {
        // Validatsiya: Formadagi barcha ma'lumotlarni tekshirish
        $validatedData = $request->validate([
            'name' => 'required|string',
            'who_given_id' => 'required|exists:who_givens,id',
            'assDate' => 'required|date',
            'assNumber' => 'required|integer',
            'whoSend' => 'required|string',
            'letterDate' => 'required|date',
            'letterNumber' => 'required|integer',
            'direction' => 'required|string',
            'regions_id' => 'required|array',  // `regions_id` massivini qabul qilish
            'regions_id.*' => 'exists:regions,id',  // Har bir element `regions` jadvalidagi idga mos kelishi kerak
            'shortResult' => 'nullable|string',
            'readyArticle' => 'nullable|string',
            'telegram' => 'nullable|string',
            'pressRelis' => 'nullable|string',
            'infografik' => 'nullable|string',
            'interyu' => 'nullable|string',
            'taqdimot' => 'nullable|string',
            'listPerson' => 'nullable|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);
    
        // `Survey`ni topish
        $survey = Survey::findOrFail($id);
    
        // Ma'lumotlarni yangilash
        $survey->update([
            'name' => $validatedData['name'],
            'who_given_id' => $validatedData['who_given_id'],
            'assDate' => $validatedData['assDate'],
            'assNumber' => $validatedData['assNumber'],
            'whoSend' => $validatedData['whoSend'],
            'letterDate' => $validatedData['letterDate'],
            'letterNumber' => $validatedData['letterNumber'],
            'direction' => $validatedData['direction'],
            'shortResult' => $validatedData['shortResult'],
            'readyArticle' => $validatedData['readyArticle'],
            'telegram' => $validatedData['telegram'],
            'pressRelis' => $validatedData['pressRelis'],
            'infografik' => $validatedData['infografik'],
            'interyu' => $validatedData['interyu'],
            'taqdimot' => $validatedData['taqdimot'],
            'listPerson' => $validatedData['listPerson'],
            'quarters_id' => $validatedData['quarters_id'],
        ]);
    
        // Yaratilgan Surveyni `regions` bilan bog'lash (agar kerak bo'lsa)
        $survey->regions()->sync($validatedData['regions_id']);
    
        // Muvaffaqiyatli xabar bilan qaytish
        return redirect()->route('survay.index')->with('success', 'Survey updated successfully!');
    }

    public function destroy(string $id)
    {
        $survays = Survey::findOrFail($id);
        $survays->delete();
        return redirect()->route('survay.index')->with('success', 'Survay deleted successfully.');
    }
}
