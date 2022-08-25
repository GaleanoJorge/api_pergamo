<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalDiaryDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_diary_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('days_id');
            $table->unsignedBigInteger('medical_diary_id');
            $table->timestamps();

            $table->index('days_id');
            $table->index('medical_diary_id');


            $table->foreign('days_id')->references('id')
                ->on('days');
            $table->foreign('medical_diary_id')->references('id')
                ->on('medical_diary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_diary_days');
    }
}
