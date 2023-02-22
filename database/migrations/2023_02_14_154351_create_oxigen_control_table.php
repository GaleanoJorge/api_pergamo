<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOxigenControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oxigen_control', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('oxigen_flow');
            $table->string('duration_minutes');
            $table->unsignedBigInteger('oxigen_administration_way_id');
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

            $table->index('oxigen_administration_way_id');
            $table->foreign('oxigen_administration_way_id')->references('id')
                ->on('oxigen_administration_way');

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
        Schema::dropIfExists('oxigen_control');
    }
}
