<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('enable_code')->nullable();
            $table->unsignedBigInteger('billing_pad_prefix_id');
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->timestamps();

            $table->index('billing_pad_prefix_id');
            $table->foreign('billing_pad_prefix_id')->references('id')->on('billing_pad_prefix');

            $table->index('region_id');
            $table->foreign('region_id')->references('id')->on('region');

            $table->index('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campus');
    }
}
