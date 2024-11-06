<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PublishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('publish_types')->insert([
            [
                'name' => 'Илмий-услубий қўлланма',
                'year_num' => 202,
            ],
            [
                'name' => 'Монография',
                'year_num' => 203,
            ],
            [
                'name' => 'Web of Science va Scopus базаларига киритилган нашрларда мақолалар',
                'year_num' => 204,
            ],
            [
                'name' => 'RINTS базаларига киритилган нашрларда мақолалар',
                'year_num' => 205,
            ],
            [
                'name' => 'хорижий нашрларда мақолалар',
                'year_num' => 206,
            ],
            [
                'name' => 'маҳаллий нашрларда мақолалар',
                'year_num' => 207,
            ],
            [
                'name' => 'Халқаро Илмий анжуманлар материалларида тезислар',
                'year_num' => 208,
            ],
            [
                'name' => 'Республика илмий анжуманлари материалларида тезислар',
                'year_num' => 209,
            ],
            [
                'name' => 'маҳаллий рўзномаларда илмий мақолалар',
                'year_num' => 209,
            ],
        ]); 
    }
}
