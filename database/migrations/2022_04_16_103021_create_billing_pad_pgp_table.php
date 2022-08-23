
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingPadPgpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_pad_pgp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('total_value')->nullable();
            $table->bigInteger('consecutive')->nullable();
            $table->date('validation_date')->nullable();
            $table->unsignedBigInteger('billing_pad_consecutive_id')->nullable();
            $table->unsignedBigInteger('billing_pad_prefix_id')->nullable();
            $table->unsignedBigInteger('billing_pad_status_id')->nullable();
            $table->unsignedBigInteger('contract_id');
            $table->timestamps();

            $table->index('billing_pad_consecutive_id');
            $table->foreign('billing_pad_consecutive_id')->references('id')
                ->on('billing_pad_consecutive');

            $table->index('billing_pad_prefix_id');
            $table->foreign('billing_pad_prefix_id')->references('id')
                ->on('billing_pad_prefix');

            $table->index('billing_pad_status_id');
            $table->foreign('billing_pad_status_id')->references('id')
                ->on('billing_pad_status');

            $table->index('contract_id');
            $table->foreign('contract_id')->references('id')
                ->on('contract');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_pad_pgp');
    }
}
