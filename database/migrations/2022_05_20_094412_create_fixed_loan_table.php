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
            $table->unsignedBigInteger('own_user_id');
            $table->unsignedBigInteger('fixed_assets_id');
            $table->unsignedBigInteger('fixed_stock_accessories_id')->nullable();
            $table->unsignedBigInteger('fixed_location_campus_id');
            $table->unsignedBigInteger('responsible_user_id')->nullable();
            $table->string('observation');
            $table->unsignedBigInteger('request_user_id');
            $table->string('status');
            $table->timestamps();

            $table->index('fixed_assets_id');
            $table->foreign('fixed_assets_id')->references('id')
                ->on('fixed_assets');

            $table->index('fixed_stock_accessories_id');
            $table->foreign('fixed_stock_accessories_id')->references('id')
                ->on('fixed_stock_accessories');

            $table->index('fixed_location_campus_id');
            $table->foreign('fixed_location_campus_id')->references('id')
                ->on('fixed_location_campus');

            $table->index('responsible_user_id');
            $table->foreign('responsible_user_id')->references('id')
                ->on('users');

            $table->index('own_user_id');
            $table->foreign('own_user_id')->references('id')
                ->on('users');

            $table->index('request_user_id');
            $table->foreign('request_user_id')->references('id')
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
