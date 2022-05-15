<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyLotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_lot', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subtotal');
            $table->string('vat');
            $table->string('total');
            $table->date('receipt_date');
            $table->unsignedBigInteger('pharmacy_stock_id');
            $table->timestamps();

            $table->index('pharmacy_stock_id');
            $table->foreign('pharmacy_stock_id')->references('id')
                ->on('pharmacy_stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmacy_lot');
    }
}