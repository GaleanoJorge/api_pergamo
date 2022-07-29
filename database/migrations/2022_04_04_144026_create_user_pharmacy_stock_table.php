<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPharmacyStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_pharmacy_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pharmacy_stock_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

           $table->index('pharmacy_stock_id');
            $table->foreign('pharmacy_stock_id')->references('id')
                ->on('pharmacy_stock');

            $table->index('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_pharmacy_stock');
    }
}
