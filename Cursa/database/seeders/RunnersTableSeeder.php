<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Runner;
class RunnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Runner1
         $runner1 = new Runner;
         $runner1 -> dni = '222222A';
         $runner1 -> name = 'David';
         $runner1 -> address = 'Av Lucas XII';
         $runner1 -> birth_date = '1997-02-20';
         $runner1 -> federation = 1;
         $runner1 -> num_federation = 111111;
         $runner1 -> save();

          //Runner2
          $runner2 = new Runner;
          $runner2 -> dni = '111111A';
          $runner2 -> name = 'Victor';
          $runner2 -> address = 'Av Alfonso XIII';
          $runner2 -> birth_date = '1998-02-20';
          $runner2 -> federation = 1;
          $runner2 -> num_federation = 111111;
          $runner2 -> save();
    }
}
