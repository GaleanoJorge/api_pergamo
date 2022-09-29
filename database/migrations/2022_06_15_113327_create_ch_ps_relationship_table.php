<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChPsRelationshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_ps_relationship', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('position');
            $table->string('self_care');
            $table->string('visual');
            $table->string('verbal');
            $table->string('appearance');
            $table->string('att_observations');
            $table->string('aw_observations');
            $table->string('sl_observations');
            $table->string('sex_observations');
            $table->string('fee_observations');
            $table->string('ex_observations');
                   

            $table->string('attitude');
            $table->unsignedBigInteger('ch_ps_awareness_id');
            $table->unsignedBigInteger('ch_ps_sleep_id');
            $table->string('exam_others');
            $table->string('sexuality');
            $table->string('feeding');
            $table->string('excretion');
        
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');

            $table->timestamps();

            $table->index('ch_ps_awareness_id');
            $table->foreign('ch_ps_awareness_id')->references('id')
                ->on('ch_ps_awareness');

            $table->index('ch_ps_sleep_id');
            $table->foreign('ch_ps_sleep_id')->references('id')
                ->on('ch_ps_sleep');
           
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
        Schema::dropIfExists('ch_ps_relationship');
    }
}
