<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_account', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dac_name');
            $table->unsignedTinyInteger('dac_state');
            $table->timestamps();

            $table->index('dac_state');
            $table->foreign('dac_state')->references('id')
            ->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_account');
    }
}
