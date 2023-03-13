<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChPatientExitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_patient_exit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('exit_status');
            $table->integer ('legal_medicine_transfer')->nullable();
            $table->string('date_time')->nullable();
            $table->unsignedBigInteger('death_diagnosis_id')->nullable();
            $table->string('medical_signature')->nullable();
            $table->string('death_certificate_number')->nullable();
            $table->unsignedBigInteger('ch_diagnosis_id')->nullable();
            $table->unsignedBigInteger('exit_diagnosis_id')->nullable();
            $table->unsignedBigInteger('relations_diagnosis_id')->nullable();
            $table->unsignedBigInteger('reason_exit_id')->nullable();
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

            $table->index('death_diagnosis_id');
            $table->foreign('death_diagnosis_id') ->references('id')
                ->on('diagnosis');

            $table->index('ch_diagnosis_id');
            $table->foreign('ch_diagnosis_id')->references('id')
                ->on('ch_diagnosis');

            $table->index('exit_diagnosis_id');
            $table->foreign('exit_diagnosis_id')->references('id')
                ->on('diagnosis');

            $table->index('relations_diagnosis_id');
            $table->foreign('relations_diagnosis_id')->references('id')
                ->on('diagnosis');

            $table->index('reason_exit_id');
            $table->foreign('reason_exit_id')->references('id')
                ->on('reason_exit');   


            $table->index('ch_record_id');
            $table->foreign('ch_record_id')->references('id')
                ->on('ch_record');
                
            $table->index('type_record_id');
            $table->foreign('type_record_id')->references('id')
                ->on('type_record');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ch_patient_exit');
    }
}
