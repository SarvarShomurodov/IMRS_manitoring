<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConventionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('convention_types')->insert([
            [
                'name' => 'семинар',
                'year_num' => 202,
            ],
            [
                'name' => 'вебинар',
                'year_num' => 203,
            ],
            [
                'name' => 'давра суҳбат',
                'year_num' => 204,
            ],
            [
                'name' => 'конференция',
                'year_num' => 205,
            ],
            [
                'name' => 'форум',
                'year_num' => 206,
            ],
            [
                'name' => 'бошқа',
                'year_num' => 207,
            ],
        ]);
    }
}
