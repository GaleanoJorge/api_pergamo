<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('consecutive');
            $table->unsignedBigInteger('campus_id');
            $table->unsignedBigInteger('contract_id');
            $table->unsignedBigInteger('diagnosis_id');
            $table->unsignedBigInteger('regime_id');
            $table->unsignedBigInteger('briefcase_id');
            $table->unsignedBigInteger('user_medical_id')->nullable();
            $table->dateTime('entry_date');
            $table->dateTime('discharge_date');
            $table->dateTime('medical_date');
            $table->unsignedBigInteger('patient_id');


            $table->timestamps();

            $table->index('campus_id');
            $table->foreign('campus_id')->references('id')
                ->on('campus');

            $table->index('user_medical_id');
            $table->foreign('user_medical_id')->references('id')
                ->on('users');

            $table->index('regime_id');
            $table->foreign('regime_id')->references('id')
                ->on('type_briefcase');

            $table->index('patient_id');
            $table->foreign('patient_id')->references('id')
                ->on('patients');

            $table->index('contract_id');
            $table->foreign('contract_id')->references('id')
                ->on('contract');

            $table->index('diagnosis_id');
            $table->foreign('diagnosis_id')->references('id')
                ->on('diagnosis');

            $table->index('briefcase_id');
            $table->foreign('briefcase_id')->references('id')
                ->on('briefcase');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admissions');
    }
}
