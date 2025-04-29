<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            SELECT 
                SUM(CASE WHEN q.id = 1 THEN 1 ELSE 0 END) AS first_quater,
                SUM(CASE WHEN q.id = 2 THEN 1 ELSE 0 END) AS second_quater,
                SUM(CASE WHEN q.id = 3 THEN 1 ELSE 0 END) AS third_quater,
                SUM(CASE WHEN q.id = 4 THEN 1 ELSE 0 END) AS fourth_quater
            FROM 
                busines_trips bt
            INNER JOIN 
                quarters q ON bt.quarters_id = q.id;

        ");
        $youngEconomistCounts = DB::select("
            SELECT 
                SUM(CASE WHEN q.id = 1 THEN 1 ELSE 0 END) AS first_quater,
                SUM(CASE WHEN q.id = 2 THEN 1 ELSE 0 END) AS second_quater,
                SUM(CASE WHEN q.id = 3 THEN 1 ELSE 0 END) AS third_quater,
                SUM(CASE WHEN q.id = 4 THEN 1 ELSE 0 END) AS fourth_quater
            FROM 
                young_economists ye
            INNER JOIN 
                quarters q ON ye.quarters_id = q.id;

        ");
        $trainingCourseCounts = DB::select("
            SELECT 
                SUM(CASE WHEN q.id = 1 THEN 1 ELSE 0 END) AS first_quater,
                SUM(CASE WHEN q.id = 2 THEN 1 ELSE 0 END) AS second_quater,
                SUM(CASE WHEN q.id = 3 THEN 1 ELSE 0 END) AS third_quater,
                SUM(CASE WHEN q.id = 4 THEN 1 ELSE 0 END) AS fourth_quater
            FROM 
                training_courses tc
            INNER JOIN 
                quarters q ON tc.quarters_id = q.id;
        ");
        $higherOrgans = DB::select("
            SELECT 
                SUM(CASE WHEN q.id = 1 THEN 1 ELSE 0 END) AS first_quater,
                SUM(CASE WHEN q.id = 2 THEN 1 ELSE 0 END) AS second_quater,
                SUM(CASE WHEN q.id = 3 THEN 1 ELSE 0 END) AS third_quater,
                SUM(CASE WHEN q.id = 4 THEN 1 ELSE 0 END) AS fourth_quater
            FROM 
                higher_organs ho
            INNER JOIN 
                quarters q ON ho.quarters_id = q.id 
            INNER JOIN 
                who_givens wg ON ho.who_given_id = wg.id 
            WHERE 
                wg.id IN (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11);
        ");
        $higherOrganCounts = DB::select("
            SELECT 
                wg.name AS issuer_name,
                wg.id as id,
                wg.year_num as year_number,
                SUM(CASE WHEN q.id = 1 THEN 1 ELSE 0 END) AS first_quarter,
                SUM(CASE WHEN q.id = 2 THEN 1 ELSE 0 END) AS second_quarter,
                SUM(CASE WHEN q.id = 3 THEN 1 ELSE 0 END) AS third_quarter,
                SUM(CASE WHEN q.id = 4 THEN 1 ELSE 0 END) AS fourth_quarter
            FROM 
                higher_organs ho 
            INNER JOIN 
                who_givens wg ON ho.who_given_id = wg.id 
            INNER JOIN 
                quarters q ON ho.quarters_id = q.id 
            GROUP BY 
                wg.name,wg.id,wg.year_num 
            ORDER BY 
                wg.id;
        ");
        $publish = DB::select("
            SELECT 
                SUM(CASE WHEN q.id = 1 THEN 1 ELSE 0 END) AS first_quater,
                SUM(CASE WHEN q.id = 2 THEN 1 ELSE 0 END) AS second_quater,
                SUM(CASE WHEN q.id = 3 THEN 1 ELSE 0 END) AS third_quater,
                SUM(CASE WHEN q.id = 4 THEN 1 ELSE 0 END) AS fourth_quater
            FROM 
                publishes bt
            INNER JOIN 
                quarters q ON bt.quarters_id = q.id;

        ");
        $publishCounts = DB::select("
         SELECT 
                pt.name AS issuer_name,
                pt.id as id,
                pt.year_num as year_number,
                SUM(CASE WHEN q.id = 1 THEN 1 ELSE 0 END) AS first_quarter,
                SUM(CASE WHEN q.id = 2 THEN 1 ELSE 0 END) AS second_quarter,
                SUM(CASE WHEN q.id = 3 THEN 1 ELSE 0 END) AS third_quarter,
                SUM(CASE WHEN q.id = 4 THEN 1 ELSE 0 END) AS fourth_quarter
            FROM 
                publishes ho 
            INNER JOIN 
                publish_types pt ON ho.type_id = pt.id 
            INNER JOIN 
                quarters q ON ho.quarters_id = q.id 
            GROUP BY 
                pt.name,pt.id,year_number
            ORDER BY 
                pt.id;
        ");
        $opublishes = DB::select("
            SELECT 
                SUM(CASE WHEN q.id = 1 THEN 1 ELSE 0 END) AS first_quarter,
                SUM(CASE WHEN q.id = 2 THEN 1 ELSE 0 END) AS second_quarter,
                SUM(CASE WHEN q.id = 3 THEN 1 ELSE 0 END) AS third_quarter,
                SUM(CASE WHEN q.id = 4 THEN 1 ELSE 0 END) AS fourth_quarter
            FROM 
                opublishes AS o
            INNER JOIN 
                quarters AS q ON o.quarters_id = q.id
        ");
        $opublishCounts = DB::select("
            SELECT 
                wp.name AS issuer_name,
                wp.id AS id,
                wp.year_num AS year_number,
                SUM(CASE WHEN q.id = 1 THEN 1 ELSE 0 END) AS first_quarter,
                SUM(CASE WHEN q.id = 2 THEN 1 ELSE 0 END) AS second_quarter,
                SUM(CASE WHEN q.id = 3 THEN 1 ELSE 0 END) AS third_quarter,
                SUM(CASE WHEN q.id = 4 THEN 1 ELSE 0 END) AS fourth_quarter
            FROM 
                opublishes AS ho
            INNER JOIN 
                who_publishes AS wp ON ho.oav_id = wp.id
            INNER JOIN 
                quarters AS q ON ho.quarters_id = q.id
            GROUP BY 
                wp.name, wp.id, wp.year_num
            ORDER BY 
                wp.id;
        ");
        $conventions = DB::select("
            SELECT 
                SUM(CASE WHEN q.id = 1 THEN 1 ELSE 0 END) AS first_quarter,
                SUM(CASE WHEN q.id = 2 THEN 1 ELSE 0 END) AS second_quarter,
                SUM(CASE WHEN q.id = 3 THEN 1 ELSE 0 END) AS third_quarter,
                SUM(CASE WHEN q.id = 4 THEN 1 ELSE 0 END) AS fourth_quarter
            FROM 
                conventions AS o
            INNER JOIN 
                quarters AS q ON o.quarters_id = q.id
        ");
        $scientifics = DB::select("
            SELECT 
                SUM(CASE WHEN q.id = 1 AND o.date IS NOT NULL THEN 1 ELSE 0 END) AS first_quarter,
                SUM(CASE WHEN q.id = 2 AND o.date IS NOT NULL THEN 1 ELSE 0 END) AS second_quarter,
                SUM(CASE WHEN q.id = 3 AND o.date IS NOT NULL THEN 1 ELSE 0 END) AS third_quarter,
                SUM(CASE WHEN q.id = 4 AND o.date IS NOT NULL THEN 1 ELSE 0 END) AS fourth_quarter
            FROM 
                scientific_councils AS o
            INNER JOIN 
                quarters AS q ON o.quarters_id = q.id
        ");
        $seminars = DB::select("
            SELECT 
                SUM(CASE WHEN q.id = 1 THEN 1 ELSE 0 END) AS first_quarter,
                SUM(CASE WHEN q.id = 2 THEN 1 ELSE 0 END) AS second_quarter,
                SUM(CASE WHEN q.id = 3 THEN 1 ELSE 0 END) AS third_quarter,
                SUM(CASE WHEN q.id = 4 THEN 1 ELSE 0 END) AS fourth_quarter
            FROM 
                scientific_seminars AS o
            INNER JOIN 
                quarters AS q ON o.quarters_id = q.id
        ");
        $methods = DB::select("
            SELECT 
                SUM(CASE WHEN q.id = 1 THEN 1 ELSE 0 END) AS first_quarter,
                SUM(CASE WHEN q.id = 2 THEN 1 ELSE 0 END) AS second_quarter,
                SUM(CASE WHEN q.id = 3 THEN 1 ELSE 0 END) AS third_quarter,
                SUM(CASE WHEN q.id = 4 THEN 1 ELSE 0 END) AS fourth_quarter
            FROM 
                methods AS o
            INNER JOIN 
                quarters AS q ON o.quarters_id = q.id
        ");
        $nullScientifics = DB::select("
            SELECT 
                SUM(CASE WHEN q.id = 1 AND o.name IS NOT NULL AND o.name <> '' THEN 1 ELSE 0 END) AS first_quarter,
                SUM(CASE WHEN q.id = 2 AND o.name IS NOT NULL AND o.name <> '' THEN 1 ELSE 0 END) AS second_quarter,
                SUM(CASE WHEN q.id = 3 AND o.name IS NOT NULL AND o.name <> '' THEN 1 ELSE 0 END) AS third_quarter,
                SUM(CASE WHEN q.id = 4 AND o.name IS NOT NULL AND o.name <> '' THEN 1 ELSE 0 END) AS fourth_quarter
            FROM 
                scientific_councils AS o
            INNER JOIN 
                quarters AS q ON o.quarters_id = q.id
        ");
        $nullScientificCounts = DB::select("
            SELECT 
                sc.name AS issuer_name,
                sc.id AS id,
                sc.year_num AS year_number,
                SUM(CASE WHEN q.id = 1 AND ho.name IS NOT NULL AND ho.name <> '' THEN 1 ELSE 0 END) AS first_quarter,
                SUM(CASE WHEN q.id = 2 AND ho.name IS NOT NULL AND ho.name <> '' THEN 1 ELSE 0 END) AS second_quarter,
                SUM(CASE WHEN q.id = 3 AND ho.name IS NOT NULL AND ho.name <> '' THEN 1 ELSE 0 END) AS third_quarter,
                SUM(CASE WHEN q.id = 4 AND ho.name IS NOT NULL AND ho.name <> '' THEN 1 ELSE 0 END) AS fourth_quarter
            FROM 
                scientific_councils AS ho
            INNER JOIN 
                scientific_degrees AS sc ON ho.degree_id = sc.id
            INNER JOIN 
                quarters AS q ON ho.quarters_id = q.id
            GROUP BY 
                sc.name, sc.id, sc.year_num
            ORDER BY 
                sc.id;
        ");
        $events = DB::select("
            SELECT 
                SUM(CASE WHEN q.id = 1 THEN 1 ELSE 0 END) AS first_quarter,
                SUM(CASE WHEN q.id = 2 THEN 1 ELSE 0 END) AS second_quarter,
                SUM(CASE WHEN q.id = 3 THEN 1 ELSE 0 END) AS third_quarter,
                SUM(CASE WHEN q.id = 4 THEN 1 ELSE 0 END) AS fourth_quarter
            FROM 
                events AS o
            INNER JOIN 
                quarters AS q ON o.quarters_id = q.id
        ");
        $meetings = DB::select("
            SELECT 
                SUM(CASE WHEN q.id = 1 THEN 1 ELSE 0 END) AS first_quarter,
                SUM(CASE WHEN q.id = 2 THEN 1 ELSE 0 END) AS second_quarter,
                SUM(CASE WHEN q.id = 3 THEN 1 ELSE 0 END) AS third_quarter,
                SUM(CASE WHEN q.id = 4 THEN 1 ELSE 0 END) AS fourth_quarter
            FROM 
                meetings AS o
            INNER JOIN 
                quarters AS q ON o.quarters_id = q.id
        ");
        $students = DB::select("
            SELECT 
                d.dokt_id,
                dn.name AS dokt_name,
                SUM(CASE WHEN d.quarters_id = 1 THEN IFNULL(d.soni, 0) ELSE 0 END) AS quarter_1,
                SUM(CASE WHEN d.quarters_id = 2 THEN IFNULL(d.soni, 0) ELSE 0 END) AS quarter_2,
                SUM(CASE WHEN d.quarters_id = 3 THEN IFNULL(d.soni, 0) ELSE 0 END) AS quarter_3,
                SUM(CASE WHEN d.quarters_id = 4 THEN IFNULL(d.soni, 0) ELSE 0 END) AS quarter_4
            FROM doktarants d
            JOIN doktarantids dn ON d.dokt_id = dn.id
            GROUP BY d.dokt_id, dn.name

            UNION ALL

            SELECT 
                3 AS dokt_id, 
                'мустақил изланувчилар' AS dokt_name, 
                SUM(CASE WHEN d.quarters_id = 1 THEN IFNULL(d.soni, 0) ELSE 0 END) AS quarter_1,
                SUM(CASE WHEN d.quarters_id = 2 THEN IFNULL(d.soni, 0) ELSE 0 END) AS quarter_2,
                SUM(CASE WHEN d.quarters_id = 3 THEN IFNULL(d.soni, 0) ELSE 0 END) AS quarter_3,
                SUM(CASE WHEN d.quarters_id = 4 THEN IFNULL(d.soni, 0) ELSE 0 END) AS quarter_4
            FROM doktarants d
            WHERE d.dokt_id IN (4, 5)  -- IDlarni aniq tekshiring!

            ORDER BY dokt_id;
        ");
    
        $studentCounts = DB::select("
            SELECT 
                'Natija' AS dokt_name,
                SUM(CASE WHEN d.quarters_id = 1 THEN d.soni ELSE 0 END) AS quarter_1,
                SUM(CASE WHEN d.quarters_id = 2 THEN d.soni ELSE 0 END) AS quarter_2,
                SUM(CASE WHEN d.quarters_id = 3 THEN d.soni ELSE 0 END) AS quarter_3,
                SUM(CASE WHEN d.quarters_id = 4 THEN d.soni ELSE 0 END) AS quarter_4
            FROM doktarants d
        ");
        return view('client.index',compact(['businessTripCounts','youngEconomistCounts','trainingCourseCounts','higherOrgans','higherOrganCounts','publish','publishCounts','opublishes','opublishCounts','conventions','scientifics','seminars','methods','nullScientifics','nullScientificCounts','events','meetings','students','studentCounts']));
    }


    public function getRegionsCounts()
{
    $higherOrganCounts = DB::select("
        SELECT 
            r.id AS region_id, 
            r.name, 
            COALESCE(higher_organs_table.occurrences, 0) AS higher_organs_count,
            COALESCE(business_trips_table.occurrences, 0) AS business_trips_count,
            COALESCE(business_trips_sorov_table.occurrences, 0) AS business_trips_sorov_count,
            COALESCE(events_table.occurrences, 0) AS events_count,
            COALESCE(conventions_table.occurrences, 0) AS conventions_count,
            COALESCE(surveys_table.occurrences, 0) AS surveys_count
        FROM regions AS r
        LEFT JOIN (
            SELECT region_id, COUNT(*) AS occurrences 
            FROM region_higher_organ 
            GROUP BY region_id
        ) AS higher_organs_table ON r.id = higher_organs_table.region_id
        LEFT JOIN (
            SELECT region_id, COUNT(*) AS occurrences 
            FROM region_business_trip 
            GROUP BY region_id
        ) AS business_trips_table ON r.id = business_trips_table.region_id
        LEFT JOIN (
            SELECT region_id, COUNT(*) AS occurrences 
            FROM region_business_trip 
            JOIN busines_trips ON busines_trips.id = region_business_trip.business_trip_id
            WHERE busines_trips.invite_count IS NOT NULL AND busines_trips.invite_count <> ''
            GROUP BY region_id
        ) AS business_trips_sorov_table ON r.id = business_trips_sorov_table.region_id
        LEFT JOIN (
            SELECT region_id, COUNT(*) AS occurrences 
            FROM region_event 
            GROUP BY region_id
        ) AS events_table ON r.id = events_table.region_id
        LEFT JOIN (
            SELECT region_id, COUNT(*) AS occurrences 
            FROM region_convention 
            GROUP BY region_id
        ) AS conventions_table ON r.id = conventions_table.region_id
        LEFT JOIN (
            SELECT region_id, COUNT(*) AS occurrences 
            FROM region_survey 
            GROUP BY region_id
        ) AS surveys_table ON r.id = surveys_table.region_id;
    ");
    
    return view('client.region', compact('higherOrganCounts'));
}

    
    public function user(){
        $users = User::all(); // Fetch all users
        return view('client.users', compact('users')); // Pass users to the view
    }
}
