<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationCapacityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_capacity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('assistance_id');
            $table->unsignedBigInteger('locality_id');
            $table->date('validation_date');
            $table->unsignedBigInteger('PAD_patient_quantity')->nullable();
            $table->unsignedBigInteger('PAD_patient_actual_capacity')->nullable();
            $table->unsignedBigInteger('PAD_patient_attended')->nullable();
            $table->timestamps();


            $table->index('assistance_id');
            $table->foreign('assistance_id')->references('id')
                ->on('assistance');
            $table->index('locality_id');
            $table->foreign('locality_id')->references('id')
                ->on('locality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_capacity');
    }
}
