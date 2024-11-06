<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WhoPublishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('who_publishes')->insert([
            [
                'name' => 'ижтимоий-иқтисодий сайтларда илмий таҳлилий мақолалар',
                'year_num' => 202,
            ],
            [
                'name' => 'тайёрланган пресс релизлар (оммабоп материаллар)',
                'year_num' => 203,
            ],
            [
                'name' => 'тайёрланган қисқача маълумотлар (пост)',
                'year_num' => 204,
            ],
            [
                'name' => 'Институт сайти ҳамда телеграм каналида жойлаштирилган инфографикалар сони',
                'year_num' => 205,
            ],
            [
                'name' => 'Радио ва ТВканалларида илмий интервьюлар сони',
                'year_num' => 206,
            ],
            [
                'name' => 'Тақдимотлар ва видеороликлар сони',
                'year_num' => 207,
            ],
        ]);
    }
}
