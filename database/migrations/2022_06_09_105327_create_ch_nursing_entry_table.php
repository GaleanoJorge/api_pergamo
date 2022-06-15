<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChNursingEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_nursing_entry', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_position_id');
            $table->unsignedBigInteger('ostomy_id');
            $table->string('observation');
            $table->string('hair_revision');
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

            $table->index('patient_position_id');
            $table->foreign('patient_position_id')->references('id')
                ->on('patient_position');

            $table->index('ostomy_id');
            $table->foreign('ostomy_id')->references('id')
                ->on('ostomy');

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
        Schema::dropIfExists('ch_nursing_entry');
    }
}
