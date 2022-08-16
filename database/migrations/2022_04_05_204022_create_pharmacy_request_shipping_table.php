
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyRequestShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_request_shipping', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount')->nullable();
            $table->integer('amount_damaged')->nullable();
            $table->integer('amount_provition')->nullable();
            $table->integer('amount_operation')->nullable();
            $table->unsignedBigInteger('user_responsible_id')->nullable();
            $table->unsignedBigInteger('pharmacy_product_request_id');
            $table->unsignedBigInteger('pharmacy_lot_stock_id');
            $table->timestamps();

            $table->index('user_responsible_id');
            $table->foreign('user_responsible_id')->references('id')
                ->on('users');

            $table->index('pharmacy_lot_stock_id');
            $table->foreign('pharmacy_lot_stock_id')->references('id')
                ->on('pharmacy_lot_stock');

            $table->index('pharmacy_product_request_id');
            $table->foreign('pharmacy_product_request_id')->references('id')
                ->on('pharmacy_product_request');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmacy_request_shipping');
    }
}
