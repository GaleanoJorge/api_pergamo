<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChEReflectionFTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_e_reflection_f_t', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->string('family_base');
            /////////////////////////////////////////
            $table->string('bicipital');
            $table->string('radial');
            $table->string('triceps');
            $table->string('patellar');
            $table->string('aquilano');
            $table->string('reflexes');
            $table->longText('observation')->nullable();
            
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
        Schema::dropIfExists('ch_e_reflection_f_t');
    }
}










