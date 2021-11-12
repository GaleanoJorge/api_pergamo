<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_data_firstname');
            $table->string('patient_data_middlefirstname')->nullable();
            $table->string('patient_data_lastname');
            $table->string('patient_data_middlelastname')->nullable();
            $table->string('patient_data_identification',100)->nullable();
            $table->bigInteger('patient_data_phone')->nullable();
            $table->string('patient_data_email')->nullable();
            $table->string('patient_data_residence_address');
            $table->unsignedTinyInteger('identification_type_id')->nullable();
            $table->unsignedBigInteger('affiliate_type_id');
            $table->unsignedBigInteger('special_attention_id');
            $table->timestamps();

            $table->index('identification_type_id');
            $table->foreign('identification_type_id')->references('id')
                ->on('identification_type');
            $table->index('affiliate_type_id');
            $table->foreign('affiliate_type_id')->references('id')
                ->on('affiliate_type');
            $table->index('special_attention_id');
            $table->foreign('special_attention_id')->references('id')
                ->on('special_attention');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_data');
    }
}
