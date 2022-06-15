<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSuppliesComTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_supplies_com', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('factory_id');
            $table->unsignedBigInteger('product_supplies_id');
            $table->string('invima_registration');
            $table->unsignedBigInteger('invima_status_id');
            $table->unsignedBigInteger('sanitary_registration_id');
            $table->unsignedBigInteger('packing_id');
            $table->string('unit_packing');
            $table->string('code_cum_file');
            $table->Integer('code_cum_consecutive');
            $table->string('useful_life');
            $table->date('date_cum');
            $table->timestamps();

            $table->index('packing_id');
            $table->foreign('packing_id')->references('id')
                ->on('packing');

            $table->index('factory_id');
            $table->foreign('factory_id')->references('id')
                ->on('factory');
            $table->index('product_supplies_id');
            $table->foreign('product_supplies_id')->references('id')
                ->on('product_supplies');
            $table->index('invima_status_id');
            $table->foreign('invima_status_id')->references('id')
                ->on('invima_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_supplies_com');
    }
}
