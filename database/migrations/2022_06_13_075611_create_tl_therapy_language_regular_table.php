<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTlTherapyLanguageRegularTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tl_therapy_language_regular', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tl_therapy_language_id')->nullable();
            $table->string('status_patient')->nullable();
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();
            

            $table->index('tl_therapy_language_id');
            $table->foreign('tl_therapy_language_id')->references('id')
                    ->on('tl_therapy_language');

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
        Schema::dropIfExists('tl_therapy_language_regular');
    }
}
