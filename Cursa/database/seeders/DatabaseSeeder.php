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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RacesTableSeeder::class
        ]);

       /* $this->call([
            RunnersTableSeeder::class
        ]);*/

        $this->call([
            InsurersTableSeeder::class
        ]);

        $this->call([
            SponsorsTableSeeder::class
        ]);

    }
}
