<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChSwOccupationalHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_sw_occupational_history', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('worked');
            $table->string('study');
            $table->string('home');
            $table->string('none');
            $table->unsignedBigInteger('ch_sw_occupation_id');
            $table->unsignedBigInteger('ch_sw_seniority_id')->nullable();
            $table->unsignedBigInteger('ch_sw_hours_id')->nullable();
            $table->unsignedBigInteger('ch_sw_turn_id')->nullable();
            $table->longText('observations')->nullable()->nullable();
            
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');

            $table->timestamps();

            $table->index('ch_sw_occupation_id');
            $table->foreign('ch_sw_occupation_id')->references('id')
                ->on('ch_sw_occupation');

            $table->index('ch_sw_seniority_id');
            $table->foreign('ch_sw_seniority_id')->references('id')
                ->on('ch_sw_seniority');

            $table->index('ch_sw_hours_id');
            $table->foreign('ch_sw_hours_id')->references('id')
                ->on('ch_sw_hours');

            $table->index('ch_sw_turn_id');
            $table->foreign('ch_sw_turn_id')->references('id')
                ->on('ch_sw_turn');

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
        Schema::dropIfExists('ch_sw_occupational_history');
    }
}
