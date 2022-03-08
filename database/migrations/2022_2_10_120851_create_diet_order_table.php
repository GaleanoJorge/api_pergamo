<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admissions_id');
            $table->unsignedBigInteger('diet_menu_id');
            $table->timestamps();

            $table->index('admissions_id');
            $table->index('diet_menu_id');

            $table->foreign('admissions_id')->references('id')
                ->on('admissions');
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
        Schema::dropIfExists('diet_order');
    }
}
