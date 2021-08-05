<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedTinyInteger('status_id');
            $table->integer('sga_origin_fk')->nullable();
            $table->timestamps();
            $table->boolean('is_judicial');

            $table->index('status_id');
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position');
    }
}
