<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChEMSCommunicationOTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_e_m_s_communication_o_t', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('community');
            $table->string('relatives');
            $table->string('friends');
            $table->string('health');
            $table->string('shopping');
            $table->string('foods');
            $table->string('bathe');
            $table->string('dress');
            $table->string('animals');
            
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
        Schema::dropIfExists('ch_e_m_s_communication_o_t');
    }
}
