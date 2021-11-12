<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlossTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gloss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_prefix');
            $table->integer('invoice_consecutive');
            $table->unsignedBigInteger('objetion_type_id');
            $table->unsignedBigInteger('repeated_initial_id');
            $table->date('received_date');
            $table->date('emission_date');
            $table->date('radication_date');
            $table->unsignedBigInteger('company_id');
            $table->unsignedTinyInteger('campus_id');
            $table->unsignedBigInteger('gloss_modality_id');
            $table->unsignedBigInteger('gloss_ambit_id');
            $table->unsignedBigInteger('gloss_service_id');
            $table->unsignedBigInteger('objetion_code_id');
            $table->string('objetion_detail');
            $table->integer('invoice_value');
            $table->integer('objeted_value');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('received_by_id');
            $table->timestamps();

            $table->index('objetion_type_id');
            $table->foreign('objetion_type_id')->references('id')
            ->on('objetion_type');
            $table->index('repeated_initial_id');
            $table->foreign('repeated_initial_id')->references('id')
            ->on('repeated_initial');
            $table->index('company_id');
            $table->foreign('company_id')->references('id')
            ->on('company');
            $table->index('campus_id');
            $table->foreign('campus_id')->references('id')
            ->on('campus');
            $table->index('gloss_modality_id');
            $table->foreign('gloss_modality_id')->references('id')
            ->on('gloss_modality');
            $table->index('gloss_ambit_id');
            $table->foreign('gloss_ambit_id')->references('id')
            ->on('gloss_ambit');
            $table->index('gloss_service_id');
            $table->foreign('gloss_service_id')->references('id')
            ->on('gloss_service');
            $table->index('objetion_code_id');
            $table->foreign('objetion_code_id')->references('id')
            ->on('objetion_code');
            $table->index('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users');
            $table->index('received_by_id');
            $table->foreign('received_by_id')->references('id')
            ->on('received_by');

            

            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gloss');
    }
}
