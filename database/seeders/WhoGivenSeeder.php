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
                'name' => 'Олий Мажлис Сенати топшириғи',
                'year_num' => 204,
            ],
            [
                'name' => 'Иқтисодиёт ва молия вазирлигига',
                'year_num' => 205,
            ],
            [
                'name' => 'Бошқа ташқилотлар хати',
                'year_num' => 206,
            ],
            ['name' => 'Олий Мажлис Қонунчилик палатаси топшириғи', 'year_num' => 220],
            ['name' => 'Стратегик ва минтақалараро тадқиқотлар институти хати', 'year_num' => 214],
            ['name' => 'Иқтисодий тадқиқотлар ва ислоҳотлар маркази хати', 'year_num' => 215],
            ['name' => 'Қонунчилик ва ҳукукий сиёсати институти хати', 'year_num' => 216],
            ['name' => 'Стратегик ислоҳотлар агентлиги ва бошқа ПА қуйи ташкилотлари хати', 'year_num' => 217],
            ['name' => 'Вазирлар Маҳкамаси топшириғи', 'year_num' => 218],
            [
                'name' => 'Раҳбарият топшириқлар сони ',
                'year_num' => 207,
            ],
            [
                'name' => 'Илмий тадқиқот ишлари режасига мувофиқ бажарилган ишлар сони',
                'year_num' => 208,
            ],
            [
                'name' => 'Ташаббускор тадқиқот ишлар сони',
                'year_num' => 209,
            ],
        ]); 
    }
}
