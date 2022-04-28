<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseLocationCapacityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_location_capacity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone_consult')->nullable();
            $table->unsignedBigInteger('assistance_id');
            $table->unsignedBigInteger('locality_id')->nullable();
            $table->unsignedBigInteger('PAD_base_patient_quantity')->nullable();
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
        Schema::dropIfExists('base_location_capacity');
    }
}
