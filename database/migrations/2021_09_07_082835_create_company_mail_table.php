<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyMailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_mail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cma_company');
            $table->string('cma_mail');
            $table->unsignedSmallInteger('cma_city');
            $table->unsignedBigInteger('cma_document');
            $table->timestamps();
            
            $table->index('cma_company');
            $table->foreign('cma_company')->references('id')
            ->on('company');
            $table->index('cma_city');
            $table->foreign('cma_city')->references('id')
            ->on('region');
            $table->index('cma_document');
            $table->foreign('cma_document')->references('id')
            ->on('document_account');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_mail');
    }
}
