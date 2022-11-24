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
            $table->string('scroll_right')->nullable();
            $table->string('scroll_left')->nullable();
            $table->string('get_up_right')->nullable();
            $table->string('get_up_left')->nullable();
            $table->string('push_right')->nullable();
            $table->string('push_left')->nullable();
            $table->string('pull_right')->nullable();
            $table->string('pull_left')->nullable();
            $table->string('transport_right')->nullable();
            $table->string('transport_left')->nullable();
            $table->string('attain_right')->nullable();
            $table->string('attain_left')->nullable();
            $table->string('bipedal_posture_right')->nullable();
            $table->string('bipedal_posture_left')->nullable();
            $table->string('sitting_posture_right')->nullable();
            $table->string('sitting_posture_left')->nullable();
            $table->string('squat_posture_right')->nullable();
            $table->string('squat_posture_left')->nullable();
            $table->string('use_both_hands_right')->nullable();
            $table->string('use_both_hands_left')->nullable();
            $table->string('alternating_movements_right')->nullable();
            $table->string('alternating_movements_left')->nullable();
            $table->string('dissociated_movements_right')->nullable();
            $table->string('dissociated_movements_left')->nullable();
            $table->string('Simultaneous_movements_right')->nullable();
            $table->string('Simultaneous_movements_left')->nullable();
            $table->string('bimanual_coordination_right')->nullable();
            $table->string('bimanual_coordination_left')->nullable();
            $table->string('hand_eye_coordination_right')->nullable();
            $table->string('hand_eye_coordination_left')->nullable();
            $table->string('hand_foot_coordination_right')->nullable();
            $table->string('hand_foot_coordination_left')->nullable();
            
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
