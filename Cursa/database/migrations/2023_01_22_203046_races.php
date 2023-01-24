<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description', 255);
            $table->decimal('ramp', 5, 2);
            $table->string('max_participants');
            $table->decimal('km', 5, 2);
            $table->date('date');
            $table->time('hour');
            $table->string('starting_point');
            $table->string('maps_image');
            $table->string('promotional_poster');
            $table->float('sponsor_price');
            $table->enum('active',['0','1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('races');
    }
};