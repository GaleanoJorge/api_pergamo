<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillUserActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_user_activity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('num_activity');
            $table->unsignedBigInteger('user_id'); //Preguntar esta variable
            $table->unsignedBigInteger('account_receivable_id');
            $table->unsignedBigInteger('user_activity_id');
            $table->double('value_total');
            $table->string('observation');
            $table->timestamps();

            $table->index('user_id');
            $table->index('account_receivable_id');
            

            $table->foreign('user_id')->references('id')
                ->on('users');
            $table->foreign('account_receivable_id')->references('id')
                ->on('account_receivable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_user_activity');
    }
}
