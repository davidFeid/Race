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
            $table->integer('runner_id')->unsigned();
            $table->string('insurer_cif');
            $table->string('sponsor_cif');
            $table->string('qr');
            $table->foreign('runner_id')->references('id')->on('runners');
            $table->foreign('insurer_cif')->references('cif')->on('insurers');
            $table->foreign('sponsor_cif')->references('cif')->on('sponsors');
            $table->primary(array('runner_id', 'insurer_cif', 'sponsor_cif','qr'));
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
