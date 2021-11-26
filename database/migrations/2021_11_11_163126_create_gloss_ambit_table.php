<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlossAmbitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gloss_ambit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('status_id');
            $table->string('name');
            $table->unsignedBigInteger('gloss_modality_id');
            $table->timestamps();
            $table->index('status_id');
            $table->foreign('status_id')->references('id')
                    ->on('status');
            $table->index('gloss_modality_id');
            $table->foreign('gloss_modality_id')->references('id')
                    ->on('gloss_modality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gloss_ambit');
    }
}
