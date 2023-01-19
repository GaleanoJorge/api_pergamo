<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChPsIntellectiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_ps_intellective', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('memory');
            $table->longText('att_observations');
            $table->longText('me_observations');
            $table->string('perception');
            $table->longText('per_observations');
            $table->string('autopsychic');
            $table->string('allopsychic');
            $table->string('space');
                   
            $table->unsignedBigInteger('ch_ps_attention_id');

            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');

            $table->timestamps();

            $table->index('ch_ps_attention_id');
            $table->foreign('ch_ps_attention_id')->references('id')
                ->on('ch_ps_attention');

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
        Schema::dropIfExists('ch_ps_intellective');
    }
}
