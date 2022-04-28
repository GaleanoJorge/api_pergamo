
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pharmacy_stock_id');
            $table->unsignedBigInteger('pharmacy_inventory_id');
            $table->unsignedBigInteger('pharmacy_product_request_id');
            $table->timestamps();

            $table->index('pharmacy_stock_id');
            $table->foreign('pharmacy_stock_id')->references('id')
                ->on('pharmacy_stock');

            $table->index('pharmacy_inventory_id');
            $table->foreign('pharmacy_inventory_id')->references('id')
                ->on('pharmacy_inventory');

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
        Schema::dropIfExists('pharmacy_request');
    }
}
