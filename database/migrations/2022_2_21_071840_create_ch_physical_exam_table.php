<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChPhysicalExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_physical_exam', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('revision');
            $table->string('observation');
            $table->unsignedBigInteger('type_ch_physical_exam_id');
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();


            $table->index('type_ch_physical_exam_id');
            $table->foreign('type_ch_physical_exam_id')->references('id')
                ->on('type_ch_physical_exam');

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
        Schema::dropIfExists('ch_physical_exam');
    }
}
