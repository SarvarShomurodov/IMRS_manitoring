<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SurvayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('surveys')->insert([
                'name' => $faker->word,
                'who_given_id' => $faker->numberBetween(1, 5),  // Adjust to valid IDs
                'assDate' => $faker->date(),
                'assNumber' => $faker->numberBetween(100, 999),
                'whoSend' => $faker->company,
                'letterDate' => $faker->date(),
                'letterNumber' => $faker->numberBetween(100, 999),
                'direction' => $faker->word,
                'regions_id' => $faker->numberBetween(1, 5),  // Adjust to valid region IDs
                'shortResult' => $faker->sentence,
                'readyArticle' => $faker->url,
                'telegram' => $faker->url,
                'pressRelis' => $faker->url,
                'infografik' => $faker->url,
                'interyu' => $faker->url,
                'taqdimot' => $faker->url,
                'listPerson' => $faker->paragraph,
                'quarters_id' => $faker->numberBetween(1, 4),  // Adjust to valid quarters IDs
            ]);
        }
    }
}
