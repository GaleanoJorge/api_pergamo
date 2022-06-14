<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChLiquidControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_liquid_control', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clock');
            $table->unsignedBigInteger('ch_route_fluid_id');
            $table->unsignedBigInteger('ch_type_fluid_id');
            $table->unsignedBigInteger('delivered_volume');
            $table->string('specific_name')->nullable();
            $table->string('bag_number')->nullable();
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

            $table->index('ch_route_fluid_id');
            $table->foreign('ch_route_fluid_id')->references('id')
                ->on('ch_route_fluid');

            $table->index('ch_type_fluid_id');
            $table->foreign('ch_type_fluid_id')->references('id')
                ->on('ch_type_fluid');

            $table->index('type_record_id');
            $table->foreign('type_record_id')->references('id')
                ->on('type_record');

            $table->index('ch_record_id');
            $table->foreign('ch_record_id')->references('id')
                ->on('ch_record');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ch_liquid_control');
    }
}
