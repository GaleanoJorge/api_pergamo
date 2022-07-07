<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChEMSIntPatOTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_e_m_s_int_pat_o_t', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('up_right');
            $table->string('up_left');
            $table->string('side_right');
            $table->string('side_left');
            $table->string('backend_right');
            $table->string('backend_left');
            $table->string('frontend_right');
            $table->string('frontend_left');
            $table->string('down_right');
            $table->string('down_left');
            $table->string('full_hand_right');
            $table->string('full_hand_left');
            $table->string('cylindric_right');
            $table->string('cylindric_left');
            $table->string('hooking_right');
            $table->string('hooking_left');
            $table->string('fine_clamp_right');
            $table->string('fine_clamp_left');
            $table->string('tripod_right');
            $table->string('tripod_left');
            $table->string('opposition_right');
            $table->string('opposition_left');
            $table->string('coil_right');
            $table->string('coil_left');
            
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
        Schema::dropIfExists('ch_e_m_s_int_pat_o_t');
    }
}
