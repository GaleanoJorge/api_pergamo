<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_assets', function (Blueprint $table) {  
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_subcategory_id');
            $table->unsignedBigInteger('product_presentation_id');
            $table->unsignedBigInteger('consumption_unit_id');
            $table->unsignedBigInteger('factory_id');
            $table->timestamps();

            $table->index('product_subcategory_id');
	        $table->foreign('product_subcategory_id')->references('id')
                ->on('product_subcategory');
            $table->index('product_presentation_id');
	        $table->foreign('product_presentation_id')->references('id')
                ->on('product_presentation');
            $table->index('consumption_unit_id');
	        $table->foreign('consumption_unit_id')->references('id')
                ->on('consumption_unit');
            $table->index('factory_id');
            $table->foreign('factory_id')->references('id')
                    ->on('factory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixed_assets');
    }
}
