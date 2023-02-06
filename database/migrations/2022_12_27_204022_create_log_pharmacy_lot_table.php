
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPharmacyLotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_pharmacy_lot', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lot');
            $table->string('actual_amount');
            $table->string('sample');
            $table->date('expiration_date');
            $table->unsignedBigInteger('billing_stock_id');
            $table->unsignedBigInteger('pharmacy_lot_stock_id');
            $table->timestamps();

            $table->index('billing_stock_id');
            $table->foreign('billing_stock_id')->references('id')
                ->on('billing_stock');

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
        Schema::dropIfExists('log_pharmacy_lot');
    }
}
