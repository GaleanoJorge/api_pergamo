<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('medical_record');
            $table->unsignedBigInteger('contract_type_id');
            $table->unsignedBigInteger('cost_center_id');
            $table->unsignedBigInteger('type_professional_id');
            $table->unsignedBigInteger('special_field_id');
            $table->unsignedBigInteger('medium_signature_file_id');
            $table->string('attends_external_consultation');
            $table->string('server_multiple_patients');

            
            $table->timestamps();

            $table->index('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users');
            $table->index('contract_type_id');
            $table->foreign('contract_type_id')->references('id')
                ->on('contract_type');
            $table->index('cost_center_id');
            $table->foreign('cost_center_id')->references('id')
                ->on('cost_center');
            $table->index('type_professional_id');
            $table->foreign('type_professional_id')->references('id')
                ->on('type_professional');
            $table->index('special_field_id');
            $table->foreign('special_field_id')->references('id')
                ->on('special_field');
            $table->index('medium_signature_file_id');
            $table->foreign('medium_signature_file_id')->references('id')
                    ->on('medium_signature_file');
            
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assistance');
    }
}
