<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SectionalCouncilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectional_council', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('status_id');
            $table->string('name');
            $table->integer('sga_origin_fk')->nullable();
            $table->timestamps();

            $table->index('status_id');
            $table->foreign('status_id')->references('id')
                ->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sectional_council');
    }
}
