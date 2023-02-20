<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Insurer;
class InsurersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Insurer1
         $insurer1 = new Insurer;
         $insurer1->cif = 'A-28141935';
         $insurer1->name = 'MAPFRE ESPAÑA';
         $insurer1->address = 'Carretera de Pozuelo, 50, 28222 Majadahonda, Madrid';
         $insurer1->active  = false;

        //Insurer2
         $insurer2 = new Insurer;
         $insurer2->cif = 'A-60917978';
         $insurer2->name = 'Axa Seguros Generales';
         $insurer2->address = 'C/ Monseñor Palmer 1 de Palma de Mallorca';
         $insurer2->active  = false;

        //Insurer3
         $insurer3 = new Insurer;
         $insurer3->cif = 'A28007268';
         $insurer3->name = 'Generali Seguros';
         $insurer3->address = 'C/ ORENSE, 2 28020, MADRID, MADRID';
         $insurer3->active  = false;

        //Insurer4
         $insurer4 = new Insurer;
         $insurer4->cif = 'A28007748';
         $insurer4->name = 'ALLIANZ';
         $insurer4->address = 'C/ Ramírez de Arellano, 35, 28043 de Madrid';
         $insurer4->active  = false;

        //Insurer5
         $insurer5 = new Insurer;
         $insurer5->cif = 'A28011864';
         $insurer5->name = 'Segurcaixa Adeslas';
         $insurer5->address = 'Paseo de la Castellana, 259 C';
         $insurer5->active  = false;

        //Insurer6
         $insurer6 = new Insurer;
         $insurer6->cif = 'A58333261';
         $insurer6->name = 'Vida Caixa';
         $insurer6->address = 'PASEO CASTELLANA, 189';
         $insurer6->active  = false;
    }
}
