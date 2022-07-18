<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChEMSFunPatOTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_e_m_s_fun_pat_o_t', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('head_right');
            $table->string('head_left');
            $table->string('mouth_right');
            $table->string('mouth_left');
            $table->string('shoulder_right');
            $table->string('shoulder_left');
            $table->string('back_right');
            $table->string('back_left');
            $table->string('waist_right');
            $table->string('waist_left');
            $table->string('knee_right');
            $table->string('knee_left');
            $table->string('foot_right');
            $table->string('foot_left');
            
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
        Schema::dropIfExists('ch_e_m_s_fun_pat_o_t');
    }
}
