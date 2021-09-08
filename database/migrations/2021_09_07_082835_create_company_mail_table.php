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
            $table->bigInteger('cma_company');
            $table->string('cma_mail');
            $table->bigInteger('cma_city');
            $table->bigInteger('cma_document');
            $table->timestamps();
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
