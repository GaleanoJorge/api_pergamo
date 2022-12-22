<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChPsLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_ps_language', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ch_ps_expressive_id');
            $table->unsignedBigInteger('ch_ps_comprehensive_id');
            $table->unsignedBigInteger('ch_ps_others_id');
            $table->unsignedBigInteger('ch_ps_paraphasias_id');
            $table->longText('observations');    
        
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');

            $table->timestamps();

            $table->index('ch_ps_expressive_id');
            $table->foreign('ch_ps_expressive_id')->references('id')
                ->on('ch_ps_expressive');

            $table->index('ch_ps_comprehensive_id');
            $table->foreign('ch_ps_comprehensive_id')->references('id')
                ->on('ch_ps_comprehensive');

            $table->index('ch_ps_others_id');
            $table->foreign('ch_ps_others_id')->references('id')
                ->on('ch_ps_others');

            $table->index('ch_ps_paraphasias_id');
            $table->foreign('ch_ps_paraphasias_id')->references('id')
                ->on('ch_ps_paraphasias');

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
        Schema::dropIfExists('ch_ps_language');
    }
}
