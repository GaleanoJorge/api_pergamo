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
            $table->string('clock');
            $table->integer('cardiac_frequency');
            $table->integer('respiratory_frequency');
            $table->string('temperature');
            $table->integer('oxigen_saturation');
            $table->integer('intracranial_pressure')->nullable();
            $table->integer('cerebral_perfusion_pressure')->nullable();
            $table->integer('intra_abdominal')->nullable();
            $table->integer('pressure_systolic');
            $table->integer('pressure_diastolic');
            $table->integer('pressure_half');
            $table->integer('pulse')->nullable();
            $table->integer('venous_pressure')->nullable();
            $table->string('size');
            $table->string('weight');
            $table->integer('glucometry')->nullable();
            $table->string('body_mass_index'); //i.m.c
            $table->integer('pulmonary_systolic')->nullable();
            $table->integer('pulmonary_diastolic')->nullable();
            $table->integer('pulmonary_half')->nullable();
            $table->integer('head_circunference')->nullable();
            $table->integer('abdominal_perimeter')->nullable();
            $table->integer('chest_perimeter')->nullable();
            $table->string('right_reaction')->nullable();
            $table->string('pupil_size_right')->nullable();
            $table->string('left_reaction')->nullable();
            $table->string('pupil_size_left')->nullable(); 
            $table->string('mydriatic')->nullable();
            $table->string('normal')->nullable();
            $table->string('lazy_reaction_light')->nullable();
            $table->string('fixed_lazy_reaction')->nullable();
            $table->string('miotic_size')->nullable();
            $table->string('observations_glucometry')->nullable();
            $table->string('observations_vital_ventilated')->nullable();
            $table->string('observations_parameters_signs')->nullable();
            $table->boolean('has_oxigen');
            $table->unsignedBigInteger('ch_vital_hydration_id')->nullable();
            $table->unsignedBigInteger('ch_vital_ventilated_id')->nullable();
            $table->unsignedBigInteger('ch_vital_temperature_id');
            $table->unsignedBigInteger('ch_vital_neurological_id')->nullable();
            $table->unsignedBigInteger('oxygen_type_id')->nullable();
            $table->unsignedBigInteger('liters_per_minute_id')->nullable();
            $table->unsignedBigInteger('parameters_signs_id')->nullable();
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();


            $table->index('type_record_id');
            $table->foreign('type_record_id')->references('id')
                ->on('type_record');
            $table->index('ch_record_id');
            $table->foreign('ch_record_id')->references('id')
                ->on('ch_record');



            $table->index('ch_vital_hydration_id');
            $table->foreign('ch_vital_hydration_id')->references('id')
                ->on('ch_vital_hydration');


            $table->index('ch_vital_ventilated_id');
            $table->foreign('ch_vital_ventilated_id')->references('id')
                ->on('ch_vital_ventilated');


            $table->index('ch_vital_temperature_id');
            $table->foreign('ch_vital_temperature_id')->references('id')
                ->on('ch_vital_temperature');

            $table->index('ch_vital_neurological_id');
            $table->foreign('ch_vital_neurological_id')->references('id')
                ->on('ch_vital_neurological');
                
            $table->index('oxygen_type_id');
            $table->foreign('oxygen_type_id')->references('id')
                ->on('oxygen_type');

            $table->index('liters_per_minute_id');
            $table->foreign('liters_per_minute_id')->references('id')
                ->on('liters_per_minute');
            
            $table->index('parameters_signs_id');
            $table->foreign('parameters_signs_id')->references('id')
                ->on('parameters_signs');
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
