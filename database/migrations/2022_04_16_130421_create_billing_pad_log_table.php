
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingPadLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_pad_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('billing_pad_id')->nullable();
            $table->unsignedBigInteger('billing_pad_status_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('billing_pad_id');
            $table->foreign('billing_pad_id')->references('id')
                ->on('billing_pad_log');

            $table->index('billing_pad_status_id');
            $table->foreign('billing_pad_status_id')->references('id')
                ->on('billing_pad_status');

            $table->index('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_pad_log');
    }
}
