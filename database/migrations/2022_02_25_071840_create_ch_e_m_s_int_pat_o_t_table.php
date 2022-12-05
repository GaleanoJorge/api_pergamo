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
            $table->string('up_right')->nullable();
            $table->string('up_left')->nullable();
            $table->string('side_right')->nullable();
            $table->string('side_left')->nullable();
            $table->string('backend_right')->nullable();
            $table->string('backend_left')->nullable();
            $table->string('frontend_right')->nullable();
            $table->string('frontend_left')->nullable();
            $table->string('down_right')->nullable();
            $table->string('down_left')->nullable();
            $table->string('full_hand_right')->nullable();
            $table->string('full_hand_left')->nullable();
            $table->string('cylindric_right')->nullable();
            $table->string('cylindric_left')->nullable();
            $table->string('hooking_right')->nullable();
            $table->string('hooking_left')->nullable();
            $table->string('fine_clamp_right')->nullable();
            $table->string('fine_clamp_left')->nullable();
            $table->string('tripod_right')->nullable();
            $table->string('tripod_left')->nullable();
            $table->string('opposition_right')->nullable();
            $table->string('opposition_left')->nullable();
            $table->string('coil_right')->nullable();
            $table->string('coil_left')->nullable();
            
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
