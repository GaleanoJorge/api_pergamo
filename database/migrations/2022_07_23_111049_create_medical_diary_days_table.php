<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalDiaryDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_diary_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('days_id');
            $table->unsignedBigInteger('medical_diary_id');
            $table->unsignedBigInteger('medical_status_id');
            $table->unsignedBigInteger('eps_id')->nullable();
            $table->unsignedBigInteger('contract_id')->nullable();
            $table->unsignedBigInteger('briefcase_id')->nullable();
            $table->unsignedBigInteger('services_briefcase_id')->nullable();
            // $table->unsignedBigInteger('procedure_id')->nullable();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->unsignedBigInteger('admissions_id')->nullable();
            $table->longText('observations')->nullable();
            $table->unsignedBigInteger('reason_cancel_id')->nullable();
            $table->string('cancel_description')->nullable();
            
            $table->dateTime('start_hour');
            $table->dateTime('finish_hour');
            $table->tinyInteger('is_telemedicine')->nullable();
            $table->longText('url_teams')->nullable();
            $table->timestamps();

            $table->index('days_id');
            $table->index('medical_diary_id');
            $table->index('eps_id');
            $table->index('medical_status_id');
            $table->index('contract_id');
            $table->index('briefcase_id');
            $table->index('services_briefcase_id');
            // $table->index('procedure_id');


            $table->foreign('days_id')->references('id')
                ->on('days');
            $table->foreign('medical_diary_id')->references('id')
                ->on('medical_diary');
            $table->foreign('medical_status_id')->references('id')
                ->on('medical_status');
            $table->foreign('eps_id')->references('id')
                ->on('company');
            $table->foreign('contract_id')->references('id')
                ->on('contract');
            $table->foreign('briefcase_id')->references('id')
                ->on('briefcase');
            $table->foreign('services_briefcase_id')->references('id')
                ->on('services_briefcase');
            // $table->foreign('procedure_id')->references('id')
            //     ->on('procedure');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_diary_days');
    }
}
