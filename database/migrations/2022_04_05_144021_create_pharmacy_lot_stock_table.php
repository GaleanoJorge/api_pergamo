<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyLotStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_lot_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lot');
            $table->string('amount_total');
            $table->string('sample');
            $table->string('actual_amount');
            $table->date('expiration_date');
            $table->unsignedBigInteger('pharmacy_lot_id');
            $table->unsignedBigInteger('billing_stock_id');
            $table->timestamps();

            $table->index('pharmacy_lot_id');
            $table->foreign('pharmacy_lot_id')->references('id')
                ->on('pharmacy_lot');

            $table->index('billing_stock_id');
            $table->foreign('billing_stock_id')->references('id')
                ->on('billing_stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmacy_lot_stock');
    }
}
