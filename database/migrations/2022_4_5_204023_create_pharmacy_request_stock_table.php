
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyRequestStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_request_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('amount');
            $table->unsignedBigInteger('pharmacy_request_id');
            $table->timestamps();

            $table->index('pharmacy_request_id');
            $table->foreign('pharmacy_request_id')->references('id')
                ->on('pharmacy_request');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmacy_request_stock');
    }
}
