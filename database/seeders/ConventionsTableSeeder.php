<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Convention;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConventionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('conventions')->insert([
            [
                'name' => 'Global Economic Convention',
                'who_given_id' => 1,
                'type_id' => 1,
                'organizer' => 'International Economic Forum',
                'date' => Carbon::parse('2024-01-15'),
                'employees_count' => 100,
                'list' => 'List of attendees and notable speakers...',
                'quarters_id' => 1,
            ],
            [
                'name' => 'Healthcare Innovation Summit',
                'who_given_id' => 2,
                'type_id' => 2,
                'organizer' => 'Global Health Organization',
                'date' => Carbon::parse('2024-02-20'),
                'employees_count' => 150,
                'list' => 'List of healthcare professionals...',
                'quarters_id' => 1,
            ],
            [
                'name' => 'Environmental Action Meeting',
                'who_given_id' => 3,
                'type_id' => 3,
                'organizer' => 'Green Planet Initiative',
                'date' => Carbon::parse('2024-03-25'),
                'employees_count' => 200,
                'list' => 'List of environmental experts...',
                'quarters_id' => 2,
            ],
            [
                'name' => 'Tech Innovation Forum',
                'who_given_id' => 4,
                'type_id' => 4,
                'organizer' => 'Tech World Alliance',
                'date' => Carbon::parse('2024-04-10'),
                'employees_count' => 120,
                'list' => 'List of tech leaders and innovators...',
                'quarters_id' => 2,
            ],
            [
                'name' => 'Education Leaders Conference',
                'who_given_id' => 5,
                'type_id' => 5,
                'organizer' => 'World Education Council',
                'date' => Carbon::parse('2024-05-18'),
                'employees_count' => 80,
                'list' => 'List of education experts...',
                'quarters_id' => 3,
            ],
            [
                'name' => 'Financial Markets Symposium',
                'who_given_id' => 6,
                'type_id' => 6,
                'organizer' => 'Finance Group International',
                'date' => Carbon::parse('2024-06-12'),
                'employees_count' => 95,
                'list' => 'List of financial analysts...',
                'quarters_id' => 3,
            ],
            [
                'name' => 'Agricultural Development Meeting',
                'who_given_id' => 7,
                'type_id' => 2,
                'organizer' => 'Agriculture United',
                'date' => Carbon::parse('2024-07-20'),
                'employees_count' => 110,
                'list' => 'List of agricultural scientists...',
                'quarters_id' => 4,
            ],
            [
                'name' => 'Human Rights Forum',
                'who_given_id' => 8,
                'type_id' => 4,
                'organizer' => 'Global Human Rights Organization',
                'date' => Carbon::parse('2024-08-05'),
                'employees_count' => 90,
                'list' => 'List of human rights advocates...',
                'quarters_id' => 4,
            ],
            [
                'name' => 'Digital Transformation Workshop',
                'who_given_id' => 2,
                'type_id' => 3,
                'organizer' => 'Digital Leaders Alliance',
                'date' => Carbon::parse('2024-09-15'),
                'employees_count' => 75,
                'list' => 'List of tech and business leaders...',
                'quarters_id' => 1,
            ],
            [
                'name' => 'Sustainable Development Forum',
                'who_given_id' => 2,
                'type_id' => 3,
                'organizer' => 'Global Sustainability Foundation',
                'date' => Carbon::parse('2024-10-20'),
                'employees_count' => 130,
                'list' => 'List of sustainability experts...',
                'quarters_id' => 2,
            ],
        ]);
        $conventions = Convention::all();
        foreach ($conventions as $convention) {
            $regions = [1, 2, 3]; // Example of region IDs to associate with the convention
            $convention->regions()->sync($regions);
        }
    }
}
