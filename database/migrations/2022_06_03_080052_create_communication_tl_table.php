<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunicationTlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communication_tl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('eye_contact')->nullable();
            $table->string('courtesy_rules')->nullable();
            $table->string('communicative_intention')->nullable();
            $table->string('communicative_purpose')->nullable();
            $table->string('oral_verb_modality')->nullable();
            $table->string('written_verb_modality')->nullable();
            $table->string('nonsymbolic_nonverbal_modality')->nullable();
            $table->string('symbolic_nonverbal_modality')->nullable();
            $table->string('observations')->nullable();
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

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
        Schema::dropIfExists('communication_tl');
    }
}
