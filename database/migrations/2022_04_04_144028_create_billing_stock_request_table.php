<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingStockRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_stock_request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('amount');  
            $table->unsignedBigInteger('product_supplies_id')->nullable();
            $table->unsignedBigInteger('product_generic_id')->nullable();
            $table->unsignedBigInteger('billing_id');
            $table->timestamps();

            $table->index('billing_id');
            $table->foreign('billing_id')->references('id')
            ->on('billing');

            $table->index('product_generic_id');
            $table->foreign('product_generic_id')->references('id')
                ->on('product_generic');

            $table->index('product_supplies_id');
            $table->foreign('product_supplies_id')->references('id')
                ->on('product_supplies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_stock_request');
    }
}
