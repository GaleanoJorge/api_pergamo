<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_loan', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->integer('amount');
            $table->integer('amount_damaged')->nullable();
            $table->integer('amount_provition')->nullable();
            $table->unsignedBigInteger('fixed_add_id')->nullable();
            $table->unsignedBigInteger('responsible_user_id');
            $table->string('observation')->nullable();

            $table->timestamps();

            $table->index('fixed_add_id');
            $table->foreign('fixed_add_id')->references('id')
                ->on('fixed_add');
              
            $table->index('responsible_user_id');
            $table->foreign('responsible_user_id')->references('id')
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
        Schema::dropIfExists('fixed_loan');
    }
}
