<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChInabilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_inability', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ch_contingency_code_id');
            $table->string('extension')->nullable();
            $table->date('initial_date');
            $table->date('final_date');
            $table->unsignedBigInteger('diagnosis_id');
            $table->unsignedBigInteger('ch_type_inability_id');
            $table->unsignedBigInteger('ch_type_procedure_id');
            $table->string('observation');
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

            
            $table->index('ch_contingency_code_id');
            $table->foreign('ch_contingency_code_id')->references('id')
            ->on('ch_contingency_code');

                
            $table->index('ch_type_inability_id');
            $table->foreign('ch_type_inability_id')->references('id')
                ->on('ch_type_inability');
            
            $table->index('ch_type_procedure_id');
            $table->foreign('ch_type_procedure_id')->references('id')
                ->on('ch_type_procedure');

            $table->index('diagnosis_id');
            $table->foreign('diagnosis_id')->references('id')
                ->on('diagnosis');
    

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
        Schema::dropIfExists('ch_inability');
    }
}
