<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietMenuDishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_menu_dish', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('diet_menu_id');
            $table->unsignedBigInteger('diet_dish_id');
            $table->timestamps();

            $table->index('diet_menu_id');
            $table->index('diet_dish_id');

            $table->foreign('diet_menu_id')->references('id')
                ->on('diet_menu');
            $table->foreign('diet_dish_id')->references('id')
                ->on('diet_dish');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_menu_dish');
    }
}
