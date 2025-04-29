<?php

namespace App\Http\Controllers;

use App\Models\Quarter;
use App\Models\Doktarant;
use App\Models\Doktarantid;
use Illuminate\Http\Request;

class DoktarantController extends Controller
{
    public function index(Request $request)
    {
        // $students = Doktarant::all();
        // return view('admin.Doktarant.index',compact('students'))->with('i');
        // $oavpublishes = Opublish::all();
        // Get the 'who_given_id' parameter from the URL
        $doktId = $request->query('dokt_id');
        // Apply the filter only if 'who_given_id' is 6 or 8; otherwise, retrieve all records
        $students = Doktarant::when(in_array($doktId, [1,2,3,4,5]), function ($query) use ($doktId) {
            return $query->where('dokt_id', $doktId);
        })->get();
        return view('admin.Doktarant.index',compact('students'))->with('i');
    }
    public function create()
    {
        $quarters = Quarter::all();
        $studentsid = Doktarantid::all();
        return view('admin.Doktarant.create',compact(['quarters','studentsid']));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dokt_id' => 'required|exists:doktarantids,id',
            'soni' => 'required|integer',
            'makro' => 'nullable|integer',
            'minta' => 'nullable|integer',
            // 'ixtisosligi' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);

        Doktarant::create($validatedData);

        return redirect()->route('doctorate.index')->with('success', 'Doktarant created successfully!');
    }
    public function edit(string $id)
    {
        $quarters = Quarter::all();
        $studentsid = Doktarantid::all();
        $students = Doktarant::findOrFail($id);
        return view('admin.Doktarant.edit',compact(['quarters','studentsid','students']));
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'dokt_id' => 'required|exists:doktarantids,id',
            'soni' => 'required|integer',
            'makro' => 'nullable|integer',
            'minta' => 'nullable|integer',
            // 'ixtisosligi' => 'required|string',
            'quarters_id' => 'required|exists:quarters,id',
        ]);
        $students = Doktarant::findOrFail($id);

        $students->update($validatedData);

        return redirect()->route('doctorate.index')->with('success', 'Doktarant Update successfully!');
    }
    public function destroy(string $id)
    {
        $students = Doktarant::findOrFail($id);
        $students->delete();
        return redirect()->route('doctorate.index')->with('success', 'Doktarant deleted successfully.');
    }
}
