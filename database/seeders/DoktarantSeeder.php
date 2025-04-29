<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoktarantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('doktarantids')->insert([
            [
                'name' => 'таянч докторантлар',
                'year_num' => 202,
            ],
            [
                'name' => 'докторантлар',
                'year_num' => 203,
            ],
            [
                'name' => 'DSc',
                'year_num' => 204,
            ],
            [
                'name' => 'PhD',
                'year_num' => 205,
            ],
        ]); 
    }
}
