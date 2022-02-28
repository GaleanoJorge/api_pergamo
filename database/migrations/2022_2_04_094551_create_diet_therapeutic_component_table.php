<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietTherapeuticComponentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_therapeutic_component', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('diet_therapeutic_id');
            $table->unsignedBigInteger('diet_component_id');
            $table->timestamps();

            $table->index('diet_therapeutic_id');
            $table->index('diet_component_id');

            $table->foreign('diet_therapeutic_id')->references('id')
                ->on('diet_therapeutic');
            $table->foreign('diet_component_id')->references('id')
                ->on('diet_component');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_therapeutic_component');
    }
}
