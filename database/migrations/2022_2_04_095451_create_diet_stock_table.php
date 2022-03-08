<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('amount');
            $table->unsignedBigInteger('diet_supplies_id');
            $table->unsignedBigInteger('company_id');
            $table->timestamps();

            $table->index('diet_supplies_id');
            $table->index('company_id');

            $table->foreign('diet_supplies_id')->references('id')
                ->on('diet_supplies');
            $table->foreign('company_id')->references('id')
                ->on('company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_stock');
    }
}
