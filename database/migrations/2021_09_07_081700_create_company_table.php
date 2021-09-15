<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('com_identype');
            $table->string('com_code');
            $table->string('com_name');
            $table->unsignedBigInteger('com_category');
            $table->unsignedBigInteger('com_type');
            $table->bigInteger('com_administrator');
            $table->unsignedBigInteger('com_country');
            $table->unsignedsmallInteger('com_city');
            $table->string('com_address');
            $table->string('com_phone');
            $table->string('com_web');
            $table->string('com_mail');
            $table->string('com_representative');
            $table->string('com_repre_phone');
            $table->string('com_repre_mail');
            $table->string('com_repre_identification');
            $table->integer('com_iva');
            $table->integer('com_retainer');
            $table->unsignedBigInteger('com_kindperson');
            $table->integer('com_registration');
            $table->integer('com_opportunity');
            $table->integer('com_discount');
            $table->integer('com_term');

            $table->timestamps();
            $table->index('com_identype');
            $table->foreign('com_identype')->references('id')
            ->on('identification_type');
            $table->index('com_category');
            $table->foreign('com_category')->references('id')
            ->on('company_category');
            $table->index('com_country');
            $table->foreign('com_country')->references('id')
            ->on('country');
            $table->index('com_type');
            $table->foreign('com_type')->references('id')
            ->on('company_type');
            $table->index('com_kindperson');
            $table->foreign('com_kindperson')->references('id')
            ->on('company_kindperson');
            $table->index('com_city');
            $table->foreign('com_city')->references('id')
            ->on('region');
            

            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
    }
}
