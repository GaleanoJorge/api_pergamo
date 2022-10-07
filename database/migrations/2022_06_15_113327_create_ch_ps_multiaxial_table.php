<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChPsMultiaxialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_ps_multiaxial', function (Blueprint $table) {
            $table->bigIncrements('id');   

            $table->string('axis_one');
            $table->string('axis_two');
            $table->string('axis_three');
            $table->string('axis_four');
            $table->integer('eeag');

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
        Schema::dropIfExists('ch_ps_multiaxial');
    }
}
