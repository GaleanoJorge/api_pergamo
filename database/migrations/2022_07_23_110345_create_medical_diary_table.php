<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalDiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_diary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('assistance_id');
            $table->unsignedBigInteger('office_id')->nullable();
            $table->unsignedTinyInteger('diary_status_id');
            $table->time('start_time');
            $table->time('finish_time');
            $table->date('start_date');
            $table->date('finish_date');
            $table->integer('interval');
            $table->boolean('attends_teleconsultation')->nullable();
            $table->timestamps();


            $table->index('assistance_id');
            $table->index('office_id');
            $table->index('diary_status_id');


            $table->foreign('assistance_id')->references('id')
                ->on('assistance');
            $table->foreign('office_id')->references('id')
                ->on('bed');
            $table->foreign('diary_status_id')->references('id')
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
        Schema::dropIfExists('medical_diary');
    }
}
