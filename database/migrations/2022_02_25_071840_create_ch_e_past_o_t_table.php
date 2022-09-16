<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChEPastOTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_e_past_o_t', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->string('family_base');
            /////////////////////////////////////////
            $table->string('mother');
            $table->string('dad');
            $table->string('spouse');
            $table->string('sons');
            $table->string('uncles');
            $table->string('grandparents');
            $table->string('others');

            /////////////////////////////////////////
            $table->string('number_childrens');
            $table->string('observation_family_struct')->nullable();
            $table->string('academy');
            $table->string('level_academy');
            $table->string('observation_schooling_training')->nullable();
            $table->string('terapy');
            $table->string('observation_terapy')->nullable();
            $table->string('smoke');
            $table->string('f_smoke')->nullable();
            $table->string('alcohol');
            $table->string('f_alcohol')->nullable();
            $table->string('sport');
            $table->string('f_sport')->nullable();
            $table->string('sport_practice_observation')->nullable();
            $table->string('observation')->nullable();
            
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

            $table->index('type_record_id');
            $table->foreign('type_record_id')->references('id')
                ->on('type_record');

            $table->index('ch_record_id');
            $table->foreign('ch_record_id')->references('id')
                ->on('ch_record');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ch_e_past_o_t');
    }
}
