<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlossServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gloss_service', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('status_id');
            $table->string('name');
            $table->unsignedBigInteger('gloss_ambit_id');
            $table->timestamps();
            $table->index('status_id');
            $table->foreign('status_id')->references('id')
                    ->on('status');
            $table->index('gloss_ambit_id');
            $table->foreign('gloss_ambit_id')->references('id')
                    ->on('gloss_ambit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gloss_service');
    }
}
