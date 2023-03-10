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
            $table->longText('watch');
            $table->longText('hypervigilant');
            $table->longText('obtundation');
            $table->longText('confusion');
            $table->longText('delirium');
            $table->longText('oneiroid');
            $table->longText('twilight');
            $table->longText('stupor');
            $table->longText('shallow');
            $table->longText('deep');
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
