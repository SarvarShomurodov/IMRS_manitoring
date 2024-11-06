<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WhoGivenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('who_givens')->insert([
            [
                'name' => 'Президент Администрацияси ва қуйи ташкилотларга',
                'year_num' => 202,
            ],
            [
                'name' => 'Вазирлар Маҳкамасига',
                'year_num' => 203,
            ],
            [
                'name' => 'Олий Мажлисга',
                'year_num' => 204,
            ],
            [
                'name' => 'Иқтисодиёт ва молия вазирлигига',
                'year_num' => 205,
            ],
            [
                'name' => 'Бошқалар',
                'year_num' => 206,
            ],
            [
                'name' => 'Раҳбарият топшириқлар сони ',
                'year_num' => 207,
            ],
            [
                'name' => 'Илмий тадқиқот ишлари режасига мувофиқ',
                'year_num' => 208,
            ],
            [
                'name' => 'Ташаббускор тадқиқот ишлари',
                'year_num' => 209,
            ],
        ]); 
    }
}
