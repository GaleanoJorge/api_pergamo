<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageTlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_tl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phonetic_phonological');
            $table->string('syntactic')->nullable();
            $table->string('morphosyntactic')->nullable();
            $table->string('semantic')->nullable();
            $table->string('pragmatic')->nullable();
            $table->string('reception');
            $table->string('coding')->nullable();
            $table->string('decoding')->nullable();
            $table->string('production')->nullable();
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
        Schema::dropIfExists('language_tl');
    }
}
