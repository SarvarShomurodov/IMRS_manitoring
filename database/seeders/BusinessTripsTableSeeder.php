<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\BusinesTrip;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BusinessTripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('busines_trips')->insert([
            [
                'name' => 'Trip to Region A',
                'type' => 'Domestic',
                'goal' => 'Training',
                'start_date' => Carbon::parse('2024-11-10'),
                'end_date' => Carbon::parse('2024-11-12'),
                'list_person' => 'John Doe, Jane Smith',
                'data_name' => 'Dataset 1',
                'invite_count' => 12,
                // 'ball' => 55,
                'quarters_id' => 1,
            ],
            [
                'name' => 'Trip to Region B',
                'type' => 'International',
                'goal' => 'Conference',
                'start_date' => Carbon::parse('2024-12-01'),
                'end_date' => Carbon::parse('2024-12-05'),
                'list_person' => 'Alice Johnson, Bob Brown',
                'data_name' => 'Dataset 2',
                'invite_count' => 20,
                // 'ball' => 60,
                'quarters_id' => 2,
            ],
            [
                'name' => 'Visit to Region C',
                'type' => 'Domestic',
                'goal' => 'Site Inspection',
                'start_date' => Carbon::parse('2025-01-15'),
                'end_date' => Carbon::parse('2025-01-18'),
                'list_person' => 'Eve Thompson, Sam Lee',
                'data_name' => 'Dataset 3',
                'invite_count' => 8,
                // 'ball' => 45,
                'quarters_id' => 1,
            ],
            [
                'name' => 'Business Meeting in Region D',
                'type' => 'International',
                'goal' => 'Partner Meeting',
                'start_date' => Carbon::parse('2025-02-05'),
                'end_date' => Carbon::parse('2025-02-07'),
                'list_person' => 'Chris Walker, Tina Fey',
                'data_name' => 'Dataset 4',
                'invite_count' => 15,
                // 'ball' => 70,
                'quarters_id' => 3,
            ],
            [
                'name' => 'Summit in Region E',
                'type' => 'Domestic',
                'goal' => 'Summit Participation',
                'start_date' => Carbon::parse('2025-03-01'),
                'end_date' => Carbon::parse('2025-03-04'),
                'list_person' => 'Paul Allen, Rebecca Black',
                'data_name' => 'Dataset 5',
                'invite_count' => 10,
                // 'ball' => 50,
                'quarters_id' => 2,
            ],
            [
                'name' => 'Conference in Region F',
                'type' => 'International',
                'goal' => 'Tech Conference',
                'start_date' => Carbon::parse('2025-04-10'),
                'end_date' => Carbon::parse('2025-04-15'),
                'list_person' => 'Mike Ross, Rachel Zane',
                'data_name' => 'Dataset 6',
                'invite_count' => 30,
                // 'ball' => 90,
                'quarters_id' => 4,
            ],
            [
                'name' => 'Workshop in Region G',
                'type' => 'Domestic',
                'goal' => 'Staff Workshop',
                'start_date' => Carbon::parse('2025-05-01'),
                'end_date' => Carbon::parse('2025-05-03'),
                'list_person' => 'Louis Litt, Donna Paulsen',
                'data_name' => 'Dataset 7',
                'invite_count' => 18,
                // 'ball' => 65,
                'quarters_id' => 1,
            ],
            [
                'name' => 'Training in Region H',
                'type' => 'Domestic',
                'goal' => 'Skills Training',
                'start_date' => Carbon::parse('2025-06-12'),
                'end_date' => Carbon::parse('2025-06-14'),
                'list_person' => 'Harvey Specter, Jessica Pearson',
                'data_name' => 'Dataset 8',
                'invite_count' => 22,
                // 'ball' => 80,
                'quarters_id' => 3,
            ],
            [
                'name' => 'Site Visit in Region I',
                'type' => 'Domestic',
                'goal' => 'Project Evaluation',
                'start_date' => Carbon::parse('2025-07-01'),
                'end_date' => Carbon::parse('2025-07-05'),
                'list_person' => 'Peter Burke, Neal Caffrey',
                'data_name' => 'Dataset 9',
                'invite_count' => 5,
                // 'ball' => 40,
                'quarters_id' => 2,
            ],
            [
                'name' => 'Networking Event in Region J',
                'type' => 'International',
                'goal' => 'Business Networking',
                'start_date' => Carbon::parse('2025-08-20'),
                'end_date' => Carbon::parse('2025-08-25'),
                'list_person' => 'Mozzie, Elizabeth Burke',
                'data_name' => 'Dataset 10',
                'invite_count' => 25,
                // 'ball' => 85,
                'quarters_id' => 4,
            ],
            [
                'name' => 'Trip to Region A',
                'type' => 'Domestic',
                'goal' => 'Training',
                'start_date' => Carbon::parse('2024-11-10'),
                'end_date' => Carbon::parse('2024-11-12'),
                'list_person' => 'John Doe, Jane Smith',
                'data_name' => 'Dataset 1',
                'invite_count' => 12,
                // 'ball' => 55,
                'quarters_id' => 1,
            ],
            [
                'name' => 'Trip to Region B',
                'type' => 'International',
                'goal' => 'Conference',
                'start_date' => Carbon::parse('2024-12-01'),
                'end_date' => Carbon::parse('2024-12-05'),
                'list_person' => 'Alice Johnson, Bob Brown',
                'data_name' => 'Dataset 2',
                'invite_count' => 20,
                // 'ball' => 60,
                'quarters_id' => 2,
            ],
            [
                'name' => 'Visit to Region C',
                'type' => 'Domestic',
                'goal' => 'Site Inspection',
                'start_date' => Carbon::parse('2025-01-15'),
                'end_date' => Carbon::parse('2025-01-18'),
                'list_person' => 'Eve Thompson, Sam Lee',
                'data_name' => 'Dataset 3',
                'invite_count' => 8,
                // 'ball' => 45,
                'quarters_id' => 1,
            ],
            [
                'name' => 'Business Meeting in Region D',
                'type' => 'International',
                'goal' => 'Partner Meeting',
                'start_date' => Carbon::parse('2025-02-05'),
                'end_date' => Carbon::parse('2025-02-07'),
                'list_person' => 'Chris Walker, Tina Fey',
                'data_name' => 'Dataset 4',
                'invite_count' => 15,
                // 'ball' => 70,
                'quarters_id' => 3,
            ],
            [
                'name' => 'Summit in Region E',
                'type' => 'Domestic',
                'goal' => 'Summit Participation',
                'start_date' => Carbon::parse('2025-03-01'),
                'end_date' => Carbon::parse('2025-03-04'),
                'list_person' => 'Paul Allen, Rebecca Black',
                'data_name' => 'Dataset 5',
                'invite_count' => 10,
                // 'ball' => 50,
                'quarters_id' => 2,
            ],
        ]);
        $conventions = BusinesTrip::all();
        foreach ($conventions as $convention) {
            $regions = [1, 2, 5]; // Example of region IDs to associate with the convention
            $convention->regions()->sync($regions);
        }
    }
}
