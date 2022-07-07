<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChEMSMovPatOTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_e_m_s_mov_pat_o_t', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('scroll_right');
            $table->string('scroll_left');
            $table->string('get_up_right');
            $table->string('get_up_left');
            $table->string('push_right');
            $table->string('push_left');
            $table->string('pull_right');
            $table->string('pull_left');
            $table->string('transport_right');
            $table->string('transport_left');
            $table->string('attain_right');
            $table->string('attain_left');
            $table->string('bipedal_posture_right');
            $table->string('bipedal_posture_left');
            $table->string('sitting_posture_right');
            $table->string('sitting_posture_left');
            $table->string('squat_posture_right');
            $table->string('squat_posture_left');
            $table->string('use_both_hands_right');
            $table->string('use_both_hands_left');
            $table->string('alternating_movements_right');
            $table->string('alternating_movements_left');
            $table->string('dissociated_movements_right');
            $table->string('dissociated_movements_left');
            $table->string('Simultaneous_movements_right');
            $table->string('Simultaneous_movements_left');
            $table->string('bimanual_coordination_right');
            $table->string('bimanual_coordination_left');
            $table->string('hand_eye_coordination_right');
            $table->string('hand_eye_coordination_left');
            $table->string('hand_foot_coordination_right');
            $table->string('hand_foot_coordination_left');
            
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
        Schema::dropIfExists('ch_e_m_s_mov_pat_o_t');
    }
}
