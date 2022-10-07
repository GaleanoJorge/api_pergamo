<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChPsConsciousnessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_ps_consciousness', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('watch');
            $table->string('hypervigilant');
            $table->string('obtundation');
            $table->string('confusion');
            $table->string('delirium');
            $table->string('oneiroid');
            $table->string('twilight');
            $table->string('stupor');
            $table->string('shallow');
            $table->string('deep');
            $table->string('appearance');
            $table->string('attitude');
           
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
        Schema::dropIfExists('ch_ps_consciousness');
    }
}
