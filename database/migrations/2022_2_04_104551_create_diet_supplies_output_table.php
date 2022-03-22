<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietSuppliesOutputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_supplies_output', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->unsignedtinyInteger('campus_id');
            $table->timestamps();

            $table->index('campus_id');

            $table->foreign('campus_id')->references('id')
                ->on('campus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_supplies_output');
    }
}
