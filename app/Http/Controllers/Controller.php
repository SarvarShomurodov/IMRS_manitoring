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
                wg.id IN (1, 2, 3, 4, 5);
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
        // dd($higherOrganIdCounts);
        return view('client.index',compact(['businessTripCounts','youngEconomistCounts','trainingCourseCounts','higherOrgans','higherOrganCounts','publish','publishCounts','opublishes','opublishCounts','conventions','scientifics','seminars','methods','nullScientifics','nullScientificCounts','events','meetings']));
    }
    public function getRegionsCounts()
    {
        $higherOrganCounts = DB::select("
            SELECT 
                r.id AS regions_id, 
                r.name, 
                COALESCE(higher_organs_table.occurrences, 0) AS higher_organs_count,
                COALESCE(another_table_table.occurrences, 0) AS another_table_count,
                COALESCE(another_table_sorov_table.occurrences, 0) AS another_table_sorov_count,
                COALESCE(third_table_table.occurrences, 0) AS third_table_count,
                COALESCE(conventions_table.occurrences, 0) AS conventions_count
            FROM regions AS r
            LEFT JOIN (
                SELECT regions_id, COUNT(*) AS occurrences 
                FROM higher_organs 
                GROUP BY regions_id
            ) AS higher_organs_table ON r.id = higher_organs_table.regions_id
            LEFT JOIN (
                SELECT regions_id, COUNT(*) AS occurrences 
                FROM busines_trips 
                GROUP BY regions_id
            ) AS another_table_table ON r.id = another_table_table.regions_id
            LEFT JOIN (
                SELECT regions_id, COUNT(*) AS occurrences 
                FROM busines_trips 
                WHERE invite_count IS NOT NULL AND invite_count <> ''
                GROUP BY regions_id
            ) AS another_table_sorov_table ON r.id = another_table_sorov_table.regions_id
            LEFT JOIN (
                SELECT regions_id, COUNT(*) AS occurrences 
                FROM events 
                GROUP BY regions_id
            ) AS third_table_table ON r.id = third_table_table.regions_id
            LEFT JOIN (
                SELECT regions_id, COUNT(*) AS occurrences 
                FROM conventions 
                GROUP BY regions_id
            ) AS conventions_table ON r.id = conventions_table.regions_id;
        ");
        return view('client.region',compact('higherOrganCounts'));
    }
}
