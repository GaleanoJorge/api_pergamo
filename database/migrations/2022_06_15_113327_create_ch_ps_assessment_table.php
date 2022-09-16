<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChPsAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_ps_assessment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('partner');
            $table->string('symptom');
            $table->bigInteger('ch_ps_episodes_id')->nullable();
            $table->bigInteger('episodes_number')->nullable();
            $table->bigInteger('area')->nullable();

            $table->index('ch_ps_episodes_id');
            $table->foreign('ch_ps_episodes_id')->references('id')
                ->on('ch_ps_episodes');

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
        Schema::dropIfExists('ch_ps_assessment');
    }
}
