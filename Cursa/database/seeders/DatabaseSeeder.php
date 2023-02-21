<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RacesTableSeeder::class
        ]);

        $this->call([
            InsurersTableSeeder::class
        ]);

        $this->call([
            SponsorsTableSeeder::class
        ]);
        $this->call([
            RaceInsurersTableSeeder::class
        ]);
        $this->call([
            UserTableSeeder::class
        ]);

    }
}
