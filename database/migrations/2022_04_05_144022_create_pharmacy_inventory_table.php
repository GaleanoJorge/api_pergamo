
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_inventory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('actual_amount');
            $table->unsignedBigInteger('pharmacy_stock_id');
            $table->unsignedBigInteger('pharmacy_lot_id');
            $table->timestamps();

            $table->index('pharmacy_stock_id');
            $table->foreign('pharmacy_stock_id')->references('id')
                ->on('pharmacy_stock');

            $table->index('pharmacy_lot_id');
            $table->foreign('pharmacy_lot_id')->references('id')
                ->on('pharmacy_lot');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmacy_inventory');
    }
}
