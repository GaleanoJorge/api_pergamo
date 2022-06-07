<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietSuppliesOutputMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_supplies_output_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('amount');
            $table->unsignedBigInteger('diet_supplies_output_id');
            $table->unsignedBigInteger('diet_menu_id');
            $table->timestamps();

            $table->index('diet_supplies_output_id');
            $table->index('diet_menu_id');

            $table->foreign('diet_supplies_output_id')->references('id')
                ->on('diet_supplies_output');
            $table->foreign('diet_menu_id')->references('id')
                ->on('diet_menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_supplies_output_menu');
    }
}
