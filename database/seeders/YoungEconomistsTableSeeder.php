<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class YoungEconomistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('young_economists')->insert([
            [
                'name' => 'Alice Johnson',
                'position' => 'Junior Economist',
                'date' => Carbon::parse('2024-11-10'),
                'list_person_local' => 'Person A, Person B, Person C',
                'list_person_no_local' => 'Person D, Person E',
                'quarters_id' => 1,
            ],
            [
                'name' => 'Bob Smith',
                'position' => 'Senior Analyst',
                'date' => Carbon::parse('2024-12-05'),
                'list_person_local' => 'Person F, Person G',
                'list_person_no_local' => 'Person H, Person I',
                'quarters_id' => 2,
            ],
            [
                'name' => 'Carol Williams',
                'position' => 'Research Assistant',
                'date' => Carbon::parse('2025-01-15'),
                'list_person_local' => 'Person J, Person K, Person L',
                'list_person_no_local' => 'Person M, Person N',
                'quarters_id' => 3,
            ],
            [
                'name' => 'David Brown',
                'position' => 'Data Analyst',
                'date' => Carbon::parse('2025-02-20'),
                'list_person_local' => 'Person O, Person P',
                'list_person_no_local' => 'Person Q, Person R, Person S',
                'quarters_id' => 4,
            ],
            [
                'name' => 'Emma Garcia',
                'position' => 'Economic Specialist',
                'date' => Carbon::parse('2025-03-10'),
                'list_person_local' => 'Person T, Person U, Person V',
                'list_person_no_local' => 'Person W, Person X',
                'quarters_id' => 1,
            ],
            [
                'name' => 'Frank Martin',
                'position' => 'Market Analyst',
                'date' => Carbon::parse('2025-04-25'),
                'list_person_local' => 'Person Y, Person Z',
                'list_person_no_local' => 'Person AA, Person BB',
                'quarters_id' => 2,
            ],
            [
                'name' => 'Grace Lee',
                'position' => 'Junior Data Scientist',
                'date' => Carbon::parse('2025-05-30'),
                'list_person_local' => 'Person CC, Person DD',
                'list_person_no_local' => 'Person EE, Person FF, Person GG',
                'quarters_id' => 3,
            ],
            [
                'name' => 'Henry Young',
                'position' => 'Economic Researcher',
                'date' => Carbon::parse('2025-06-15'),
                'list_person_local' => 'Person HH, Person II',
                'list_person_no_local' => 'Person JJ, Person KK',
                'quarters_id' => 4,
            ],
            [
                'name' => 'Isabella Wilson',
                'position' => 'Policy Analyst',
                'date' => Carbon::parse('2025-07-05'),
                'list_person_local' => 'Person LL, Person MM',
                'list_person_no_local' => 'Person NN, Person OO',
                'quarters_id' => 1,
            ],
            [
                'name' => 'James Taylor',
                'position' => 'Financial Economist',
                'date' => Carbon::parse('2025-08-01'),
                'list_person_local' => 'Person PP, Person QQ',
                'list_person_no_local' => 'Person RR, Person SS',
                'quarters_id' => 2,
            ],
        ]);
    }
}
