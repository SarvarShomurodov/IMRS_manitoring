<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('methods')->insert([
            [
                'type' => 'Research Method',
                'name' => 'Quantitative Analysis',
                'position' => 'Lead Researcher',
                'reportName' => 'Quarterly Report Q1',
                'date' => Carbon::parse('2024-01-01'),
                'number' => 101,
                'conclusion' => 'The data indicates a positive trend in growth.',
                'quarters_id' => 1, // Assuming quarters ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Research Method',
                'name' => 'Qualitative Research',
                'position' => 'Junior Researcher',
                'reportName' => 'Quarterly Report Q2',
                'date' => Carbon::parse('2024-02-01'),
                'number' => 102,
                'conclusion' => 'In-depth interviews have provided rich insights.',
                'quarters_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Data Analysis',
                'name' => 'Statistical Modeling',
                'position' => 'Lead Analyst',
                'reportName' => 'Annual Report 2024',
                'date' => Carbon::parse('2024-03-01'),
                'number' => 103,
                'conclusion' => 'The predictive model showed a strong correlation.',
                'quarters_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Field Study',
                'name' => 'Observational Research',
                'position' => 'Field Researcher',
                'reportName' => 'Field Report Q1',
                'date' => Carbon::parse('2024-04-01'),
                'number' => 104,
                'conclusion' => 'The observed trends align with our initial hypotheses.',
                'quarters_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Laboratory Research',
                'name' => 'Chemical Analysis',
                'position' => 'Lab Technician',
                'reportName' => 'Lab Report Q1',
                'date' => Carbon::parse('2024-05-01'),
                'number' => 105,
                'conclusion' => 'The chemical reaction was consistent across trials.',
                'quarters_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Research Method',
                'name' => 'Survey Research',
                'position' => 'Survey Coordinator',
                'reportName' => 'Survey Results Report Q2',
                'date' => Carbon::parse('2024-06-01'),
                'number' => 106,
                'conclusion' => 'The survey results highlight a gap in consumer preferences.',
                'quarters_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Data Analysis',
                'name' => 'Machine Learning',
                'position' => 'Data Scientist',
                'reportName' => 'Machine Learning Results',
                'date' => Carbon::parse('2024-07-01'),
                'number' => 107,
                'conclusion' => 'The algorithm showed high accuracy in predictions.',
                'quarters_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Statistical Research',
                'name' => 'Regression Analysis',
                'position' => 'Statistician',
                'reportName' => 'Regression Analysis Report',
                'date' => Carbon::parse('2024-08-01'),
                'number' => 108,
                'conclusion' => 'The regression model predicted a significant increase.',
                'quarters_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Survey Research',
                'name' => 'Consumer Behavior Study',
                'position' => 'Research Assistant',
                'reportName' => 'Consumer Behavior Survey Report',
                'date' => Carbon::parse('2024-09-01'),
                'number' => 109,
                'conclusion' => 'There is a clear shift in consumer preferences towards eco-friendly products.',
                'quarters_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Data Collection',
                'name' => 'Big Data Analytics',
                'position' => 'Big Data Analyst',
                'reportName' => 'Big Data Analysis Report Q4',
                'date' => Carbon::parse('2024-10-01'),
                'number' => 110,
                'conclusion' => 'The large dataset provided deep insights into market trends.',
                'quarters_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
