<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedtinyInteger('campus_id');
            $table->unsignedBigInteger('permission_pharmacy_stock_id');
            $table->timestamps();

            $table->index('campus_id');
            $table->foreign('campus_id')->references('id')->on('campus');

            $table->index('permission_pharmacy_stock_id');
            $table->foreign('permission_pharmacy_stock_id')->references('id')
                ->on('permission_pharmacy_stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmacy_stock');
    }
}
