<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChSwOccupationalActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_sw_occupational_activities', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->unsignedBigInteger('ch_sw_occupational_history_id');
            $table->unsignedBigInteger('ch_sw_activity_id');
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
        Schema::dropIfExists('ch_sw_occupational_activities');
    }
}
