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
            $table->unsignedBigInteger('product_generic_id');
            $table->unsignedBigInteger('administration_route_id');
            $table->unsignedBigInteger('hourly_frequency_id');
            $table->string('medical_formula');
            $table->Integer('treatment_days');
            $table->string('outpatient_formulation')->nullable();
            $table->string('dose');
            $table->string('observation');
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

            $table->index('product_generic_id');
            $table->foreign('product_generic_id') ->references('id')
                ->on('product_generic');

            $table->index('administration_route_id');
            $table->foreign('administration_route_id')->references('id')
                ->on('administration_route');

            $table->index('hourly_frequency_id');
            $table->foreign('hourly_frequency_id')->references('id')
                ->on('hourly_frequency');

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
        Schema::dropIfExists('ch_formulation');
    }
}
