<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChFormulationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_formulation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_generic_id')->nullable();
            $table->unsignedBigInteger('services_briefcase_id')->nullable();
            $table->unsignedBigInteger('administration_route_id')->nullable();
            $table->unsignedBigInteger('hourly_frequency_id');
            $table->boolean('medical_formula')->nullable();
            $table->Integer('treatment_days');
            $table->string('outpatient_formulation')->nullable();
            $table->string('dose');
            $table->string('observation')->nullable();
            $table->Integer('number_mipres')->nullable();
            $table->unsignedBigInteger('pharmacy_product_request_id')->nullable();
            $table->unsignedBigInteger('management_plan_id')->nullable();
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

            $table->index('product_generic_id');
            $table->foreign('product_generic_id') ->references('id')
                ->on('product');

            $table->index('services_briefcase_id');
            $table->foreign('services_briefcase_id') ->references('id')
                    ->on('services_briefcase');

            $table->index('administration_route_id');
            $table->foreign('administration_route_id')->references('id')
                ->on('administration_route');

            $table->index('hourly_frequency_id');
            $table->foreign('hourly_frequency_id')->references('id')
                ->on('hourly_frequency');

            $table->index('pharmacy_product_request_id');
            $table->foreign('pharmacy_product_request_id')->references('id')
                ->on('pharmacy_product_request');

            $table->index('ch_record_id');
            $table->foreign('ch_record_id')->references('id')
                ->on('ch_record');
                
            $table->index('management_plan_id');
            $table->foreign('management_plan_id')->references('id')
                ->on('management_plan');
                
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
        Schema::dropIfExists('ch_formulation');
    }
}
