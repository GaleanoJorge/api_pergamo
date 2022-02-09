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
            $table->unsignedBigInteger('admissions_id');
            $table->string('patient_data_type');
            $table->string('firstname');
            $table->string('middlefirstname')->nullable();
            $table->string('lastname');
            $table->string('middlelastname')->nullable();
            $table->unsignedTinyInteger('identification_type_id')->nullable();
            $table->string('identification',100)->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('residence_address');
            $table->unsignedBigInteger('affiliate_type_id');
            $table->unsignedBigInteger('special_attention_id');
            $table->unsignedBigInteger('relationship_id');
            $table->timestamps();


            $table->index('admissions_id');
            $table->foreign('admissions_id')->references('id')
                ->on('admissions');

            $table->index('identification_type_id');
            $table->foreign('identification_type_id')->references('id')
                ->on('identification_type');
            
            $table->index('affiliate_type_id');
            $table->foreign('affiliate_type_id')->references('id')
                ->on('affiliate_type');
            
            $table->index('special_attention_id');
            $table->foreign('special_attention_id')->references('id')
                ->on('special_attention');

            $table->index('relationship_id');
            $table->foreign('relationship_id')->references('id')
                ->on('relationship');
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
