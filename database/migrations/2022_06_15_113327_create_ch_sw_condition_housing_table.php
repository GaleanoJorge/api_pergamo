<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateChSwConditionHousingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_sw_condition_housing', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('water')->nullable();
            $table->string('light')->nullable();
            $table->string('telephone')->nullable();
            $table->string('sewerage')->nullable();
            $table->string('gas')->nullable();
            $table->Integer('num_rooms');
            $table->Integer('persons_rooms');
            $table->string('rooms')->nullable();
            $table->string('living_room')->nullable();
            $table->string('dinning_room')->nullable();
            $table->string('kitchen')->nullable();
            $table->string('bath')->nullable();
            
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
        Schema::dropIfExists('ch_sw_condition_housing');
    }
}
