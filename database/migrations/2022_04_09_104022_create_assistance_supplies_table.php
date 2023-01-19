
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistanceSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistance_supplies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_incharge_id');
            $table->unsignedBigInteger('pharmacy_product_request_id');
            $table->unsignedBigInteger('ch_record_id')->nullable();
            $table->unsignedBigInteger('supplies_status_id');
            $table->longText('observation')->nullable();
            $table->time('application_hour')->nullable();
            $table->timestamps();

            
            $table->index('user_incharge_id');
            $table->foreign('user_incharge_id')->references('id')
                ->on('users');

            $table->index('pharmacy_product_request_id');
            $table->foreign('pharmacy_product_request_id')->references('id')
                ->on('pharmacy_product_request');

            $table->index('ch_record_id');
            $table->foreign('ch_record_id')->references('id')
                ->on('ch_record');

            $table->index('supplies_status_id');
            $table->foreign('supplies_status_id')->references('id')
                ->on('supplies_status');

        });
    }

    /**
     * Reverse the migrations.
     *|
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assistance_supplies');
    }
}
