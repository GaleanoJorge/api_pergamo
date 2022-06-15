<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChNutritionDietTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_nutrition_diet_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->unsignedBigInteger('ch_nutrition_food_history_id');
            $table->timestamps();

            $table->index('ch_nutrition_food_history_id');
            $table->foreign('ch_nutrition_food_history_id')->references('id')
                ->on('ch_nutrition_food_history');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ch_nutrition_diet_type');
    }
}
