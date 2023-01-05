
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPharmaLoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_pharma_lote', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('actual_amount');
            $table->string('amount');
            $table->string('sign');
            $table->string('observation')->nullable();
            $table->unsignedBigInteger('pharmacy_adjustment_id');
            $table->unsignedBigInteger('pharmacy_lot_stock_id');
            $table->timestamps();

            $table->index('pharmacy_adjustment_id');
            $table->foreign('pharmacy_adjustment_id')->references('id')
                ->on('pharmacy_adjustment');

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
        Schema::dropIfExists('log_pharma_lote');
    }
}
