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
            $table->string('file_payment')->nullable();
            $table->double('gross_value_activities')->nullable();
            $table->double('net_value_activities')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('status_bill_id')->nullable();
            $table->unsignedBigInteger('minimum_salary_id')->nullable();
            $table->timestamps();

            
            $table->index('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users');

            $table->index('status_bill_id');
            $table->foreign('status_bill_id')->references('id')
            ->on('status_bill');

            $table->index('minimum_salary_id');
            $table->foreign('minimum_salary_id')->references('id')
            ->on('minimum_salary');

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
