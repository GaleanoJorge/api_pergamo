<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedAddTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_add', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('fixed_assets_id')->nullable();
            $table->unsignedBigInteger('fixed_accessories_id')->nullable();
            $table->unsignedBigInteger('fixed_location_campus_id')->nullable();
            $table->unsignedBigInteger('responsible_user_id');
            $table->string('request_amount')->nullable();
            $table->string('status');
            $table->string('observation')->nullable();
            $table->timestamps();

            $table->index('fixed_assets_id');
            $table->foreign('fixed_assets_id')->references('id')
                ->on('fixed_assets');

            $table->index('fixed_accessories_id');
            $table->foreign('fixed_accessories_id')->references('id')
                ->on('fixed_accessories');

            $table->index('fixed_location_campus_id');
            $table->foreign('fixed_location_campus_id')->references('id')
                ->on('fixed_location_campus');

            $table->index('responsible_user_id');
            $table->foreign('responsible_user_id')->references('id')
                ->on('user_role');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixed_add');
    }
}
