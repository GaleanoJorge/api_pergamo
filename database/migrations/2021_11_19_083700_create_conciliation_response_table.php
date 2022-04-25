<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConciliationResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conciliation_response', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gloss_conciliations_id');
            $table->date('response_date');
            $table->unsignedBigInteger('objetion_code_response_id')->nullable();
            $table->string('accepted_value')->nullable();
            $table->string('value_not_accepted')->nullable();
            $table->string('response');
            $table->string('type_response');
            $table->string('file')->nullable();
            $table->unsignedBigInteger('objetion_response_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('justification_status')->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users');

            $table->index('gloss_conciliations_id');
            $table->foreign('gloss_conciliations_id')->references('id')
            ->on('gloss_conciliations'); 

            $table->index('objetion_code_response_id');
            $table->foreign('objetion_code_response_id')->references('id')
            ->on('objetion_code_response'); 
            
            $table->index('objetion_response_id');
            $table->foreign('objetion_response_id')->references('id')
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
        Schema::dropIfExists('conciliation_response');
    }
}
