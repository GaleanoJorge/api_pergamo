<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChDietsEvoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_diets_evo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('enterally_diet_id')->nullable();
            $table->string('diet_consistency');
            $table->string('observation');
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
    
            $table->timestamps();

            $table->index('enterally_diet_id');
            $table->foreign('enterally_diet_id')->references('id')
            ->on('enterally_diet');

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
        Schema::dropIfExists('ch_diets_evo');
    }
}
