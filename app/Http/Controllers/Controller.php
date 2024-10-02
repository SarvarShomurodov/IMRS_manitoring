<?php

namespace App\Http\Controllers;

use App\Models\BusinessTrip;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index_home(){
        $trips = BusinessTrip::count();
        return view('client.index',compact('trips'));
    }
}
