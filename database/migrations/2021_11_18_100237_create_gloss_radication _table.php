<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlossRadicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gloss_radication', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gloss_response_id');
            $table->string('radication_date');
            $table->string('observation');
            $table->string('file');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users');

            $table->index('gloss_response_id');
            $table->foreign('gloss_response_id')->references('id')
            ->on('gloss_response'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gloss_radication');
    }
}
