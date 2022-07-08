<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChAssSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_ass_signs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fluter')->nullable();
            $table->string('distal')->nullable();
            $table->string('widespread')->nullable();
            $table->string('peribucal')->nullable();
            $table->string('periorbitary')->nullable();
            $table->string('none')->nullable();
            $table->string('intercostal')->nullable();
            $table->string('aupraclavicular')->nullable();
            // $table->unsignedBigInteger('ch_therapeutic_ass_id');
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

            // $table->index('ch_therapeutic_ass_id');
            // $table->foreign('ch_therapeutic_ass_id')->references('id')
            //     ->on('ch_therapeutic_ass');


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
        Schema::dropIfExists('ch_ass_signs');
    }
}

