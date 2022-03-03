<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeighborhoodOrResidenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neighborhood_or_residence', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('municipality_id');
            $table->unsignedBigInteger('locality_id')->nullable();
            $table->timestamps();

            $table->index('municipality_id');
            $table->foreign('municipality_id')->references('id')
                ->on('municipality');

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
        Schema::dropIfExists('neighborhood_or_residence');
    }
}