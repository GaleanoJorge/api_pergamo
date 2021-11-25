<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bed', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->unsignedBigInteger('status_bed_id');
            $table->Integer('bed_or_office');
            $table->unsignedBigInteger('pavilion_id');
            $table->timestamps();

            $table->index('status_bed_id');
            $table->foreign('status_bed_id')->references('id')
            ->on('status_bed');
            $table->index('pavilion_id');
            $table->foreign('pavilion_id')->references('id')
            ->on('pavilion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bed');
    }
}
