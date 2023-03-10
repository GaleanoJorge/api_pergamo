<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTlTherapyLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tl_therapy_language', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('medical_diagnostic_id')->nullable();
            $table->unsignedBigInteger('therapeutic_diagnosis_id')->nullable();
            $table->longText('reason_consultation')->nullable();
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

            $table->index('medical_diagnostic_id');
            $table->foreign('medical_diagnostic_id') ->references('id')
                ->on('diagnosis');
            $table->index('therapeutic_diagnosis_id');
            $table->foreign('therapeutic_diagnosis_id') ->references('id')
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
        Schema::dropIfExists('tl_therapy_language');
    }
}
