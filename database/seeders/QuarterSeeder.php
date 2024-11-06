<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quarters')->insert([
            [
                'name' => '1-чорак',
            ],
            [
                'name' => '2-чорак',
            ],
            [
                'name' => '3-чорак',
            ],
            [
                'name' => '4-чорак',
            ],
        ]); 
    }
}
