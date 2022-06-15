<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTherapeuticGoalsTlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('therapeutic_goals_tl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hold_phonoarticulators')->nullable();
            $table->string('strengthen_phonoarticulators')->nullable();
            $table->string('strengthen_tone')->nullable();
            $table->string('favor_process')->nullable();
            $table->string('strengthen_thread')->nullable();
            $table->string('favor_psycholinguistic')->nullable();
            $table->string('increase_processes')->nullable();
            $table->string('strengthen_qualities')->nullable();
            $table->string('strengthen_communication')->nullable();
            $table->string('improve_skills')->nullable();
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
        Schema::dropIfExists('therapeutic_goals_tl');
    }
}
