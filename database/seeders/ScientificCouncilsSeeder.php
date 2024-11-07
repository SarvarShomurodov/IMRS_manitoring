<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScientificCouncilsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('scientific_councils')->insert([
            [
                'degree_id' => 1, // Assuming the degree ID 1 exists in scientific_degrees table
                'name' => 'Physics Research Council',
                'type' => 'Research',
                'start_date' => Carbon::parse('2024-01-15'),
                'end_date' => Carbon::parse('2024-12-15'),
                'date' => Carbon::parse('2024-01-15'),
                'quarters_id' => 1, // Assuming the quarters ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'degree_id' => 2, // Assuming the degree ID 2 exists in scientific_degrees table
                'name' => 'Mathematics Research Council',
                'type' => 'Research',
                'start_date' => Carbon::parse('2024-02-10'),
                'end_date' => Carbon::parse('2024-11-10'),
                'date' => Carbon::parse('2024-02-10'),
                'quarters_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'degree_id' => 1, 
                'name' => 'Engineering Research Council',
                'type' => 'Research',
                'start_date' => Carbon::parse('2024-03-20'),
                'end_date' => Carbon::parse('2024-09-20'),
                'date' => Carbon::parse('2024-03-20'),
                'quarters_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'degree_id' => 2, 
                'name' => 'Medical Research Council',
                'type' => 'Research',
                'start_date' => Carbon::parse('2024-04-05'),
                'end_date' => Carbon::parse('2024-10-05'),
                'date' => Carbon::parse('2024-04-05'),
                'quarters_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'degree_id' => 1, 
                'name' => 'Environmental Studies Council',
                'type' => 'Research',
                'start_date' => Carbon::parse('2024-05-01'),
                'end_date' => Carbon::parse('2024-12-01'),
                'date' => Carbon::parse('2024-05-01'),
                'quarters_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'degree_id' => 2, 
                'name' => 'Quantum Computing Research Council',
                'type' => 'Research',
                'start_date' => Carbon::parse('2024-06-10'),
                'end_date' => Carbon::parse('2024-11-10'),
                'date' => Carbon::parse('2024-06-10'),
                'quarters_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'degree_id' => 1, 
                'name' => 'Biotechnology Research Council',
                'type' => 'Research',
                'start_date' => Carbon::parse('2024-07-15'),
                'end_date' => Carbon::parse('2024-12-15'),
                'date' => Carbon::parse('2024-07-15'),
                'quarters_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'degree_id' => 2, 
                'name' => 'Astronomy Research Council',
                'type' => 'Research',
                'start_date' => Carbon::parse('2024-08-20'),
                'end_date' => Carbon::parse('2024-11-20'),
                'date' => Carbon::parse('2024-08-20'),
                'quarters_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'degree_id' => 1, 
                'name' => 'Artificial Intelligence Research Council',
                'type' => 'Research',
                'start_date' => Carbon::parse('2024-09-10'),
                'end_date' => Carbon::parse('2024-12-10'),
                'date' => Carbon::parse('2024-09-10'),
                'quarters_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'degree_id' => 2, 
                'name' => 'Cybersecurity Research Council',
                'type' => 'Research',
                'start_date' => Carbon::parse('2024-10-01'),
                'end_date' => Carbon::parse('2024-12-01'),
                'date' => Carbon::parse('2024-10-01'),
                'quarters_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
