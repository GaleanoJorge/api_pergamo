<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalCitationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_citation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('note');
            $table->time('start_time');
            $table->time('finish_time');
            $table->date('start_date');
            $table->date('finish_date');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('assistance_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedTinyInteger('status_id');
            $table->timestamps();


            $table->index('assistance_id');
            $table->index('patient_id');
            $table->index('user_id');
            $table->index('status_id');


            $table->foreign('assistance_id')->references('id')
                ->on('assistance');
            $table->foreign('patient_id')->references('id')
                ->on('patients');
            $table->foreign('user_id')->references('id')
                ->on('users');
                $table->foreign('status_id')->references('id')
                ->on('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_citation');
    }
}
