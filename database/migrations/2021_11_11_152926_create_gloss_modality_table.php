<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlossModalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gloss_modality', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('status_id');
            $table->index('status_id');
            $table->foreign('status_id')->references('id')
                    ->on('status');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gloss_modality');
    }
}
