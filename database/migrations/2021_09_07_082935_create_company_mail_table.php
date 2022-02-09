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
            $table->unsignedBigInteger('company_id');
            $table->string('mail');
            $table->unsignedSmallInteger('city_id');
            $table->unsignedBigInteger('document_id');
            $table->timestamps();
            
            $table->index('company_id');
            $table->foreign('company_id')->references('id')
            ->on('company');
            $table->index('city_id');
            $table->foreign('city_id')->references('id')
            ->on('region');
            $table->index('document_id');
            $table->foreign('document_id')->references('id')
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
        Schema::dropIfExists('company_mail');
    }
}
