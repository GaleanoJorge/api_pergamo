<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->unsignedBigInteger('factory_id');
            $table->unsignedBigInteger('product_generic_id');
            $table->string('invima_registration');
            $table->unsignedBigInteger('invima_status_id');
            $table->unsignedBigInteger('sanitary_registration_id');
            $table->unsignedBigInteger('storage_conditions_id');
            $table->unsignedBigInteger('risk_id');
            $table->string('code_cum_file');
            $table->Integer('code_cum_consecutive');
            $table->Integer('regulated_drug');
            $table->Integer('high_price');
            $table->string('maximum_dose');
            $table->string('indications');
            $table->string('contraindications');
            $table->string('applications');
            $table->Integer('minimum_stock');
            $table->Integer('maximum_stock');
            $table->Integer('generate_iva');
            $table->date('date_cum');
            $table->timestamps();

            $table->index('factory_id');
            $table->foreign('factory_id')->references('id')
                ->on('factory');
            $table->index('product_generic_id');
            $table->foreign('product_generic_id')->references('id')
                ->on('product_generic');
            $table->index('invima_status_id');
            $table->foreign('invima_status_id')->references('id')
                ->on('invima_status');
            $table->index('storage_conditions_id');
            $table->foreign('storage_conditions_id')->references('id')
                ->on('storage_conditions');
            $table->index('risk_id');
            $table->foreign('risk_id')->references('id')
                ->on('risk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
