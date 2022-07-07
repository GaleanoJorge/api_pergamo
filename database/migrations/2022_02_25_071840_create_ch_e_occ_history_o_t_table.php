<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChEOccHistoryOTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_e_occ_history_o_t', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ocupation');
            $table->string('enterprice_employee')->nullable();
            $table->string('work_employee')->nullable();
            $table->string('shift_employee')->nullable();
            $table->string('observation_employee')->nullable();
            $table->string('work_independent')->nullable();
            $table->string('shift_independent')->nullable();
            $table->string('observation_independent')->nullable();
            $table->string('observation_home')->nullable();
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
        Schema::dropIfExists('ch_e_occ_history_o_t');
    }
}
