<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('sectional_council_id');
            $table->unsignedTinyInteger('status_id');
            $table->integer('sga_origin_fk')->nullable();
            $table->timestamps();

            $table->index('status_id');
            $table->foreign('status_id')->references('id')->on('status');
            $table->index('sectional_council_id');
            $table->foreign('sectional_council_id')->references('id')->on('sectional_council');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('district');
    }
}
