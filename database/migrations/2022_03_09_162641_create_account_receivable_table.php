<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountReceivableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_receivable', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file_payment');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('gloss_ambit_id');
            $table->unsignedBigInteger('status_bill_id');
            $table->unsignedTinyInteger('campus_id');
            $table->double('total_value_activities');
            $table->string('observation');
            $table->timestamps();

            $table->index('user_id');
            $table->index('gloss_ambit_id');
            $table->index('status_bill_id');
            $table->index('campus_id');

            $table->foreign('user_id')->references('id')
                ->on('users');
            $table->foreign('gloss_ambit_id')->references('id')
                ->on('gloss_ambit');
            $table->foreign('status_bill_id')->references('id')
            ->on('status_bill');
            $table->foreign('campus_id')->references('id')
                ->on('campus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_receivable');
    }   
}
