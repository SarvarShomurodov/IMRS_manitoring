<?php

namespace App\Http\Controllers;

use App\Models\Quarter;
use App\Models\WhoGiven;
use App\Models\Convention;
use App\Models\ConventionType;
use Illuminate\Http\Request;

class ConventionController extends Controller
{
    public function index()
    {
        $conventions = Convention::all();
        return view('admin.Convention.index',compact('conventions'));
    }
    public function create()
    {
        $quarters = Quarter::all();
        $whogivens = WhoGiven::all();
        $conventionstypes = ConventionType::all();
        return view('admin.Convention.create',compact(['quarters','whogivens','conventionstypes']));
    }
}
