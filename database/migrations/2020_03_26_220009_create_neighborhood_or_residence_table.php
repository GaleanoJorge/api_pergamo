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
            $table->unsignedBigInteger('locality_id')->nullable();
            $table->unsignedBigInteger('pad_risk_id')->nullable();
            $table->timestamps();

            $table->index('locality_id');
            $table->foreign('locality_id')->references('id')
                ->on('locality');

            $table->index('pad_risk_id');
            $table->foreign('pad_risk_id')->references('id')
                ->on('pad_risk');
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
