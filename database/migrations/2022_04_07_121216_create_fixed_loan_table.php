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
            $table->unsignedBigInteger('fixed_assets_id')->nullable();
            $table->unsignedBigInteger('fixed_accessories_id')->nullable();
            $table->unsignedBigInteger('responsible_user_id');

            $table->timestamps();

            $table->index('fixed_add_id');
            $table->foreign('fixed_add_id')->references('id')
                ->on('fixed_add');

            $table->index('fixed_assets_id');
            $table->foreign('fixed_assets_id')->references('id')
                ->on('fixed_assets');

            $table->index('fixed_accessories_id');
            $table->foreign('fixed_accessories_id')->references('id')
                ->on('fixed_accessories');

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
