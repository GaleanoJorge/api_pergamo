<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChMedicalOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_medical_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ambulatory_medical_order')->nullable();
            $table->unsignedBigInteger('procedure_id');
            $table->integer('amount');
            $table->unsignedBigInteger('hourly_frequency_id')->nullable();
            $table->string('observations');
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();
            
            $table->index('procedure_id');
            $table->foreign('procedure_id')->references('id')
                ->on('procedure');

            $table->index('hourly_frequency_id');
            $table->foreign('hourly_frequency_id')->references('id')
                ->on('hourly_frequency');

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
        Schema::dropIfExists('ch_medical_orders');
    }
}
