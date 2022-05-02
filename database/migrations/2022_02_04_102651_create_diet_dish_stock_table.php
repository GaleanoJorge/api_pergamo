<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietDishStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_dish_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('amount');
            $table->unsignedBigInteger('diet_dish_id');
            $table->unsignedBigInteger('diet_supplies_id');
            $table->timestamps();

            $table->index('diet_dish_id');
            $table->index('diet_supplies_id');

            $table->foreign('diet_dish_id')->references('id')
                ->on('diet_dish');
            $table->foreign('diet_supplies_id')->references('id')
            ->on('diet_supplies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_dish_stock');
    }
}
