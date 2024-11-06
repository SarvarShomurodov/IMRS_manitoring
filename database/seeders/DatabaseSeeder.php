<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            QuarterSeeder::class,
            RegionSeeder::class,
            ScientificDegreeSeeder::class,
            WhoGivenSeeder::class,
            WhoPublishSeeder::class,
            PublishSeeder::class,
            ConventionTypeSeeder::class,
        ]);
    }
}
