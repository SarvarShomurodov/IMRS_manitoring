<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regions')->insert([
            [
                'name' => 'Қорақалпоғистон Республикаси',
            ],
            [
                'name' => 'Андижон вилояти',
            ],
            [
                'name' => 'Бухоро вилояти',
            ],
            [
                'name' => 'Жиззах вилояти',
            ],
            [
                'name' => 'Қашқадарё вилояти',
            ],
            [
                'name' => 'Навоий вилояти',
            ],
            [
                'name' => 'Наманган вилояти',
            ],
            [
                'name' => 'Самарқанд вилояти',
            ],
            [
                'name' => 'Сурхондарё вилояти',
            ],
            [
                'name' => 'Сирдарё вилояти',
            ],
            [
                'name' => 'Тошкент вилояти',
            ],
            [
                'name' => 'Фарғона вилояти',
            ],
            [
                'name' => 'Хоразм вилояти',
            ],
        ]); 
    }
}
