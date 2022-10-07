<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChEFlexibilityFTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_e_flexibility_f_t', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->string('family_base');
            /////////////////////////////////////////
            $table->string('head');
            $table->string('trunk');
            $table->string('sup_right');
            $table->string('sup_left');
            $table->string('inf_right');
            $table->string('inf_left');
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
        Schema::dropIfExists('ch_e_flexibility_f_t');
    }
}










