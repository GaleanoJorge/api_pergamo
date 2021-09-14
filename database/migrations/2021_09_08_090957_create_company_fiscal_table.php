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
            $table->unsignedBigInteger('cof_company');
            $table->unsignedBigInteger('cof_characteristic');
            $table->unsignedBigInteger('cof_clasification');
            $table->timestamps();
            $table->index('cof_company');
            $table->foreign('cof_company')->references('id')
            ->on('company');
            $table->index('cof_characteristic');
            $table->foreign('cof_characteristic')->references('id')
            ->on('fiscal_characteristic');
            $table->index('cof_clasification');
            $table->foreign('cof_clasification')->references('id')
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
