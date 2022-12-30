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

            $table->unsignedBigInteger('axis_one_id');
            $table->unsignedBigInteger('axis_two_id');
            $table->unsignedBigInteger('axis_three_id');
            $table->unsignedBigInteger('axis_four_id');
            $table->integer('eeag');

            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');

            $table->timestamps();

            $table->index('axis_one_id');
            $table->foreign('axis_one_id')->references('id')
                ->on('diagnosis_dms');

            $table->index('axis_two_id');
            $table->foreign('axis_two_id')->references('id')
                ->on('diagnosis_dms');

            $table->index('axis_three_id');
            $table->foreign('axis_three_id')->references('id')
                ->on('diagnosis_dms');

            $table->index('axis_four_id');
            $table->foreign('axis_four_id')->references('id')
                ->on('diagnosis_dms');

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
