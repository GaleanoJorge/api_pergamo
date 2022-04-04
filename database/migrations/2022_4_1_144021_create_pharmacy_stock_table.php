<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pharmacy');
            $table->string('name');
            $table->unsignedBigInteger('campus_id');
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
        Schema::dropIfExists('pharmacy_stock');
    }
}
