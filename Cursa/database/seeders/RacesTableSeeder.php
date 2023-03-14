<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Race;
class RacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Race1
        $race1 = new Race;
        $race1 -> name = "Barcelona";
        $race1 -> description = 'Su variedad paisajística y sus carreteras asfaltadas las convierten en uno de los lugares más interesantes de la península para los amantes de este deporte';
        $race1 -> ramp = 450;
        $race1 -> max_participants = '100';
        $race1 -> race_price = 100;
        $race1 -> km = 432;
        $race1 -> date = '2023-02-20';
        $race1 -> hour = '06:00:00';
        $race1 -> starting_point = 'La Sierra de Cazorla';
        $race1 -> maps_image  = '20230204101753.png';
        $race1 -> promotional_poster  = '20230204101753.jpg';
        $race1 -> sponsor_price = 0;
        $race1 -> save();

        //Race2
        $race2 = new Race;
        $race2 -> name = "Madrid";
        $race2 -> description = 'Muy pronto toda la información estará disponible';
        $race2 -> ramp = 0;
        $race2 -> max_participants = '0';
        $race2 -> race_price = 260;
        $race2 -> km = 0;
        $race2 -> date = '2023-02-04';
        $race2 -> hour = '00:00:00';
        $race2 -> starting_point = 'a';
        $race2 -> maps_image  = '20230204102037.png';
        $race2 -> promotional_poster = '20230204102037.jpg';
        $race2 -> sponsor_price = 0;
        $race2 -> save();

        //Race3
        $race3 = new Race;
        $race3 ->name = "Sevilla";
        $race3 -> description = 'Cumbres infinitas, pendientes imponentes y unos paisajes de altura que te dejarán impresionado. Ven con nosotros a cumplir tu sueño ciclista. Apúntate a nuestro stage en grupo organizado.';
        $race3 -> ramp = 600;
        $race3 -> max_participants = '80';
        $race3 -> race_price = 137;
        $race3 -> km = 0;
        $race3 -> date = '2023-02-20';
        $race3 -> hour = '06:00:00';
        $race3 -> starting_point = 'Isla de Tenerife';
        $race3 -> maps_image  = '20230204102150.png';
        $race3 -> promotional_poster = '20230204102150.jpg';
        $race3 -> sponsor_price = 0;
        $race3 -> save();

        //Race4
        $race4 = new Race;
        $race4 ->name = "Andorra";
        $race4 -> description = 'Apúntate a nuestra ruta de cicloturismo por el Tirol Austriaco, los Alpes Julianos y Dolomite. Un desafío único que te llevará a conocer algunos de los parajes más increíbles de Europa.';
        $race4 -> ramp = 440;
        $race4 -> max_participants = '50';
        $race4 -> race_price = 149;
        $race4 -> km = 639;
        $race4 -> date = '2023-03-13';
        $race4 -> hour = '09:00:00';
        $race4 -> starting_point = 'Tirol Austriaco';
        $race4 -> maps_image  = '20230204102405.png';
        $race4 -> promotional_poster = '20230204102405.jpg';
        $race4 -> sponsor_price = 0;
        $race4 -> save();

        //Race5
        $race5 = new Race;
        $race5 ->name = "Aragon";
        $race5 -> description = 'Una tierra de montañas bañada por las aguas del río Miño y del río Sil.  Sin duda, Los Ancares y la Ribeira Sacra son dos parajes naturales ideales para disfrutar a bordo de la bici.';
        $race5 -> ramp = 450;
        $race5 -> max_participants = '100';
        $race5 -> race_price = 145;
        $race5 -> km = 694;
        $race5 -> date = '2023-05-27';
        $race5 -> hour = '08:00:00';
        $race5 -> starting_point = 'Los Ancares';
        $race5 -> maps_image  = '20230204102511.png';
        $race5 -> promotional_poster = '20230204102511.jpg';
        $race5 -> sponsor_price = 0;
        $race5 -> save();

        //Race6
        $race6 = new Race;
        $race6 ->name = "Alemania";
        $race6 -> description = 'Únete a nuestra ruta de cicloturismo en el Parque Nacional del Stelvio. Una experiencia única para recorrer a golpe de pedal los Alpes Centrales y sentirte como una leyenda del Giro';
        $race6 -> ramp = 500;
        $race6 -> max_participants = '70';
        $race6 -> race_price = 150;
        $race6 -> km = 693;
        $race6 -> date = '2023-02-13';
        $race6 -> hour = '05:00:00';
        $race6 -> starting_point = 'Parque Nacional del Stelvio';
        $race6 -> maps_image  = '20230204102732.png';
        $race6 -> promotional_poster = '20230204102732.jpg';
        $race6 -> sponsor_price = 0;
        $race6 -> save();

        //Race7
        $race7 = new Race;
        $race7 ->name = "Valencia";
        $race7 -> description = 'Puertos de montaña, senderos junto al mar, rutas de interior… Asturias lo tiene todo para ser un auténtico paraíso ciclista.';
        $race7 -> ramp = 430;
        $race7 -> max_participants = '100';
        $race7 -> race_price = 200;
        $race7 -> km = 710;
        $race7 -> date = '2023-02-28';
        $race7 -> hour = '09:00:00';
        $race7 -> starting_point = 'Asturias';
        $race7 -> maps_image  = '20230204102850.png';
        $race7 -> promotional_poster = '20230204102850.jpg';
        $race7 -> sponsor_price = 0;
        $race7 -> save();

    }
}
