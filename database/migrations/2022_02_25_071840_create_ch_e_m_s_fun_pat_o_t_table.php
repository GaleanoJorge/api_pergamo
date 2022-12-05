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
            $table->string('head_right')->nullable();
            $table->string('head_left')->nullable();
            $table->string('mouth_right')->nullable();
            $table->string('mouth_left')->nullable();
            $table->string('shoulder_right')->nullable();
            $table->string('shoulder_left')->nullable();
            $table->string('back_right')->nullable();
            $table->string('back_left')->nullable();
            $table->string('waist_right')->nullable();
            $table->string('waist_left')->nullable();
            $table->string('knee_right')->nullable();
            $table->string('knee_left')->nullable();
            $table->string('foot_right')->nullable();
            $table->string('foot_left')->nullable();
            
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
