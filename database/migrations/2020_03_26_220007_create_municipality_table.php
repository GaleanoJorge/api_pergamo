<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipality', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('region_id');
            $table->unsignedBigInteger('circuit_id')->nullable();
            $table->string('name');
            $table->integer('sga_origin_fk')->nullable();
            $table->timestamps();

            $table->index('region_id');
            $table->foreign('region_id')->references('id')->on('region');
            $table->index('circuit_id');
            $table->foreign('circuit_id')->references('id')->on('circuit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipality');
    }
}
