<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_taxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('taxes_id');
            $table->unsignedBigInteger('fiscal_clasification_id');
            $table->timestamps();

            $table->index('taxes_id');
            $table->foreign('taxes_id')->references('id')
            ->on('taxes');
            $table->index('company_id');
            $table->foreign('company_id')->references('id')
            ->on('company');
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
        Schema::dropIfExists('company_taxes');
    }
}
