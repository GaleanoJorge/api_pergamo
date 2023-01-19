<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateChSwArmedConflictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_sw_armed_conflict', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('victim');
            $table->string('victim_time')->nullable();
            $table->string('subsidies');
            $table->longText('detail_subsidies')->nullable();
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->unsignedBigInteger('population_group_id')->nullable();
            $table->unsignedTinyInteger('ethnicity_id')->nullable();

            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');

            $table->timestamps();

           
            $table->index('municipality_id');
            $table->foreign('municipality_id')->references('id')
                ->on('municipality');

            $table->index('population_group_id');
            $table->foreign('population_group_id')->references('id')
                ->on('population_group');

            $table->index('ethnicity_id');
            $table->foreign('ethnicity_id')->references('id')
                ->on('ethnicity');        
            
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
        Schema::dropIfExists('ch_sw_armed_conflict');
    }
}
