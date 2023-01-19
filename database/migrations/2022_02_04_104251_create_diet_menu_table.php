<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('diet_consistency_id');
            $table->unsignedBigInteger('diet_component_id');
            $table->unsignedBigInteger('diet_menu_type_id');
            $table->unsignedBigInteger('diet_week_id');
            $table->unsignedBigInteger('diet_day_id');
            $table->timestamps();

            $table->index('diet_consistency_id');
            $table->index('diet_component_id');
            $table->index('diet_menu_type_id');
            $table->index('diet_week_id');
            $table->index('diet_day_id');

            $table->foreign('diet_consistency_id')->references('id')
                ->on('diet_consistency');
            $table->foreign('diet_component_id')->references('id')
                ->on('diet_component');
            $table->foreign('diet_menu_type_id')->references('id')
                ->on('diet_menu_type');
            $table->foreign('diet_week_id')->references('id')
                ->on('diet_week');
            $table->foreign('diet_day_id')->references('id')
                ->on('diet_day');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_menu');
    }
}
