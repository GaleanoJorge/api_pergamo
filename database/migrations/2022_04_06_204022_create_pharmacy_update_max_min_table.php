
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyUpdateMaxMinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_update_max_min', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pharmacy_lot_stock_id');
            $table->unsignedBigInteger('own_pharmacy_stock_id');
            $table->unsignedBigInteger('request_pharmacy_stock_id');
            $table->timestamps();

            $table->index('own_pharmacy_stock_id');
            $table->foreign('own_pharmacy_stock_id')->references('id')
                ->on('pharmacy_stock');

            $table->index('request_pharmacy_stock_id');
            $table->foreign('request_pharmacy_stock_id')->references('id')
                ->on('pharmacy_stock');

            $table->index('pharmacy_lot_stock_id');
            $table->foreign('pharmacy_lot_stock_id')->references('id')
                ->on('pharmacy_lot_stock');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmacy_update_max_min');
    }
}
