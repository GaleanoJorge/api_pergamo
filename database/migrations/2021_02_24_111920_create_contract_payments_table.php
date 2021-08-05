<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_id');
            $table->string('code',100);
            $table->date('date_code');
            $table->string('code_technical_concept',100);
            $table->date('date_technical_concept');
            $table->double('value_payment');
            $table->timestamps();

            $table->index('contract_id');
            $table->foreign('contract_id')->references('id')->on('contract');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_payments');
    }
}
