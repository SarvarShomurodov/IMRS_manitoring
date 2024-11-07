<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OpublishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('opublishes')->insert([
            [
                'name' => 'Public Awareness Campaign',
                'oav_id' => 5,
                'fio' => 'John Doe',
                'oav_name' => 'Global Media Org',
                'date' => Carbon::parse('2024-01-10'),
                'link' => 'http://example.com/campaign1',
                'quarters_id' => 1,
            ],
            [
                'name' => 'Financial Literacy Program',
                'oav_id' => 2,
                'fio' => 'Jane Smith',
                'oav_name' => 'Finance Times',
                'date' => Carbon::parse('2024-02-15'),
                'link' => 'http://example.com/program2',
                'quarters_id' => 1,
            ],
            [
                'name' => 'Tech for Good Summit',
                'oav_id' => 3,
                'fio' => 'Alice Brown',
                'oav_name' => 'Innovation Weekly',
                'date' => Carbon::parse('2024-03-12'),
                'link' => 'http://example.com/summit3',
                'quarters_id' => 2,
            ],
            [
                'name' => 'Healthcare Advances Report',
                'oav_id' => 4,
                'fio' => 'Bob White',
                'oav_name' => 'Health News',
                'date' => Carbon::parse('2024-04-08'),
                'link' => 'http://example.com/report4',
                'quarters_id' => 2,
            ],
            [
                'name' => 'Environmental Forum Coverage',
                'oav_id' => 1,
                'fio' => 'Sarah Green',
                'oav_name' => 'Nature Today',
                'date' => Carbon::parse('2024-05-18'),
                'link' => 'http://example.com/forum5',
                'quarters_id' => 3,
            ],
            [
                'name' => 'Education Reform Updates',
                'oav_id' => 6,
                'fio' => 'Michael Gray',
                'oav_name' => 'Education Daily',
                'date' => Carbon::parse('2024-06-25'),
                'link' => 'http://example.com/updates6',
                'quarters_id' => 3,
            ],
            [
                'name' => 'Sustainable Energy Insights',
                'oav_id' => 3,
                'fio' => 'Emily Davis',
                'oav_name' => 'Energy Today',
                'date' => Carbon::parse('2024-07-20'),
                'link' => 'http://example.com/insights7',
                'quarters_id' => 4,
            ],
            [
                'name' => 'AI in Education Webinar',
                'oav_id' => 5,
                'fio' => 'David Clark',
                'oav_name' => 'Tech Tomorrow',
                'date' => Carbon::parse('2024-08-10'),
                'link' => 'http://example.com/webinar8',
                'quarters_id' => 4,
            ],
            [
                'name' => 'Blockchain in Business',
                'oav_id' => 1,
                'fio' => 'Sophia Wilson',
                'oav_name' => 'Business Today',
                'date' => Carbon::parse('2024-09-05'),
                'link' => 'http://example.com/blockchain9',
                'quarters_id' => 1,
            ],
            [
                'name' => 'Developing Economies Analysis',
                'oav_id' => 2,
                'fio' => 'Mark Lee',
                'oav_name' => 'Economy World',
                'date' => Carbon::parse('2024-10-02'),
                'link' => 'http://example.com/analysis10',
                'quarters_id' => 2,
            ],
        ]);
    }
}
