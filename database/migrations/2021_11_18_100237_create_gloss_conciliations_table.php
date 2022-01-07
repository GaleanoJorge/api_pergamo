<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlossConciliationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gloss_conciliations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gloss_id');
            $table->string('conciliations_date');
            $table->string('observation');
            $table->unsignedBigInteger('user_id');
            $table->string('file');
            $table->timestamps();

            $table->index('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users');

            $table->index('gloss_id');
            $table->foreign('gloss_id')->references('id')
            ->on('gloss'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gloss_conciliations');
    }
}
