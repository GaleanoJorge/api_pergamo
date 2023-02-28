
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingPadMuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_pad_mu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('total_value')->nullable();
            $table->bigInteger('consecutive')->nullable();
            $table->date('validation_date')->nullable();
            $table->dateTime('facturation_date')->nullable();
            $table->unsignedBigInteger('billing_pad_consecutive_id')->nullable();
            $table->unsignedBigInteger('billing_pad_prefix_id')->nullable();
            $table->unsignedBigInteger('billing_pad_status_id')->nullable();
            $table->unsignedBigInteger('billing_credit_note_id')->nullable();
            $table->unsignedBigInteger('briefcase_id');
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

            $table->index('billing_credit_note_id');
            $table->foreign('billing_credit_note_id')->references('id')
                ->on('billing_pad_mu');

            $table->index('briefcase_id');
            $table->foreign('briefcase_id')->references('id')
                ->on('briefcase');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_pad_mu');
    }
}
