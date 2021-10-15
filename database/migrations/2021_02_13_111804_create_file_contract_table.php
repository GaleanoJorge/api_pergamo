<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_contract', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('file');
            $table->unsignedBigInteger('contract_id');
            $table->timestamps();

            $table->index('contract_id');
            $table->foreign('contract_id')->references('id')
                    ->on('contract');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_contract');
    }
}
