<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManualPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manual_price', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('manual_id');
            $table->unsignedBigInteger('procedure_id');
            $table->Integer('value');
            $table->unsignedBigInteger('price_type_id');
            $table->timestamps();


            $table->index('manual_id');
            $table->index('procedure_id');
            $table->index('price_type_id');

            $table->foreign('manual_id')->references('id')
                ->on('manual');
            $table->foreign('procedure_id')->references('id')
                ->on('procedure');
            $table->foreign('price_type_id')->references('id')
                ->on('price_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manual_price');
    }
}
