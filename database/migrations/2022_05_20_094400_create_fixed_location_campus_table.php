<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedLocationCampusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_location_campus', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('fixed_area_campus_id');
            $table->unsignedBigInteger('flat_id');
            $table->unsignedBigInteger('campus_id');
            $table->timestamps();

            $table->index('fixed_area_campus_id');
            $table->foreign('fixed_area_campus_id')->references('id')
                ->on('fixed_area_campus');

            $table->index('flat_id');
            $table->foreign('flat_id')->references('id')
                ->on('flat');

            $table->index('campus_id');
            $table->foreign('campus_id')->references('id')
                ->on('campus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixed_location_campus');
    }
}
