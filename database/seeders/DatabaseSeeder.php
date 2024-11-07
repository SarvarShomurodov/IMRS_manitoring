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
            BusinessTripsTableSeeder::class,
            HigherOrgansTableSeeder::class,
            TrainingCoursesSeeder::class,
            YoungEconomistsTableSeeder::class,
            PublishesTableSeeder::class,
            OpublishesTableSeeder::class,
            ConventionsTableSeeder::class,
            ScientificCouncilsSeeder::class,
            ScientificSeminarsSeeder::class,
            MethodsSeeder::class,
            EventsTableSeeder::class,
            MeetingsTableSeeder::class
        ]);
    }
}
