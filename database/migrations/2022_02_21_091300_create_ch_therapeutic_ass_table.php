<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChTherapeuticAssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_therapeutic_ass', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ch_ass_pattern_id');
            $table->unsignedBigInteger('ch_ass_swing_id');
            $table->unsignedBigInteger('ch_ass_frequency_id');
            $table->unsignedBigInteger('ch_ass_mode_id');
            $table->unsignedBigInteger('ch_ass_cough_id');
            $table->unsignedBigInteger('ch_ass_chest_type_id');
            $table->unsignedBigInteger('ch_ass_chest_symmetry_id');
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

            $table->index('ch_ass_pattern_id');
            $table->foreign('ch_ass_pattern_id')->references('id')
                ->on('ch_ass_pattern');

            $table->index('ch_ass_swing_id');
            $table->foreign('ch_ass_swing_id')->references('id')
                ->on('ch_ass_swing');

            $table->index('ch_ass_frequency_id');
            $table->foreign('ch_ass_frequency_id')->references('id')
                ->on('ch_ass_frequency');

            $table->index('ch_ass_mode_id');
            $table->foreign('ch_ass_mode_id')->references('id')
                ->on('ch_ass_mode');

            $table->index('ch_ass_cough_id');
            $table->foreign('ch_ass_cough_id')->references('id')
                ->on('ch_ass_cough');

            $table->index('ch_ass_chest_type_id');
            $table->foreign('ch_ass_chest_type_id')->references('id')
                ->on('ch_ass_chest_type');

            $table->index('ch_ass_chest_symmetry_id');
            $table->foreign('ch_ass_chest_symmetry_id')->references('id')
                ->on('ch_ass_chest_symmetry');

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
        Schema::dropIfExists('ch_therapeutic_ass');
    }
}
