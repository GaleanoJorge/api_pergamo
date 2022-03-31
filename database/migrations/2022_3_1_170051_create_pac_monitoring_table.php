<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacMonitoringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pac_monitoring', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admissions_id');
            $table->date('application_date');
            $table->string('type_plan');
            $table->string('authorization_pin');
            $table->unsignedBigInteger('profesional_user_id');
            $table->unsignedBigInteger('diagnosis_id');
            $table->time('reception_hour');
            $table->time('presentation_hour');
            $table->time('acceptance_hour');
            $table->time('offer_hour');
            $table->time('start_consult_hour');
            $table->time('finish_consult_hour');
            $table->date('close_date');
            $table->time('close_crm_hour');
            $table->unsignedBigInteger('copay_value');
            $table->timestamps();

            $table->index('admissions_id');
            $table->foreign('admissions_id')->references('id')
                ->on('admissions');

            $table->index('profesional_user_id');
            $table->foreign('profesional_user_id')->references('id')
                ->on('users');

            $table->index('diagnosis_id');
            $table->foreign('diagnosis_id')->references('id')
                ->on('diagnosis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pac_monitoring');
    }
}
