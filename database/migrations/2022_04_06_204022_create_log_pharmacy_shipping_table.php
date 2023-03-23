
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPharmacyShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_pharmacy_shipping', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('status');
            $table->unsignedBigInteger('pharmacy_request_shipping_id');
            $table->string('quantity');
            $table->timestamps();

            $table->index('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users');

            $table->index('pharmacy_request_shipping_id');
            $table->foreign('pharmacy_request_shipping_id')->references('id')
                ->on('pharmacy_request_shipping');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_pharmacy_shipping');
    }
}
