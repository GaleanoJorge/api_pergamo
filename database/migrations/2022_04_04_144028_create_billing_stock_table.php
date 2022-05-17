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
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('billing_id');
            $table->timestamps();

            $table->index('billing_id');
            $table->foreign('billing_id')->references('id')
            ->on('billing');

            $table->index('product_id');
            $table->foreign('product_id')->references('id')
                ->on('product');
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
