
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyProductRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_product_request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('request_amount')->nullable();
            $table->string('status');
            $table->string('observation')->nullable();
            $table->unsignedBigInteger('services_briefcase_id')->nullable();
            $table->unsignedBigInteger('admissions_id')->nullable();
            $table->unsignedBigInteger('product_generic_id');
            $table->unsignedBigInteger('own_pharmacy_stock_id');
            $table->unsignedBigInteger('request_pharmacy_stock_id');
            $table->timestamps();

            $table->index('product_generic_id');
            $table->foreign('product_generic_id')->references('id')
                ->on('product_generic');

            $table->index('own_pharmacy_stock_id');
            $table->foreign('own_pharmacy_stock_id')->references('id')
                ->on('pharmacy_stock');

            $table->index('services_briefcase_id');
            $table->foreign('services_briefcase_id')->references('id')
                ->on('services_briefcase');
            
            $table->index('admissions_id');
            $table->foreign('admissions_id')->references('id')
                ->on('admissions');

            $table->index('request_pharmacy_stock_id');
            $table->foreign('request_pharmacy_stock_id')->references('id')
                ->on('pharmacy_stock');
        });
    }

    /**
     * Reverse the migrations.
     *|
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmacy_product_request');
    }
}
