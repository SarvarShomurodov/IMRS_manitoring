<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'name' => 'International Conference on AI',
                'type' => 'Conference',
                'basis' => 'Research and Development',
                'organizer' => 'AI Research Institute',
                'goal' => 'To discuss advancements in Artificial Intelligence.',
                'date' => Carbon::parse('2024-11-15'),
                'regions_id' => 1,  // Assuming a valid region ID exists
                'foreignNum' => 50,
                'localNum' => 150,
                'result' => 'The event was successful with notable discussions on AI ethics.',
                'quarters_id' => 1,  // Assuming a valid quarter ID exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Global Environmental Summit',
                'type' => 'Summit',
                'basis' => 'Climate Change Awareness',
                'organizer' => 'World Environment Organization',
                'goal' => 'To raise awareness on climate change.',
                'date' => Carbon::parse('2024-12-01'),
                'regions_id' => 2,  // Assuming a valid region ID exists
                'foreignNum' => 100,
                'localNum' => 200,
                'result' => 'Several key initiatives were proposed for climate action.',
                'quarters_id' => 1,  // Assuming a valid quarter ID exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tech Innovators Expo',
                'type' => 'Expo',
                'basis' => 'Technological Innovation',
                'organizer' => 'Tech World Expo',
                'goal' => 'To showcase the latest technology innovations.',
                'date' => Carbon::parse('2024-11-20'),
                'regions_id' => 3,  // Assuming a valid region ID exists
                'foreignNum' => 80,
                'localNum' => 120,
                'result' => 'New startups presented groundbreaking innovations.',
                'quarters_id' => 2,  // Assuming a valid quarter ID exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Healthcare Professionals Summit',
                'type' => 'Summit',
                'basis' => 'Healthcare Improvement',
                'organizer' => 'Global Health Organization',
                'goal' => 'To discuss the future of healthcare systems.',
                'date' => Carbon::parse('2024-12-05'),
                'regions_id' => 4,  // Assuming a valid region ID exists
                'foreignNum' => 60,
                'localNum' => 140,
                'result' => 'Strategies for improving healthcare systems were discussed.',
                'quarters_id' => 3,  // Assuming a valid quarter ID exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Global Education Forum',
                'type' => 'Forum',
                'basis' => 'Educational Reform',
                'organizer' => 'United Nations Education Programme',
                'goal' => 'To address challenges in global education.',
                'date' => Carbon::parse('2024-11-25'),
                'regions_id' => 5,  // Assuming a valid region ID exists
                'foreignNum' => 70,
                'localNum' => 130,
                'result' => 'Educational policies for the next decade were outlined.',
                'quarters_id' => 2,  // Assuming a valid quarter ID exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Innovation in Business Conference',
                'type' => 'Conference',
                'basis' => 'Business Development',
                'organizer' => 'Business Leaders Organization',
                'goal' => 'To discuss innovative strategies for business growth.',
                'date' => Carbon::parse('2024-12-10'),
                'regions_id' => 1,  // Assuming a valid region ID exists
                'foreignNum' => 40,
                'localNum' => 160,
                'result' => 'Several new business strategies were discussed.',
                'quarters_id' => 1,  // Assuming a valid quarter ID exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Space Exploration Symposium',
                'type' => 'Symposium',
                'basis' => 'Space Science Research',
                'organizer' => 'National Space Agency',
                'goal' => 'To discuss the future of space exploration.',
                'date' => Carbon::parse('2024-11-30'),
                'regions_id' => 6,  // Assuming a valid region ID exists
                'foreignNum' => 90,
                'localNum' => 110,
                'result' => 'New space exploration missions were announced.',
                'quarters_id' => 4,  // Assuming a valid quarter ID exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Global Leadership Summit',
                'type' => 'Summit',
                'basis' => 'Leadership Development',
                'organizer' => 'Global Leadership Institute',
                'goal' => 'To discuss strategies for leadership development.',
                'date' => Carbon::parse('2024-12-15'),
                'regions_id' => 2,  // Assuming a valid region ID exists
                'foreignNum' => 120,
                'localNum' => 80,
                'result' => 'Leadership initiatives were presented.',
                'quarters_id' => 3,  // Assuming a valid quarter ID exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cultural Heritage Conference',
                'type' => 'Conference',
                'basis' => 'Cultural Preservation',
                'organizer' => 'UNESCO',
                'goal' => 'To discuss preserving cultural heritage.',
                'date' => Carbon::parse('2024-11-18'),
                'regions_id' => 3,  // Assuming a valid region ID exists
                'foreignNum' => 50,
                'localNum' => 150,
                'result' => 'Efforts for cultural preservation were outlined.',
                'quarters_id' => 4,  // Assuming a valid quarter ID exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Technology in Education Forum',
                'type' => 'Forum',
                'basis' => 'Educational Technology',
                'organizer' => 'Tech in Education Network',
                'goal' => 'To explore the use of technology in education.',
                'date' => Carbon::parse('2024-12-20'),
                'regions_id' => 4,  // Assuming a valid region ID exists
                'foreignNum' => 80,
                'localNum' => 120,
                'result' => 'New educational technologies were presented.',
                'quarters_id' => 1,  // Assuming a valid quarter ID exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
