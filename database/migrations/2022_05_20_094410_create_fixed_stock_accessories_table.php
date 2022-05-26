<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedStockAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_stock_accessories', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->integer('amount_loan')->nullable();
            $table->unsignedBigInteger('fixed_accessories_id');
            $table->timestamps();

            $table->index('fixed_accessories_id');
            $table->foreign('fixed_accessories_id')->references('id')
                ->on('fixed_accessories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixed_stock_accessories');
    }
}
