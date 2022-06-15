<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChNotesDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_notes_description', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_position_id');
            $table->unsignedBigInteger('ostomy_id');
            $table->string('hair_revision');
            $table->boolean('has_oxigen');
            $table->unsignedBigInteger('oxygen_type_id')->nullable();
            $table->unsignedBigInteger('liters_per_minute_id')->nullable();
            $table->unsignedBigInteger('change_position_id');
            $table->string('patient_dry');
            $table->string('unit_arrangement');
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

            $table->index('patient_position_id');
            $table->foreign('patient_position_id')->references('id')
                ->on('patient_position');

            $table->index('ostomy_id');
            $table->foreign('ostomy_id')->references('id')
                ->on('ostomy');

            $table->index('liters_per_minute_id');
            $table->foreign('liters_per_minute_id')->references('id')
                ->on('oxygen_type');

            $table->index('oxygen_type_id');
            $table->foreign('oxygen_type_id')->references('id')
                ->on('oxygen_type');

            $table->index('change_position_id');
            $table->foreign('change_position_id')->references('id')
                ->on('patient_position');


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
        Schema::dropIfExists('ch_notes_description');
    }
}
