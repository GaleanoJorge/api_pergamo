<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietSuppliesInputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_supplies_input', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('amount');
            $table->double('price');
            $table->string('invoice_number');
            $table->unsignedBigInteger('diet_supplies_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('campus_id');
            $table->timestamps();

            $table->index('diet_supplies_id');
            $table->index('company_id');
            $table->index('campus_id');

            $table->foreign('diet_supplies_id')->references('id')
                ->on('diet_supplies');
            $table->foreign('company_id')->references('id')
                ->on('company');
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
        Schema::dropIfExists('diet_supplies_input');
    }
}
