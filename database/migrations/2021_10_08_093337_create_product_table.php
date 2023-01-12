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
            $table->string('name');
            $table->unsignedBigInteger('factory_id');
            $table->unsignedBigInteger('product_generic_id');
            $table->string('invima_registration');
            $table->unsignedBigInteger('invima_status_id');
            $table->unsignedBigInteger('sanitary_registration_id');
            $table->unsignedBigInteger('storage_conditions_id');
            $table->unsignedBigInteger('packing_id');
            $table->string('code_cum_file');
            $table->Integer('code_cum_consecutive');
            $table->Integer('regulated_drug');
            $table->Integer('high_price')->nullable();
            $table->string('maximum_dose')->nullable();
            $table->string('indications')->nullable();
            $table->string('contraindications')->nullable();
            $table->string('applications')->nullable()  ;
            $table->string('value_circular')->nullable();
            $table->string('circular')->nullable();
            $table->string('unit_packing')->nullable();
            $table->Integer('refrigeration');
            $table->string('useful_life')->nullable();
            $table->string('code_cum');
            $table->date('date_cum');
            $table->timestamps();

            $table->index('packing_id');
            $table->foreign('packing_id')->references('id')
                ->on('packing');

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
