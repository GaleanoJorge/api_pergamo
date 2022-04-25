<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('amount');
            $table->unsignedBigInteger('pad_risk_id');
            $table->unsignedSmallInteger('role_id');
            $table->unsignedBigInteger('scope_of_attention_id');
            $table->timestamps();

            $table->index('pad_risk_id');
            $table->index('role_id');
            $table->index('scope_of_attention_id');

            $table->foreign('pad_risk_id')->references('id')
                ->on('pad_risk');
            $table->foreign('role_id')->references('id')
                ->on('role');
            $table->foreign('scope_of_attention_id')->references('id')
                ->on('scope_of_attention');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariff');
    }
}
