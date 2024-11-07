<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScientificSeminarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('scientific_seminars')->insert([
            [
                'name' => 'Seminar on AI in Research',
                'organizationName' => 'Tech Innovators Association',
                'topic' => 'Artificial Intelligence in Modern Research',
                'leaderName' => 'Dr. John Doe',
                'degree_id' => 1, // Degree ID 1
                'date' => Carbon::parse('2024-01-15'),
                'number' => 101,
                'conclusion' => 'AI is shaping the future of research with its vast applications.',
                'quarters_id' => 1, // Assuming quarters ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seminar on Data Science',
                'organizationName' => 'Data Science Academy',
                'topic' => 'Trends and Future of Data Science',
                'leaderName' => 'Dr. Jane Smith',
                'degree_id' => 2, // Degree ID 2
                'date' => Carbon::parse('2024-02-20'),
                'number' => 102,
                'conclusion' => 'Data science continues to grow as a major field in technology.',
                'quarters_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seminar on Blockchain Technology',
                'organizationName' => 'Blockchain Network',
                'topic' => 'Blockchain and its Applications in Security',
                'leaderName' => 'Prof. Alan Turing',
                'degree_id' => 1, // Degree ID 1
                'date' => Carbon::parse('2024-03-25'),
                'number' => 103,
                'conclusion' => 'Blockchain technology offers unmatched security for data.',
                'quarters_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seminar on Quantum Computing',
                'organizationName' => 'Quantum Computing Institute',
                'topic' => 'The Impact of Quantum Computing on Science',
                'leaderName' => 'Dr. Marie Curie',
                'degree_id' => 2, // Degree ID 2
                'date' => Carbon::parse('2024-04-10'),
                'number' => 104,
                'conclusion' => 'Quantum computing holds the potential to revolutionize various fields.',
                'quarters_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seminar on Ethical Research Practices',
                'organizationName' => 'Research Ethics Council',
                'topic' => 'Ethical Considerations in Modern Research',
                'leaderName' => 'Prof. Albert Einstein',
                'degree_id' => 1, // Degree ID 1
                'date' => Carbon::parse('2024-05-05'),
                'number' => 105,
                'conclusion' => 'Ethical standards are crucial to ensure integrity in scientific work.',
                'quarters_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seminar on Nanotechnology',
                'organizationName' => 'Nanotech Solutions',
                'topic' => 'Applications of Nanotechnology in Medicine',
                'leaderName' => 'Dr. Richard Feynman',
                'degree_id' => 2, // Degree ID 2
                'date' => Carbon::parse('2024-06-12'),
                'number' => 106,
                'conclusion' => 'Nanotechnology is revolutionizing the medical field with new treatments.',
                'quarters_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seminar on Renewable Energy',
                'organizationName' => 'Renewable Energy Institute',
                'topic' => 'Sustainable Solutions for a Green Future',
                'leaderName' => 'Dr. Nikola Tesla',
                'degree_id' => 1, // Degree ID 1
                'date' => Carbon::parse('2024-07-15'),
                'number' => 107,
                'conclusion' => 'Renewable energy is key to mitigating climate change.',
                'quarters_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seminar on Genetic Research',
                'organizationName' => 'Genetics Research Hub',
                'topic' => 'Gene Editing and Its Future in Medicine',
                'leaderName' => 'Dr. Charles Darwin',
                'degree_id' => 2, // Degree ID 2
                'date' => Carbon::parse('2024-08-01'),
                'number' => 108,
                'conclusion' => 'Gene editing promises groundbreaking treatments for genetic disorders.',
                'quarters_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seminar on Artificial Intelligence',
                'organizationName' => 'AI Society',
                'topic' => 'AI in Healthcare: Transforming Medicine',
                'leaderName' => 'Prof. Alan Turing',
                'degree_id' => 1, // Degree ID 1
                'date' => Carbon::parse('2024-09-10'),
                'number' => 109,
                'conclusion' => 'AI is transforming healthcare by enabling personalized treatments.',
                'quarters_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seminar on Data Privacy',
                'organizationName' => 'Data Privacy Council',
                'topic' => 'Ensuring Data Security in the Digital Age',
                'leaderName' => 'Dr. Edward Snowden',
                'degree_id' => 2, // Degree ID 2
                'date' => Carbon::parse('2024-10-20'),
                'number' => 110,
                'conclusion' => 'Data privacy must be prioritized to protect user information.',
                'quarters_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
