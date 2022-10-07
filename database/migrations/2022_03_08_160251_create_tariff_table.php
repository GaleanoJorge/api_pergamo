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
            $table->integer('quantity')->nullable();
            $table->boolean('extra_dose')->nullable();
            $table->boolean('has_car')->nullable();
            $table->boolean('phone_consult')->nullable();
            $table->boolean('failed')->nullable();
            $table->unsignedTinyInteger('status_id')->nullable();
            $table->unsignedBigInteger('admissions_id')->nullable();
            $table->unsignedBigInteger('pad_risk_id')->nullable();
            $table->unsignedBigInteger('program_id')->nullable();
            $table->unsignedTinyInteger('type_of_attention_id')->nullable();
            $table->timestamps();

            $table->index('status_id');
            $table->foreign('status_id')->references('id')
                ->on('status');

            $table->index('admissions_id');
            $table->foreign('admissions_id')->references('id')
                ->on('admissions');

            $table->index('program_id');
            $table->foreign('program_id')->references('id')
                ->on('program');

            $table->index('pad_risk_id');
            $table->foreign('pad_risk_id')->references('id')
                ->on('pad_risk');

            $table->index('type_of_attention_id');
            $table->foreign('type_of_attention_id')->references('id')
                ->on('type_of_attention');
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
