<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChInterconsultationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_interconsultation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('specialty_id');
            $table->integer('amount');
            $table->unsignedTinyInteger('frequency_id');
            $table->string('observations')->nullable();
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();
            
            $table->index('specialty_id');
            $table->foreign('specialty_id')->references('id')
                ->on('specialty');

            $table->index('frequency_id');
            $table->foreign('frequency_id')->references('id')
                ->on('frequency');

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
        Schema::dropIfExists('ch_interconsultation');
    }
}
