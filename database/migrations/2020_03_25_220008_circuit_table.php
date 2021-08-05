<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CircuitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circuit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('district_id');
            $table->unsignedTinyInteger('status_id');
            $table->integer('sga_origin_fk')->nullable();
            $table->timestamps();

            $table->index('status_id');
            $table->foreign('status_id')->references('id')->on('status');
            $table->index('district_id');
            $table->foreign('district_id')->references('id')->on('district');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circuit');
    }
}
