<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChObjectivesTherapyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_objectives_therapy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('strengthen')->nullable();
            $table->string('promote')->nullable();
            $table->string('title')->nullable();
            $table->string('improve')->nullable();
            $table->string('re_education')->nullable();
            $table->string('hold')->nullable();
            $table->string('check')->nullable();
            $table->string('train')->nullable();
            $table->string('headline')->nullable();
            $table->string('look_out')->nullable();
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();
         
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
        Schema::dropIfExists('ch_objectives_therapy');
    }
}
