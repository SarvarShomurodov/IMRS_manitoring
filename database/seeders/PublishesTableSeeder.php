<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PublishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('publishes')->insert([
            [
                'name' => 'Economic Development and Challenges',
                'author' => 'John Doe',
                'type_id' => 7,
                'jurnal_name' => 'Journal of Economic Perspectives',
                'date' => Carbon::parse('2024-01-15'),
                'number' => 1,
                'pages' => 15,
                'link' => 'http://example.com/article1',
                'quarters_id' => 1,
            ],
            [
                'name' => 'Sustainable Finance',
                'author' => 'Jane Smith',
                'type_id' => 2,
                'jurnal_name' => 'Finance Today',
                'date' => Carbon::parse('2024-02-20'),
                'number' => 2,
                'pages' => 22,
                'link' => 'http://example.com/article2',
                'quarters_id' => 1,
            ],
            [
                'name' => 'Advances in Machine Learning',
                'author' => 'Alice Brown',
                'type_id' => 1,
                'jurnal_name' => 'Tech Innovations',
                'date' => Carbon::parse('2024-03-10'),
                'number' => 3,
                'pages' => 18,
                'link' => 'http://example.com/article3',
                'quarters_id' => 2,
            ],
            [
                'name' => 'Climate Change Impact',
                'author' => 'Bob White',
                'type_id' => 5,
                'jurnal_name' => 'Environmental Review',
                'date' => Carbon::parse('2024-04-05'),
                'number' => 4,
                'pages' => 10,
                'link' => 'http://example.com/article4',
                'quarters_id' => 2,
            ],
            [
                'name' => 'Global Economic Trends',
                'author' => 'Sarah Green',
                'type_id' => 1,
                'jurnal_name' => 'World Economy',
                'date' => Carbon::parse('2024-05-01'),
                'number' => 5,
                'pages' => 30,
                'link' => 'http://example.com/article5',
                'quarters_id' => 3,
            ],
            [
                'name' => 'Healthcare Innovations',
                'author' => 'Michael Gray',
                'type_id' => 3,
                'jurnal_name' => 'Medical Journal',
                'date' => Carbon::parse('2024-06-12'),
                'number' => 6,
                'pages' => 25,
                'link' => 'http://example.com/article6',
                'quarters_id' => 3,
            ],
            [
                'name' => 'Renewable Energy Sources',
                'author' => 'Emily Davis',
                'type_id' => 1,
                'jurnal_name' => 'Energy & Environment',
                'date' => Carbon::parse('2024-07-15'),
                'number' => 7,
                'pages' => 12,
                'link' => 'http://example.com/article7',
                'quarters_id' => 4,
            ],
            [
                'name' => 'Artificial Intelligence in Education',
                'author' => 'David Clark',
                'type_id' => 3,
                'jurnal_name' => 'Education Today',
                'date' => Carbon::parse('2024-08-20'),
                'number' => 8,
                'pages' => 20,
                'link' => 'http://example.com/article8',
                'quarters_id' => 4,
            ],
            [
                'name' => 'Blockchain Technology',
                'author' => 'Sophia Wilson',
                'type_id' => 1,
                'jurnal_name' => 'Tech Frontier',
                'date' => Carbon::parse('2024-09-10'),
                'number' => 9,
                'pages' => 28,
                'link' => 'http://example.com/article9',
                'quarters_id' => 1,
            ],
            [
                'name' => 'Economic Policy in Developing Countries',
                'author' => 'Mark Lee',
                'type_id' => 8,
                'jurnal_name' => 'Global Economy Journal',
                'date' => Carbon::parse('2024-10-25'),
                'number' => 10,
                'pages' => 32,
                'link' => 'http://example.com/article10',
                'quarters_id' => 2,
            ],
        ]);
    }
}
