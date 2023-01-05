<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSuppliesTable extends Migration
{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
                Schema::create('product_supplies', function (Blueprint $table) {
                        $table->bigIncrements('id');
                        $table->unsignedBigInteger('product_group_id')->nullable();
                        $table->unsignedBigInteger('product_category_id')->nullable();
                        $table->unsignedBigInteger('product_subcategory_id')->nullable();
                        $table->string('size')->nullable();
                        $table->string('measure')->nullable();
                        $table->string('stature')->nullable();
                        $table->unsignedBigInteger('size_supplies_measure_id')->nullable();
                        $table->unsignedBigInteger('measure_supplies_measure_id')->nullable();
                        $table->Integer('minimum_stock')->nullable();
                        $table->Integer('maximum_stock')->nullable();
                        $table->string('description');
                        $table->string('code_gmdn')->nullable();
                        $table->unsignedBigInteger('product_dose_id')->nullable();
                        $table->string('dose')->nullable();

                        $table->timestamps();

                        $table->index('product_group_id');
                        $table->foreign('product_group_id')->references('id')
                                ->on('product_group');

                        $table->index('product_category_id');
                        $table->foreign('product_category_id')->references('id')
                                ->on('product_category');

                        $table->index('product_subcategory_id');
                        $table->foreign('product_subcategory_id')->references('id')
                                ->on('product_subcategory');

                        $table->index('size_supplies_measure_id');
                        $table->foreign('size_supplies_measure_id')->references('id')
                                ->on('supplies_measure');

                        $table->index('measure_supplies_measure_id');
                        $table->foreign('measure_supplies_measure_id')->references('id')
                                ->on('supplies_measure');

                        $table->index('product_dose_id');
                        $table->foreign('product_dose_id')->references('id')
                                ->on('product_dose');
                });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
                Schema::dropIfExists('product_supplies');
        }
}
