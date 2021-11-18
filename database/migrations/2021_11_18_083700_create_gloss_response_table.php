<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlossResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gloss_response', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gloss_id');
            $table->date('response_date');
            $table->unsignedBigInteger('objetion_code_response_id');
            $table->string('accepted_value');
            $table->string('value_not_accepted'); 
            $table->unsignedBigInteger('objetion_response_id');
            $table->timestamps(); 

            $table->index('gloss_id');
            $table->foreign('gloss_id')->references('id')
            ->on('gloss'); 

            $table->index('description_code_id');
            $table->foreign('description_code_id')->references('id')
            ->on('objetion_code_response'); 
            
            $table->index('pertinent_injustified_id');
            $table->foreign('pertinent_injustified_id')->references('id')
            ->on('objetion_response'); 
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gloss_response');
    }
}
