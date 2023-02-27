<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportBillingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_billing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('initial_report');
            $table->date('final_report');
            $table->unsignedBigInteger('billing_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->index('billing_id');
            $table->foreign('billing_id')->references('id')
                ->on('billing_pad');

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
        Schema::dropIfExists('billing');
    }
}
