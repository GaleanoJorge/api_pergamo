
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
            $table->string('status')->nullable();
            $table->string('observation')->nullable();
            $table->integer('request_amount')->nullable();
            $table->unsignedBigInteger('admissions_id')->nullable();
            $table->unsignedBigInteger('user_request_id')->nullable();
            $table->unsignedBigInteger('product_generic_id')->nullable();
            $table->unsignedBigInteger('management_plan_id')->nullable();
            $table->unsignedBigInteger('product_supplies_id')->nullable();
            $table->unsignedBigInteger('services_briefcase_id')->nullable();
            $table->unsignedBigInteger('own_pharmacy_stock_id')->nullable();
            $table->unsignedBigInteger('request_pharmacy_stock_id')->nullable();
            $table->unsignedBigInteger('user_request_pad_id')->nullable();
            $table->timestamps();


            $table->index('user_request_id');
            $table->foreign('user_request_id')->references('id')
                ->on('users');
            
            $table->index('user_request_pad_id');
            $table->foreign('user_request_pad_id')->references('id')
                ->on('users');

            $table->index('product_supplies_id');
            $table->foreign('product_supplies_id')->references('id')
                ->on('product_supplies');

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

            $table->index('management_plan_id');
            $table->foreign('management_plan_id')->references('id')
                ->on('management_plan');

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
