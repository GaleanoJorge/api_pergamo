<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('amount'); 
            $table->string('amount_unit'); 
            $table->unsignedBigInteger('product_supplies_com_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('billing_id');
            $table->timestamps();

            $table->index('billing_id');
            $table->foreign('billing_id')->references('id')
            ->on('billing');

            $table->index('product_id');
            $table->foreign('product_id')->references('id')
                ->on('product');

            $table->index('product_supplies_com_id');
            $table->foreign('product_supplies_com_id')->references('id')
                ->on('product_supplies_com');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_stock');
    }
}
