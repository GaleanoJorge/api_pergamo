<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_request', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('fixed_type_id');
            $table->unsignedBigInteger('fixed_assets_id')->nullable();
            $table->unsignedBigInteger('fixed_accessories_id')->nullable();
            $table->unsignedBigInteger('request_user_id');
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->integer('request_amount')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->index('fixed_type_id');
            $table->foreign('fixed_type_id')->references('id')
                ->on('fixed_type');

            $table->index('fixed_assets_id');
            $table->foreign('fixed_assets_id')->references('id')
                ->on('fixed_assets');

            $table->index('fixed_accessories_id');
            $table->foreign('fixed_accessories_id')->references('id')
                ->on('fixed_accessories');

            $table->index('request_user_id');
            $table->foreign('request_user_id')->references('id')
                ->on('users');
                
            $table->index('patient_id');
            $table->foreign('patient_id')->references('id')
                ->on('admissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixed_request');
    }
}
