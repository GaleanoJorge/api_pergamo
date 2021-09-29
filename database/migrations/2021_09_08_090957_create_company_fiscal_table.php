<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyFiscalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_fiscal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('fiscal_characteristic_id');
            $table->unsignedBigInteger('fiscal_clasification_id');
            $table->timestamps();

            $table->index('company_id');
            $table->foreign('company_id')->references('id')
            ->on('company');
            $table->index('fiscal_characteristic_id');
            $table->foreign('fiscal_characteristic_id')->references('id')
            ->on('fiscal_characteristic');
            $table->index('fiscal_clasification_id');
            $table->foreign('fiscal_clasification_id')->references('id')
            ->on('fiscal_clasification');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_fiscal');
    }
}
