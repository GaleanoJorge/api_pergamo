<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_document', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cdc_company');
            $table->unsignedBigInteger('cdc_document');
            $table->string('cdc_file');
            $table->timestamps();

            $table->index('cdc_company');
            $table->foreign('cdc_company')->references('id')
            ->on('company');
            $table->index('cdc_document');
            $table->foreign('cdc_document')->references('id')
            ->on('document');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_document');
    }
}
