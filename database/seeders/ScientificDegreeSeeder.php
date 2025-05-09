<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScientificDegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('scientific_degrees')->insert([
            [
                'name' => 'PhD',
                'year_num' => 202,
            ],
            [
                'name' => 'DSc',
                'year_num' => 203,
            ],
        ]); 
    }
}
