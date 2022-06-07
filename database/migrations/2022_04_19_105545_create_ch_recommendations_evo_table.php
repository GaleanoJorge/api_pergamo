<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChRecommendationsEvoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_recommendations_evo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('recommendations_evo_id');
            $table->string('analisys');
            $table->string('plan'); 
            $table->string('patient_family_education')->nullable();
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

            $table->index('recommendations_evo_id');
            $table->foreign('recommendations_evo_id')->references('id')
                    ->on('recommendations_evo');

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
        Schema::dropIfExists('ch_recommendations_evo');
    }
}
