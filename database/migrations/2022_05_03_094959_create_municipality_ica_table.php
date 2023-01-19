<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalityIcaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipality_ica', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('value')->nullable();
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->Integer('year');
            $table->timestamps();

            $table->index('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipality_ica');
    }
}
