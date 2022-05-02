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
            $table->string('enter_amount');
            $table->string('unit_value');
            $table->string('lot');
            $table->date('expiration_date');
            $table->unsignedBigInteger('billing_stock_id');
            $table->unsignedBigInteger('billing_id');
            $table->unsignedBigInteger('pharmacy_stock_id');
            $table->timestamps();

            $table->index('billing_stock_id');
            $table->foreign('billing_stock_id')->references('id')
                ->on('billing_stock');

            $table->index('billing_id');
            $table->foreign('billing_id')->references('id')
                ->on('billing');

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
