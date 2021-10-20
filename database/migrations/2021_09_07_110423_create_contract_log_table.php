<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('date_log');
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
        Schema::dropIfExists('contract_log');
    }
}
