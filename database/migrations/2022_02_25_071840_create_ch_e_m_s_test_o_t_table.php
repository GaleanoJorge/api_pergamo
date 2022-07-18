<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChEMSTestOTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_e_m_s_test_o_t', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('appearance');
            $table->string('consent');
            $table->string('Attention');
            $table->string('humor');
            $table->string('language');
            $table->string('sensory_perception');
            $table->string('grade');
            $table->string('contents');
            $table->string('orientation');
            $table->string('sleep');
            $table->string('memory');
            
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
        Schema::dropIfExists('ch_e_m_s_test_o_t');
    }
}
