<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientDonneesAlertesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_donnees_alertes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nature');
            $table->enum('type_alerte', ['allergie','intolerence','autre']);
            $table->text('description');
            $table->integer('patient_id')->unsigned();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_donnees_alertes');
    }
}
