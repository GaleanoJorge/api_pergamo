<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_supplies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('diet_supply_type_id');
            $table->unsignedBigInteger('measurement_units_id');
            $table->timestamps();
            
            $table->index('diet_supply_type_id');
            $table->index('measurement_units_id');
            
            $table->foreign('diet_supply_type_id')->references('id')
                ->on('diet_supply_type');
            $table->foreign('measurement_units_id')->references('id')
                ->on('measurement_units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_supplies');
    }
}
