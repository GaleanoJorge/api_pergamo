<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChVitalSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_vital_signs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cardiac_frequency');
            $table->integer('respiratory_frequency');
            $table->string('temperature');
            $table->integer('oxigen_saturation');
            $table->integer('intracranial_pressure');
            $table->integer('cerebral_perfusion_pressure');
            $table->integer('intra_abdominal');
            $table->integer('pressure_systolic');
            $table->integer('pressure_diastolic');
            $table->integer('pressure_half');
            $table->integer('pulse');
            $table->integer('venous_pressure');
            $table->string('size');
            $table->string('weight');
            $table->integer('glucometry');
            $table->string('body_mass_index'); //i.m.c
            $table->integer('pulmonary_systolic');
            $table->integer('pulmonary_diastolic');
            $table->integer('pulmonary_half');
            $table->integer('head_circunference');
            $table->integer('abdominal_perimeter');
            $table->integer('chest_perimeter');
            $table->string('fetal_heart_rate');
            $table->string('right_reaction');
            $table->string('pupil_size_right');
            $table->string('left_reaction');
            $table->string('pupil_size_left');
            $table->string('glomerular_filtration_rate'); //tfc
            $table->string('cardiovascular_risk'); //tfc
            $table->unsignedBigInteger('vital_hydration_id');
            $table->unsignedBigInteger('vital_ventilated_id');
            $table->unsignedBigInteger('vital_temperature_id');
            $table->unsignedBigInteger('vital_neurological_id');
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();


            $table->index('type_record_id');
            $table->foreign('type_record_id')->references('id')
                ->on('type_record');
            $table->index('ch_record_id');
            $table->foreign('ch_record_id')->references('id')
                ->on('ch_record');



            $table->index('vital_hydration_id');
            $table->foreign('vital_hydration_id')->references('id')
                ->on('ch_vital_hydration');


            $table->index('vital_ventilated_id');
            $table->foreign('vital_ventilated_id')->references('id')
                ->on('ch_vital_ventilated');


            $table->index('vital_temperature_id');
            $table->foreign('vital_temperature_id')->references('id')
                ->on('ch_vital_temperature');

            $table->index('vital_neurological_id');
            $table->foreign('vital_neurological_id')->references('id')
                ->on('ch_vital_neurological');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ch_vital_signs');
    }
}
