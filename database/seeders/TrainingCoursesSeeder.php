<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\TrainingCourse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TrainingCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('training_courses')->insert([
            [
                'name' => 'Advanced PHP Training',
                'type' => 'Technical',
                'organizer' => 'Tech Academy',
                'date' => Carbon::parse('2024-11-15'),
                'invite_count' => 50,
                'list_person' => json_encode(['Person A', 'Person B', 'Person C']),
                'quarters_id' => 2, // Assuming quarter ID 2 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Leadership Development Program',
                'type' => 'Management',
                'organizer' => 'Leadership Institute',
                'date' => Carbon::parse('2024-12-05'),
                'invite_count' => 30,
                'list_person' => json_encode(['Person D', 'Person E']),
                'quarters_id' => 3, // Assuming quarter ID 3 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Database Management Essentials',
                'type' => 'Technical',
                'organizer' => 'DB Academy',
                'date' => Carbon::parse('2024-12-10'),
                'invite_count' => 40,
                'list_person' => json_encode(['Person F', 'Person G']),
                'quarters_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Data Science Fundamentals',
                'type' => 'Technical',
                'organizer' => 'Data Academy',
                'date' => Carbon::parse('2024-11-20'),
                'invite_count' => 25,
                'list_person' => json_encode(['Person H', 'Person I', 'Person J']),
                'quarters_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Project Management 101',
                'type' => 'Management',
                'organizer' => 'PMI',
                'date' => Carbon::parse('2024-11-22'),
                'invite_count' => 35,
                'list_person' => json_encode(['Person K', 'Person L']),
                'quarters_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'UI/UX Design Principles',
                'type' => 'Design',
                'organizer' => 'Design Academy',
                'date' => Carbon::parse('2024-12-02'),
                'invite_count' => 45,
                'list_person' => json_encode(['Person M', 'Person N']),
                'quarters_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cybersecurity for Beginners',
                'type' => 'Security',
                'organizer' => 'Security Academy',
                'date' => Carbon::parse('2024-11-25'),
                'invite_count' => 60,
                'list_person' => json_encode(['Person O', 'Person P']),
                'quarters_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Digital Marketing Strategies',
                'type' => 'Marketing',
                'organizer' => 'Marketing Academy',
                'date' => Carbon::parse('2024-12-15'),
                'invite_count' => 20,
                'list_person' => json_encode(['Person Q', 'Person R']),
                'quarters_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Artificial Intelligence and Machine Learning',
                'type' => 'Technical',
                'organizer' => 'AI Academy',
                'date' => Carbon::parse('2024-12-18'),
                'invite_count' => 50,
                'list_person' => json_encode(['Person S', 'Person T']),
                'quarters_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Communication Skills Training',
                'type' => 'Soft Skills',
                'organizer' => 'Skills Academy',
                'date' => Carbon::parse('2024-11-28'),
                'invite_count' => 30,
                'list_person' => json_encode(['Person U', 'Person V']),
                'quarters_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        $conventions = TrainingCourse::all();
        foreach ($conventions as $convention) {
            $regions = [3, 2, 5]; // Example of region IDs to associate with the convention
            $convention->regions()->sync($regions);
        }
    }
}
