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
            $table->integer('procedure_id');
            $table->unsignedBigInteger('account_receivable_id');
            $table->double('value');
            $table->string('observation');
            $table->timestamps();

            $table->index('account_receivable_id');
            

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
