<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manual', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->Integer('year');
            $table->Integer('type_manual');
            $table->unsignedTinyInteger('status_id');
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
        Schema::dropIfExists('manual');
    }
}
