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
            $table->string('name')->nullable();
            $table->string('own_code')->nullable();
            $table->unsignedBigInteger('manual_id')->nullable();
            $table->unsignedBigInteger('procedure_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('manual_procedure_type_id')->nullable();
            $table->string('homologous_id')->nullable();
            $table->Integer('value');
            $table->unsignedBigInteger('price_type_id')->nullable();
            $table->timestamps();


            $table->index('manual_id');
            $table->index('procedure_id');
            $table->index('price_type_id');
            $table->index('product_id');
            $table->index('manual_procedure_type_id');
            $table->index('homologous_id');

            $table->foreign('manual_id')->references('id')
                ->on('manual');
            $table->foreign('procedure_id')->references('id')
                ->on('procedure');
            $table->foreign('price_type_id')->references('id')
                ->on('price_type');
            $table->foreign('product_id')->references('id')
                ->on('product');
            $table->foreign('manual_procedure_type_id')->references('id')
                ->on('procedure_type');
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
