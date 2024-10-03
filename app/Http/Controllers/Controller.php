<?php

namespace App\Http\Controllers;

use App\Models\BusinessTrip;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function getBusinessTripCounts()
    {
        $businessTripCounts = DB::table('quarters as q')
        ->select('q.name', 
            DB::raw('COUNT(bt.id) as number_of_business_trips'), 
            DB::raw('(SELECT COUNT(*) FROM busines_trips WHERE quarters_id = q.id) AS total_business_trips'))
            ->leftJoin('busines_trips as bt', 'q.id', '=', 'bt.quarters_id')
            ->groupBy('q.id')
            ->orderBy('number_of_business_trips', 'desc')
            ->get();
        return view('client.index',compact('businessTripCounts'));
    }
}
