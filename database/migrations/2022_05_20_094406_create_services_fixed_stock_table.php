<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesFixedStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_fixed_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fixed_stock_id');
            $table->unsignedBigInteger('scope_of_attention_id');
            $table->timestamps();

           $table->index('fixed_stock_id');
            $table->foreign('fixed_stock_id')->references('id')
                ->on('fixed_stock');

            $table->index('scope_of_attention_id');
            $table->foreign('scope_of_attention_id')->references('id')
                ->on('scope_of_attention');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_fixed_stock');
    }
}
