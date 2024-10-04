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
        $businessTripCounts = DB::select("
            select
                sum(s.first_quater) as first_quater,
                sum(s.second_quater) as second_quater,
                sum(s.third_quater) as third_quater,
                sum(s.fourth_quater) as fourth_quater
            from (select count(q.id) first_quater, 0 second_quater, 0 third_quater, 0 fourth_quater
               from busines_trips bt
                        inner join quarters q on bt.quarters_id = q.id
               where q.id = 1
               group by bt.name
               union all
               select 0 first_quater, count(q.id) second_quater, 0 third_quater, 0 fourth_quater
               from busines_trips bt
                        inner join quarters q on bt.quarters_id = q.id
               where q.id = 2
               group by bt.name
               union all
               select  0 first_quater, 0 second_quater, count(q.id) third_quater, 0 fourth_quater
               from busines_trips bt
                        inner join quarters q on bt.quarters_id = q.id
               where q.id = 3
               group by bt.name
               union all
               select  0 first_quater, 0 second_quater, 0 third_quater, count(q.id) fourth_quater
               from busines_trips bt
                        inner join quarters q on bt.quarters_id = q.id
               where q.id = 4
               group by bt.name
            ) s;
        ");
        $youngEconomistCounts = DB::select("
            select
                sum(s.first_quater) as first_quater,
                sum(s.second_quater) as second_quater,
                sum(s.third_quater) as third_quater,
                sum(s.fourth_quater) as fourth_quater
            from (
                select count(q.id) first_quater, 0 second_quater, 0 third_quater, 0 fourth_quater
                from young_economists ye
                inner join quarters q on ye.quarters_id = q.id
                where q.id = 1
                group by ye.name
                union all
                select 0 first_quater, count(q.id) second_quater, 0 third_quater, 0 fourth_quater
                from young_economists ye
                inner join quarters q on ye.quarters_id = q.id
                where q.id = 2
                group by ye.name
                union all
                select 0 first_quater, 0 second_quater, count(q.id) third_quater, 0 fourth_quater
                from young_economists ye
                inner join quarters q on ye.quarters_id = q.id
                where q.id = 3
                group by ye.name
                union all
                select 0 first_quater, 0 second_quater, 0 third_quater, count(q.id) fourth_quater
                from young_economists ye
                inner join quarters q on ye.quarters_id = q.id
                where q.id = 4
                group by ye.name
            ) s;
        ");
        $trainingCourseCounts  = DB::select("
            select
                sum(s.first_quater) as first_quater,
                sum(s.second_quater) as second_quater,
                sum(s.third_quater) as third_quater,
                sum(s.fourth_quater) as fourth_quater
            from (
                select count(q.id) first_quater, 0 second_quater, 0 third_quater, 0 fourth_quater
                from training_courses tc
                inner join quarters q on tc.quarters_id = q.id
                where q.id = 1
                group by tc.name
                union all
                select 0 first_quater, count(q.id) second_quater, 0 third_quater, 0 fourth_quater
                from training_courses tc
                inner join quarters q on tc.quarters_id = q.id
                where q.id = 2
                group by tc.name
                union all
                select 0 first_quater, 0 second_quater, count(q.id) third_quater, 0 fourth_quater
                from training_courses tc
                inner join quarters q on tc.quarters_id = q.id
                where q.id = 3
                group by tc.name
                union all
                select 0 first_quater, 0 second_quater, 0 third_quater, count(q.id) fourth_quater
                from training_courses tc
                inner join quarters q on tc.quarters_id = q.id
                where q.id = 4
                group by tc.name
            ) s;
        ");

        return view('client.index',compact(['businessTripCounts','youngEconomistCounts','trainingCourseCounts']));
        // 
    }
}
