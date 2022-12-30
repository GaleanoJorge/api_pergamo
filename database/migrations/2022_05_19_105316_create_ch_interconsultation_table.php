<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChInterconsultationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_interconsultation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ambulatory_medical_order')->nullable();
            $table->unsignedTinyInteger('type_of_attention_id')->nullable();
            $table->unsignedBigInteger('specialty_id')->nullable();
            $table->integer('amount')->nullable();
            $table->unsignedTinyInteger('frequency_id')->nullable();
            $table->string('observations')->nullable();
            $table->unsignedBigInteger('type_record_id')->nullable();
            $table->unsignedBigInteger('ch_record_id')->nullable();

            $table->unsignedBigInteger('services_briefcase_id')->nullable();
            $table->unsignedBigInteger('admissions_id')->nullable();

            $table->timestamps();

            $table->index('type_of_attention_id');
            $table->foreign('type_of_attention_id')->references('id')
                ->on('type_of_attention');

            $table->index('admissions_id');
            $table->foreign('admissions_id')->references('id')
                ->on('admissions');

            $table->index('services_briefcase_id');
            $table->foreign('services_briefcase_id')->references('id')
                ->on('services_briefcase');

            $table->index('specialty_id');
            $table->foreign('specialty_id')->references('id')
                ->on('specialty');

            $table->index('frequency_id');
            $table->foreign('frequency_id')->references('id')
                ->on('frequency');

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
        Schema::dropIfExists('ch_interconsultation');
    }
}
