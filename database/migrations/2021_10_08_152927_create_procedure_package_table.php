<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedurePackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedure_package', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('value')->nullable();
            $table->unsignedBigInteger('procedure_package_id');
            $table->unsignedBigInteger('procedure_id')->nullable();
            $table->unsignedBigInteger('supplies_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('price_type_id')->nullable();
            $table->unsignedBigInteger('max_quantity')->nullable();
            $table->unsignedBigInteger('min_quantity')->nullable();
            $table->boolean('dynamic_charge')->nullable();
            $table->timestamps();

            $table->index('procedure_package_id');
            $table->foreign('procedure_package_id')->references('id')
                ->on('manual_price');

            $table->index('procedure_id');
            $table->foreign('procedure_id')->references('id')
                ->on('procedure');

            $table->index('supplies_id');
            $table->foreign('supplies_id')->references('id')
                ->on('product_supplies');

            $table->index('product_id');
            $table->foreign('product_id')->references('id')
                ->on('product_generic');

            $table->index('price_type_id');
            $table->foreign('price_type_id')->references('id')
                ->on('price_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedure_package');
    }
}
