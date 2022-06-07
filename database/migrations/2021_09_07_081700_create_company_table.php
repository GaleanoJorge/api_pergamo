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
            $table->unsignedTinyInteger('identification_type_id');
            $table->string('identification');
            $table->integer('verification');
            $table->string('name');
            $table->unsignedBigInteger('company_category_id');
            $table->unsignedBigInteger('company_type_id');
            $table->string('administrator');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('city_id');
            $table->string('address');
            $table->string('phone');
            $table->string('web');
            $table->string('mail');
            $table->string('representative');
            $table->string('repre_phone');
            $table->string('repre_mail');
            $table->string('repre_identification');
            $table->unsignedBigInteger('iva_id');
            $table->unsignedBigInteger('retiner_id');
            $table->unsignedBigInteger('company_kindperson_id');
            $table->integer('registration');
            $table->integer('opportunity');
            $table->integer('discount');
            $table->unsignedBigInteger('payment_terms_id');
            $table->timestamps();

            $table->index('identification_type_id');
            $table->foreign('identification_type_id')->references('id')
            ->on('identification_type');
            $table->index('company_category_id');
            $table->foreign('company_category_id')->references('id')
            ->on('company_category');
            $table->index('country_id');
            $table->foreign('country_id')->references('id')
            ->on('country');
            $table->index('company_type_id');
            $table->foreign('company_type_id')->references('id')
            ->on('company_type');
            $table->index('company_kindperson_id');
            $table->foreign('company_kindperson_id')->references('id')
            ->on('company_kindperson');
            $table->index('city_id');
            $table->foreign('city_id')->references('id')
            ->on('region');
            $table->index('iva_id');
            $table->foreign('iva_id')->references('id')
            ->on('iva');
            $table->index('retiner_id');
            $table->foreign('retiner_id')->references('id')
            ->on('retiner');
            $table->index('payment_terms_id');
            $table->foreign('payment_terms_id')->references('id')
            ->on('payment_terms');

            

            
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
