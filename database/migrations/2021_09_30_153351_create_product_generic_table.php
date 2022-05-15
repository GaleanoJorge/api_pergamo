<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductGenericTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_generic', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger ('drug_concentration_id');
            $table->unsignedBigInteger ('measurement_units_id');
            $table->unsignedBigInteger ('product_presentation_id');
            $table->string ('description');
            $table->unsignedBigInteger('pbs_type_id');
            $table->string('pbs_restriction')->nullable();
            $table->unsignedBigInteger('product_subcategory_id'); 
            $table->Integer('minimum_stock');
            $table->Integer('maximum_stock');
            $table->unsignedBigInteger('administration_route_id')->nullable();
            $table->Integer ('special_controller_medicine')->nullable();
            $table->string ('code_atc')->nullable();
            $table->Integer ('implantable')->nullable();
            $table->Integer ('reuse')->nullable();
            $table->Integer ('invasive')->nullable();
            $table->Integer ('consignment')->nullable();
            $table->unsignedBigInteger('product_dose_id');
            $table->string('dose')->nullable();
            $table->timestamps();


            $table->index('drug_concentration_id');
            $table->foreign('drug_concentration_id')->references('id')
                    ->on('product_concentration');
            $table->index('measurement_units_id');
            $table->foreign('measurement_units_id')->references('id')
                    ->on('measurement_units');
            $table->index('product_presentation_id');
            $table->foreign('product_presentation_id')->references('id')
                    ->on('product_presentation');
            $table->index('product_subcategory_id');
            $table->foreign('product_subcategory_id')->references('id')
                    ->on('product_subcategory');

            $table->index('product_dose_id');
            $table->foreign('product_dose_id')->references('id')
                ->on('product_dose');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_generic');
    }
}
