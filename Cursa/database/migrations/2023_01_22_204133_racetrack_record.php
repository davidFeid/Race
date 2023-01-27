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
        Schema::create('racetrack_records', function (Blueprint $table) {
            $table->integer('race_id')->unsigned();
            $table->integer('runner_id')->unsigned();
            $table->string('insurer_cif');
            $table->string('qr');
            $table->time('time');
            $table->integer('points');
            $table->foreign('runner_id')->references('id')->on('runners');
            $table->foreign('insurer_cif')->references('cif')->on('insurers');
            $table->foreign('race_id')->references('id')->on('races');
            $table->primary(array('runner_id', 'insurer_cif','qr','race_id'));
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
        Schema::dropIfExists('racetrack_records');
    }
};
